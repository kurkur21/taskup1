<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function login()
    {
        return view('/index');
    } 

    public function register()
    {
        return view('/register');
    }

    public function prosesLogin(Request $request)   
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $data=[
            'username' => $request->username,
            'password' => $request->password];

        if (auth()->attempt($data)) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function prosesRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        $data=[
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password];
        User::create($data);
        $Login=[
            'username' => $request->username,
            'password' => $request->password];

        if (auth()->attempt($Login)) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
        
    }

    public function Logout(){
        auth()->logout();
        return redirect('/');
    }


}
