<?php

namespace App\Models\Api;
use App\Models\Api\Interfaces\ApiInterface;

class Covid19 implements ApiInterface
{
    public function getResponse(string|null $param): array
    {
        try {
            $response = file_get_contents('https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Brazil');
            $response = json_decode($response);

            foreach ($response as $estado) {
                $estados[$estado->ProvinciaEstado] = $estado;
            };

            return $estados;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}