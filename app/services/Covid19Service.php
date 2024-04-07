<?php

namespace App\Services;
use App\Repositories\Covid19Repository;


class Covid19Service
{
    private readonly Covid19Repository $__repository;

    public function __construct() {
        $this->__repository = new Covid19Repository;
    }

    
}