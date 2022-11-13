<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{
    public function getMail(){
        //dd("store");
        $mail = Mail::all();
        return view("adminSide.Recrutement.mail.buildMail")->with("mail",$mail);
    }

    public function storMail(Request $request){
        //dd("store");
        $req = $request->validate([
            'object'             =>'nullable',
            'contenue'           =>'nullable',
            'type'               =>'nullable'
        ]);
        Mail::insert($req);
        //dd("stor");
        $mail = Mail::all();
        return view("adminSide.Recrutement.mail.buildMail")->with("mail",$mail);
    }


}
