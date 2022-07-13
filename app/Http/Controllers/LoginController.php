<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     // LOGIN
    public function index()
    {
        return view('login');
    }

    // LOGIN PROCESS
    public function process(Request $req)
    {
        $datalogin = $req->validate([
            'email'    => 'required|email|min:5|max:50',
            'password' => 'required|min:5'
        ]);
        if (Auth::attempt($datalogin)) {
            return redirect('home');
        }
        return back()->withErrors([
            'email' => "Account not found"
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
