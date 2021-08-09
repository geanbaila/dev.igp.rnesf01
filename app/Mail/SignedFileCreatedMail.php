<?php

namespace App\Mail;

use App\Business\Upload\ArchivoFirmado;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class SignedFileCreatedMail extends Mailable{
    use Queueable, SerializesModels;
    /**
     * @var ArchivoFirmado
     */
    private $archivoFirmado;

    /**
     * Create a new message instance.
     *
     * @param ArchivoFirmado $archivoFirmado
     */
    public function __construct(ArchivoFirmado $archivoFirmado){
        $this->archivoFirmado = $archivoFirmado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $signed_file = $this->archivoFirmado;
        return $this->view('mails.signedfiles.created')
            ->subject('Nuevo archivo recibido - '.$signed_file->user->sigla)
            ->with('signed', $signed_file)
            ->attachData(Storage::get($signed_file->ruta_relativa),
                $signed_file->nombre, ['mime' => 'application/pdf']);
    }

}
