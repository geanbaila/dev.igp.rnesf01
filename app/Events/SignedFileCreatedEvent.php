<?php

namespace App\Events;

use App\Business\Upload\ArchivoFirmado;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SignedFileCreatedEvent{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var ArchivoFirmado
     */
    private $archivoFirmado;

    /**
     * Create a new event instance.
     *
     * @param ArchivoFirmado $archivoFirmado
     */
    public function __construct(ArchivoFirmado $archivoFirmado){
        $this->archivoFirmado = $archivoFirmado;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(){
        return new PrivateChannel('channel-name');
    }

    /**
     * @return ArchivoFirmado
     */
    public function getArchivoFirmado(): ArchivoFirmado{
        return $this->archivoFirmado;
    }

}
