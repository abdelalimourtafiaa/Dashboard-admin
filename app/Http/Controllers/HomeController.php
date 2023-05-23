<?php

namespace App\Http\Controllers;

use App\Models\User ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=='0')
            return view('Admin.dashboard');
        }
        return view('Admin.Home');
    }

    public function index()
    {
        
        return view('Auth.login');
    }
}
