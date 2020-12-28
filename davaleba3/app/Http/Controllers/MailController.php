<?php

namespace App\Http\Controllers;

use App\Mail\OrderShippedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    public function send($data, Request $request) {
        Mail::to('admin@test.com')->send(new OrderShippedMail($data));

        return redirect()->route('mail.create');
    }
}
