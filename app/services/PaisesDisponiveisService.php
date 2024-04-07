<?php
namespace App\Services;

use App\Repositories\PaisesDisponiveisRepository;
use App\Services\Interfaces\ApiServiceInterface;

class PaisesDisponiveisService implements ApiServiceInterface
{
    private readonly PaisesDisponiveisRepository $__repository;

    public function __construct()
    {
        $this->__repository = new PaisesDisponiveisRepository;
    }

    public function getResponse(string|null $param = "1"): array
    {
        return $this->__repository->getResponse();
    }
}