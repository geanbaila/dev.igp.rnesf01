<?php

namespace App\Business\Upload;


class UploadHelper{

    // Folder
    public static $STORAGE_FOLDER = "uploads";

    public static function saveFiles($files = [], $uploadable_id, $uploadable_type, $tipo, $description = null){
        $data = [];
        for($i = 0; $i < count($files); $i++){
            $upload = array();
            $upload['ruta_relativa'] = self::saveFile($files[$i]);
            $upload['nombre'] = $files[$i]->getClientOriginalName();
            $upload['uploadable_type'] = $uploadable_type;
            $upload['uploadable_id'] = $uploadable_id;
            $upload['tipo'] = $tipo;
            if($description != null && is_array($description)){
                $upload['descripcion'] = $description[$i];
            }

            array_push($data, $upload );
            unset($upload);
        }
        return $data;
    }

    public static function saveFile($file){
        if(!$file->isValid()) return false;
        return $file->store(UploadHelper::$STORAGE_FOLDER);
    }

    /**
     * Elimina un archivo del sistema de archivos
     * @param $path: Ruta a partir de storage/app
     * @return mixed: true or false
     */
    public static function delete($path){
        return \Storage::delete($path);
    }

}