<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('auth/passwords/reset');
    }
    
      public function reset(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        
        if (empty($password) || empty($password_confirmation) || $email != Auth::user()->email || $password != $password_confirmation) {
            return redirect()->back()->with('error', __('auth.password_reset.invalid_credentials'));
        }
        
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        $user->save();
        
        return redirect()->to('/home');
    }
}