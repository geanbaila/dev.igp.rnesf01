<?php

namespace App\Business\Upload;

use App\Events\SignedFileCreatedEvent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchivoFirmado extends Model{

    use SoftDeletes;

    const STORAGE_FOLDER = "signed-files";

    protected $table = 'archivos_firmados';

    protected $fillable = [
        'user_id',
        'nombre',
        'slug',
        'ruta_relativa',
    ];

    protected $dispatchesEvents = [
        'created' => SignedFileCreatedEvent::class,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }



}
