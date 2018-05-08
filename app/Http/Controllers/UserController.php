<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
    	return view('userLogin');
    }

    public function userAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            // return redirect()->route('user.dashboard');
            return view('userDashboard');
        }else{
            dd('your username and password are wrong.');
        }
    }
}
