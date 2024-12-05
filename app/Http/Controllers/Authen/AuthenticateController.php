<?php

namespace App\Http\Controllers\Authen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function loginForm()
    {
        Auth::logout();
        // $cate = Category::get();
        return view('Authen.login');
    }
    public function registerForm()
    {
        // $cate = Category::get();
        return view('Authen.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }
    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.product.index');
            }
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
