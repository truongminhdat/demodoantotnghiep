<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendmail()
    {
        dd('Hello');
    }
}
