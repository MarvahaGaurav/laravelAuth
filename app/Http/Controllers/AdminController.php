<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{

    public function index(){
    	return view('adminLogin');
    }

    public function adminAuth(Request $request){
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect('/admin/admin_dashboard');
        }else{
            dd('your username and password are wrong.');
        }
    }


    public function dashboard(Request $request){
    	if(Auth::guard('admin')->check())
    		return view('adminDashboard');
    	else
    		return redirect('admin/admin_login');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/admin/admin_login');
    }

	protected function guard(){
		return \Auth::guard();
	}


}
