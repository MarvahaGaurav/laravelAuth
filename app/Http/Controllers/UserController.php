<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(){
    	return view('userLogin');
    }

    public function userAuth(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('userPanel')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect('/user/user_dashboard');
        }else{
            return redirect('user/user_login');
        }
    }

    public function dashboard(Request $request){
        if(Auth::guard('userPanel')->check())
            return view('userDashboard');
        else
            return redirect('user/user_login');
    }

    public function logout(Request $request){
        $this->guard('userPanel')->logout();
        return redirect('/user/user_login');
    }

    protected function guard($guard){
        return Auth::guard($guard);
    }
}
