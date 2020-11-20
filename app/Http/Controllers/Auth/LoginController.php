<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index(){

      
        return view('auth.login');
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email' =>  'required|email',
            'password'=>['required']
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){

            return back()->with(['status'=>'invalid login details']);
        }

       return redirect()->route('dashboard');
    }
}