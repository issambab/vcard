<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [  'imageFileUpload' , 'Request.ImageFileUpload' ,'namexit'
    
   

    ,'submitabon' ,'cin' ,'changecopie', 'changenfc','changeimp','changesmsclient', 'changelivclient', 'getinfo', 'saveinfo','GetInfoSalon'
    //
    ];
}
