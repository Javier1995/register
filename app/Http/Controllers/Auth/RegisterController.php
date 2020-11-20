<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index(){
       return view('auth.register');
   }

   public function store(Request $request){
  
     

     $this->validate($request, [
            'name'=>     ['required', 'max:255'],
            'username'=> ['required', 'max:255', 'unique:users'], 
            'lastName'=> ['required', 'max:255'],
            'email' =>  'required|email|max:255|unique:App\Models\User,email',
            'password'=>['required','confirmed']
        ]);
      
         User::create([
             'name'=>$request->name,
             'username'=>$request->username,
             'email'=>$request->email,
             'lastName'=>$request->lastName,
             'password'=> Hash::make($request->password)
         ]);
                 

        /* Storing auth with the helper */
         auth()->attempt($request->only('email', 'password'));

         return redirect()->route('dashboard')->with(['success'=>'Has been saved']);

   }
}
