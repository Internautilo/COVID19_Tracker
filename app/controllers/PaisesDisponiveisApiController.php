<?php
namespace App\Controllers;

use App\Controllers\Interfaces\ApiControllerInterface;
use App\Services\PaisesDisponiveisService;

class PaisesDisponiveisApiController implements ApiControllerInterface
{
    private readonly PaisesDisponiveisService $__service;

    public function __construct()
    {
        $this->__service = new PaisesDisponiveisService;
    }

    public function getResponse(string|null $param = "1"): array
    {
        return $this->__service->getResponse();
    }
}