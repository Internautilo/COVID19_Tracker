<?php
namespace App\Controllers\Interfaces;

interface ApiControllerInterface
{
    public function getResponse(?string $param): array;
}