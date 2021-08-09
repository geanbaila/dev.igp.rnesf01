<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Client Id
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'app_name' => env('APP_NAME', 'pdf'),

    'reniec_client_id' => env('SIGNATURE_RENIEC_CLIENT_ID','client-id'),

    'reniec_client_secret' => env('SIGNATURE_RENIEC_CLIENT_SECRET','client-secret'),

    'app_protocol' => env('SIGNATURE_APP_PROTOCOL','https'),

    'app_url' => env('APP_URL', 'http://localhost'),

    // 'images_path' => env('APP_URL').'/images/',

    'logo_url' => env('SIGNATURE_LOGO_URL',env('APP_URL').'/images/iLogo1.png'),

    'stamp_url' => env('SIGNATURE_STAMP_URL',env('APP_URL').'/images/iFirma1.png'),

    'token_expiration_time_to_download' => env('SIGNATURE_TOKEN_EXPIRATION_TIME_TO_DOWNLOAD', '2 minutes'),

    'token_expiration_time_to_upload' => env('SIGNATURE_TOKEN_EXPIRATION_TIME_TO_UPLOAD', '7 minutes'),

    'validator_base_url' => env('SIGNATURE_VALIDATOR_BASE_URL','127.0.0.1:8080'),

    'default_params' => array(
        'app' => env('SIGNATURE_APP_NAME', 'pdf'),
        'fileUploadUrl' => '',  // Requested by Invoker
        'reason' => 'Autor del documento',
        'type' => 'W',  // Web(W) or Local(L)
        'clientId' => env('SIGNATURE_RENIEC_CLIENT_ID'),
        'clientSecret' => env('SIGNATURE_RENIEC_CLIENT_SECRET'),
        'dcfilter' => '.*FIR.*|.*FAU.*',
        'fileDownloadUrl' => '',  // Download file from this URL
        'posx' => '5',
        'posy' => '5',
        'outputFile' => '',  // Name showed when someone sign the document
        'protocol' => 'T',
        'contentFile' => 'demo.pdf',  // Name showed in Refirma Desktop App
        'stampAppearanceId' => '0',  // 0, 1, 2, 3(sin logo)
        'isSignatureVisible' => 'true',
        'idFile' => "please_dont_change_this",
        'fileDownloadLogoUrl' => env('SIGNATURE_LOGO_URL'),
        'fileDownloadStampUrl' => env('SIGNATURE_STAMP_URL'),
        'pageNumber' => '0',
        'maxFileSize' => '5242880',
        'fontSize' => '8',
        'timestamp' => 'false'
    ),

];
