<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class InstructorController extends Controller
{
    public function instructor(){

        return view("instructor.register");
    }


    public function register(Request $request){

        $request->validate([
            'name' =>'required|min:10|string|max:50',
            'email'=>'email|required|min:10|string|max:255|unique:users',
            'password'=>[Password::min(5)->mixedCase()]
        ]);

        

        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $user->assignRole('Instructor');

        return redirect()->route('login');


    }
}
