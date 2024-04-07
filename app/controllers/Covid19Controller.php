<?php
namespace App\Controllers;

use App\Controllers\Interfaces\ApiControllerInterface;
use App\Services\Covid19Service;

class Covid19Controller implements ApiControllerInterface
{
    private readonly Covid19Service $__service;

    public function __construct()
    {
        $this->__service = new Covid19Service;
    }

    public function getResponse(string|null $pais): array
    {
        return $this->__service->getResponse($pais);
    }
}