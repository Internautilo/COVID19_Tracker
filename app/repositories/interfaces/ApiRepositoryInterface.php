<?php

namespace App\Repositories\Interfaces;

interface ApiRepositoryInterface
{
    public function getResponse(?string $param) : array;
}