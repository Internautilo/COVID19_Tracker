<?php
namespace APp\Services\Interfaces;

interface ApiServiceInterface
{
    public function getResponse(?string $param): array;
}