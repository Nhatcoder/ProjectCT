<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.login');
    }



    public function checkLogin(Request $request)
    {

        // $this->validate($request, [
        //     'email_login' => 'required|email',
        //     'password_login' => 'required|min:6',
        // ]);


        if (Auth::guard('customer')->attempt(['email' => $request->email_login, 'password' => $request->password_login])) {
            return redirect()->intended(route('home'));
        }

        return response()->json("Sai tài khoản mật khẩu");


    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('home');
    }
}

