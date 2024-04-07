<?php
namespace App\Services\Interfaces;

interface ApiServiceInterface
{
    public function getResponse(?string $param): array;
}