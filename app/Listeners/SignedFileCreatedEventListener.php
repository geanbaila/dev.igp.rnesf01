<?php

namespace App\Listeners;

use App\Events\SignedFileCreatedEvent;
use App\Mail\SignedFileCreatedMail;
use Illuminate\Support\Facades\Mail;
use Swift_SwiftException;

class SignedFileCreatedEventListener{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  SignedFileCreatedEvent  $event
     * @return void
     */
    public function handle(SignedFileCreatedEvent $event){
        // SignedFileCreatedEvent handler ..
        $signed = $event->getArchivoFirmado();
        try{
            $email = env('MAIL_FORM_TO');
            $name = env('MAIL_FORM_TO_NAME');
            Mail::to($email, $name)
                ->send(new SignedFileCreatedMail( $signed ));
        }catch (Swift_SwiftException $se){
            session()->flash('warning-error', 'Se ejecutaron las acciones, pero hubo un error al enviar correo(s).');
        }
    }
}
