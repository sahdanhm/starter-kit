<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;
    public function index()
    {
        return view('auth.login');
    }
    public function saveSettings(Request $request)
    {
        if ($request->boxedcontainer == 'boxed') {
            $request['boxedcontainer'] = true;
        } else {
            $request['boxedcontainer'] = false;
        }

        if ($request->borderedcard == 'border') {
            $request['borderedcard'] = true;
        } else {
            $request['borderedcard'] = false;
        }

        $request->validate([
            'theme' => 'required|string',
            'themedir' => 'required|string',
            'themecolor' => 'required|string',
            'layouttype' => 'required|string',
            'boxedcontainer' => 'required|boolean',
            'sidebartype' => 'required|string',
            'borderedcard' => 'required|boolean'
        ]);
        Setting::where('user_id', auth()->user()->id)->update([
            'theme' => $request->theme,
            'themedir' => $request->themedir,
            'themecolor' => $request->themecolor,
            'layouttype' => $request->layouttype,
            'boxedcontainer' => $request->boxedcontainer,
            'sidebartype' => $request->sidebartype,
            'borderedcard' => $request->borderedcard
        ]);
        return back()->with('success', 'Settings saved successfully!');
    }
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->rememberme)) {
            $request->session()->regenerate();
            activity()->event('login')->log(auth()->user()->name . ' has logged in.');
            return redirect('/');
        }
        return back()->with('error', 'Email or Password is wrong!!!');
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
}
