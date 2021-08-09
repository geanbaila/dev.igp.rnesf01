<?php

namespace App\Mail;

use App\Business\Lista\Lista;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ListArriveMail extends Mailable{
    use Queueable, SerializesModels;
    /**
     * @var Lista
     */
    private $lista;

    /**
     * Create a new message instance.
     *
     * @param Lista $lista
     */
    public function __construct(Lista $lista){
        $this->lista = $lista;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $lista = $this->lista;
        return $this->view('mails.list.sent')
            ->subject('Recepción de Formulario RNES-F01 - '.$lista->numero.' - '.$lista->user->sigla)
            ->with('lista', $lista)
            ->attachData(Storage::get($lista->signed_file_path),
                'Archivo', ['mime' => 'application/pdf']);
    }
}
