<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{

    public function index(){
    	return view('adminLogin');
    }

    public function adminAuth(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            // return redirect()->route('admin.dashboard');
            return view('adminDashboard');
        }else{
            dd('your username and password are wrong.');
        }
    }


    public function dashboard(Request $request){
    	return view('adminDashboard');
    }



    public function logout(Request $request)
    {
    	// dd('logout');
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/admin/admin_login');
    }



	protected function guard()
	{
		return \Auth::guard();
	}


}
