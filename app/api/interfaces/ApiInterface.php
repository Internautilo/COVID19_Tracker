<?php

namespace App\Api\Interfaces;

interface ApiInterface
{
    public function getResponse(?string $param) : array;
}