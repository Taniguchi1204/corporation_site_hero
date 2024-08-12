<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class MailSendController extends Controller
{
    public function send(Request $request){
        $lang = $request->input('lang');
        App::setLocale($lang);

        $data = $request->validate([
            'name' => ['required'],
            'tel' => ['required', 'regex:/^(\+?\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'],
            'mail' => ['required', 'email'],
            'company' => [],
            'address' => [],
            'message' => ['required'],
            'lang' => ['required']
        ]);
    
        Mail::send(new SendMail($data));
    }
}