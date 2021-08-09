<?php

namespace App\Mail;

use App\Business\Estacion\Estacion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StationStoredMail extends Mailable{
    use Queueable, SerializesModels;

    /**
     * @var Estacion
     */
    private $estacion;

    /**
     * Create a new message instance.
     *
     * @param Estacion $estacion
     */
    public function __construct(Estacion $estacion){
        $this->estacion = $estacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $estacion = $this->estacion;
        return $this->view('mails.stationstored')
            ->subject('Nueva Estación en RNES-F01 '.$estacion->numero)
            ->with('estacion', $estacion);
    }
}
