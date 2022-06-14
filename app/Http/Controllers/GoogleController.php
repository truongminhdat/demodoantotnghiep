<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class GoogleController extends Controller
{

    public function index()
    {
        return view('pages.googleAutocomplete');
    }
}
