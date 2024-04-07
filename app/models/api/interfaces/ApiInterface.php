<?php

namespace App\Models\Api\Interfaces;

interface ApiInterface
{
    public function getResponse(?string $param) : array;
}