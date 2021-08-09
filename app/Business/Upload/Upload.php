<?php

namespace App\Business\Upload;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model{

    protected $table = 'uploads';
    use SoftDeletes;

    const SHEET_TYPE = 1;
    const PHOTO_TYPE = 2;
    const OTHER_FILES_TYPE = 3;

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'tipo',
        'ruta_real',
        'ruta_relativa',
        'uploadable_id',
        'uploadable_type',
    ];

    public function getTipoTextAttribute(){
        if ($this->tipo == Upload::SHEET_TYPE) return 'Hoja de calibración';
        if ($this->tipo == Upload::PHOTO_TYPE) return 'Foto';
        if ($this->tipo == Upload::OTHER_FILES_TYPE) return 'Otros';
        return '';
    }

}
