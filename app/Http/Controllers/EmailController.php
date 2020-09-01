<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class EmailController extends Controller
{
    //
    public function sendEmail()
    { 
        $params_msg = isset($_GET['msg']) ? $_GET['msg'] : "KHÔNG CÓ NỘI DUNG";
        $email = isset($_GET['email']) ? $_GET['email'] : "KHÔNG CÓ NỘI DUNG";
        $sub = isset($_GET['sub']) ? $_GET['sub'] : "KHÔNG CÓ NỘI DUNG";

        $msg        = explode("!__", $params_msg);
        foreach($msg as $value){
            if(!empty($value)){
                Mail::to($email)->send(new MailNotify($value, $sub));
            }
        }
        return response()->json(\getResponse([], META_CODE_SUCCESS, SEND_EMAIL_SUCCESS));
    }
}
