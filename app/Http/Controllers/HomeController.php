<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::select()->where('user_id', auth()->user()->id)->get()->first();
        return view('home', compact('setting'));
    }
}
