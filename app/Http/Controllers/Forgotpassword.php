<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Forgotpassword extends Controller
{
   public function forgot(){
       return view('user.forgetpass');
   }
}
