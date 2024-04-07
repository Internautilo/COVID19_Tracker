<?php
namespace App\Services;

use App\Repositories\Covid19Repository;
use App\Services\Interfaces\ApiServiceInterface;

class Covid19Service implements ApiServiceInterface
{
    private readonly Covid19Repository $__repository;

    public function __construct()
    {
        $this->__repository = new Covid19Repository;
    }

    public function getResponse(string|null $pais): array
    {
        return $this->__repository->getResponse($pais);
    }
}