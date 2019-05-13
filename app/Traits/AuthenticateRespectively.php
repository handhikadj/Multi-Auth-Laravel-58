<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthenticateRespectively 
{
    public function showAdminLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        // return back()->withInput($request->only('name', 'remember'));
        return $this->sendFailedLoginResponse($request);
    }

    public function showGuruLoginForm()
    {
        return view('auth.gurulogin');
    }

    public function guruLogin(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('guru')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/guru');
        }
        // return back()->withInput($request->only('name', 'remember'));
        return $this->sendFailedLoginResponse($request);
    }

    public function showSiswaLoginForm()
    {
        return view('auth.siswalogin');
    }

    public function siswaLogin(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('siswa')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/siswa');
        }
        // return back()->withInput($request->only('name', 'remember'));
        return $this->sendFailedLoginResponse($request);
    }
}