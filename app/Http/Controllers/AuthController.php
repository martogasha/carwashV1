<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            if ($user->role==0 || $user->role==1){
                return redirect(url('/'));
            }
        }
        else{
            return redirect()->back()->with('error', 'CREDENTIALS DOES NOT MATCH');
        }

    }
}
