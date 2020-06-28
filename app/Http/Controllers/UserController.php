<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    // -------------------- [ user registration view ] -------------
    public function index()
    {
        return view('auths.register');
    }

    // --------------------- [ Register user ] ----------------------
    public function userPostRegistration(Request $request)
    {
        $request->validate([
            'email' => ['required','string'],
            'password'=> ['required'],
            'address'=> 'required'
        ]); 
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        if($request->has('role')){
            $user->role = 1;
        }else{
            $user->role = 0;
        }
        $user->save();
        if(!is_null($user)){
            return redirect('pizza');
        }else{
            echo "don't have user";
        }
    }

    // --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request)
    {
        $request->validate([
            "email"           =>    "required",
            "password"        =>    "required"
        ]);
        $request->session()->put('data',$request->input());
        if(Auth::attempt($request->session()->get('data'))) {
            return redirect('pizza');    
        }
        return "Failure";
    }
    // ------------------- [ User logout function ] ----------------------
    public function logout(Request $request)
    {
        $request->session()->forget('data');
        return redirect('/');
    }
}
