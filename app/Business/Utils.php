<?php


namespace App\Business;


use App\Business\Estacion\Estacion;
use App\Mail\StationStoredMail;
use Illuminate\Support\Facades\Mail;

class Utils{

    public static function sendStationStoredMail(Estacion $estacion){
        $to = env('FORM_MAIL_TO');
        $mail = Mail::to($to);

        $bccs = collect();

        if (!empty(env('FORM_MAIL_TO_2',''))){
            $bccs->push(env('FORM_MAIL_TO_2'));
        }
        if (!empty(env('FORM_MAIL_TO_3',''))){
            $bccs->push(env('FORM_MAIL_TO_3'));
        }
        if (!empty(env('FORM_MAIL_TO_4',''))){
            $bccs->push(env('FORM_MAIL_TO_4'));
        }
        if (!empty(env('FORM_MAIL_OTIDG_TO',''))){
            $bccs->push(env('FORM_MAIL_OTIDG_TO'));
        }

        if ($bccs->isNotEmpty()){
            $mail->bcc($bccs->all());
        }
        return $mail->send(new StationStoredMail($estacion));
    }

}