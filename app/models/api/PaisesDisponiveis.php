<?php

namespace App\Models\Api;
use App\Models\Api\Interfaces\ApiInterface;

class PaisesDisponiveis implements ApiInterface
{
    public function getResponse(string|null $param = "1"): array
    {
        try {
            $response = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1");
            $response = json_decode($response);

            foreach ($response as $pais) {
                $paises[] = $pais;
            };

            return $paises;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}