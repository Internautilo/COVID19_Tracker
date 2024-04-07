<?php
namespace App\Controllers;

use App\Services\PaisesDisponiveisService;

class PaisesDisponiveisApiController
{
    private readonly PaisesDisponiveisService $__service;

    public function __construct()
    {
        $this->__service = new PaisesDisponiveisService;
    }

}