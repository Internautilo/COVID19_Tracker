<?php
namespace App\Controllers;

use App\Services\Covid19Service;

class Covid19ApiController
{
    private readonly Covid19Service $__service;

    public function __construct()
    {
        $this->__service = new Covid19Service;
    }


}