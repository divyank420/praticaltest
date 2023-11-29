<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected function validateLogin(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ],[
            'email.required'=>'Email Field is Required',
            'password.required'=>'Password Field is Required',
        ]);
    }
  
    public function login (Request $request){
        if(auth()->check()){
            return redirect()->route('home')->with('error','User already loggedin');
        }
        if($request->isMethod('POST')){
            
            $this->validateLogin($request);
            //$this->sendLoginResponse($request);
            $remember_me = $request->has('remember') ? true : false;
            if(auth()->attempt($request->only('email', 'password'),$remember_me)){
                $request->session()->flash('success', 'Successfully logged In');
                return redirect()->route('home');
            }else{
                $request->session()->flash('error', 'Invalid Creditional');
            }

        }
        return view('login');
    }
}
