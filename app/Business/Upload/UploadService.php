<?php


namespace App\Business\Upload;


class UploadService{

    /**
     * Guarda un archivo subido (upload)
     * @param $data
     * @return Upload
     */
    public function save($data){
        $upload = new Upload();
        $data['slug'] = str_slug($data['nombre'].'-'.time());

        $upload->fill($data);
        $upload->save();
        return $upload;
    }

    /**
     * Guarda multiples archivos
     * @param $data
     */
    public function saveAll($data){
        for ($i = 0; $i < count($data) ; $i++){
            $this->save($data[$i]);
        }
    }

}