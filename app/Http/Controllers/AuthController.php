<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function Register(Request $request){
        try{
            // dd($request);
            $request -> validate(
                [
                    'name' =>'required|string|max:255',
                    'email' =>'required|string|max:255|unique:users',
                    'password'=> 'required|string|min:8'
                ]
                );
                User::create([
                    'name' => $request -> name,
                    'email'=> $request -> email,
                    'password'=> Hash::make($request -> password)

                ]);
                return redirect()->route('login')->with('success','Register Successful.');
        }catch(\Exception $error){
            dump($error->getMessage());
        }
    }

    public function ShowLoginForm(){
        return view('auth.login');
    }

    public function ShowLogoutForm(){
        return view('auth.logout');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function Login(Request $request){
        try{
            $request -> validate([
                'email' =>'required|email',
                'password'=> 'required'
            ]);
            if (Auth::attempt(credentials: $request->only('email', 'password'))){
                $request->session()->regenerate();
                return redirect()->route('welcome')->with('success','login successful');
            }else{
                dump('Login failed credential is not found. Please try again!');
                return redirect()->route('login')->with('error','login unsuccessful');
            }
        }catch(\Exception $error){
            dump($error->getMessage());
        }
    }

}
