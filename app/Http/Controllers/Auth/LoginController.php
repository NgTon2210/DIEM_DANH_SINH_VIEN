<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function HandleLogin(Request $request)
    {
        $remember = ($request->remember_me) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('admin');
           
        }
        return redirect()->back()->with(['msg'=>'Tài khoản hoặc mật khẩu không đúng'])->withInput();
    }
    public function HandleLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
