<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dangtin;
use App\Models\slide;

class SlideController extends Controller
{
    function __construct(){

        $slide = slide::all();
        view()->share('slide',$slide);
    }
    public function trangchu(){
        return view('pages.home');

    }
}
