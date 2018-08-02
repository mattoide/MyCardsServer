<?php

namespace MyCardsServer\Http\Controllers;

use Illuminate\Http\Request;
use MyCardsServer\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {


        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try{

        $user = User::create(request(['name', 'email', 'password']));
    } catch (\Exception $e){

        return back()->withErrors([
                   // 'message' => 'The email or password is incorrect, please try again'
                 'message' =>  'Email gia usata'
                ]);
            }
        auth()->login($user);



        return redirect()->to('/home/my');
        
    }
}
