<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'rememberme' => 'nullable'
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->rememberme === 'on' ? true : false)) {
            $request->session()->regenerate();
            activity()->event('login')->log(auth()->user()->name . ' has logged in.');
            return redirect('/');
        }
        return back()->withErrors(['error' => 'Email or Password is wrong!!!']);
    }
    public function logout()
    {
        activity()
            ->event('logout')
            ->log(auth()->user()->name . ' has logged out.');
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status =  Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    public function resetPassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'autologin' => 'nullable'
        ]);
        $autologin = $request->autologin;
        $autologin === 'on' ? $autologin = true : $autologin = false;

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PasswordReset) {
            if ($autologin) {
                $this->login($request);
            }
            return redirect()->route('login')->with('status', __($status));
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}
