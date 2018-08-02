<?php

namespace MyCardsServer\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
               // 'message' => 'The email or password is incorrect, please try again'
             'message' => 'La email o la password sono errate, per favore riprova'

            ]);
        }
        
        return redirect()->to('/home/my');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/home/my');
    }
}
