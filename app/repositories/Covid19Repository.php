<?php
namespace App\Repositories;

use App\Models\Api\Covid19;
use App\Repositories\Interfaces\ApiRepositoryInterface;
use Database\DbConnection;

class Covid19Repository implements ApiRepositoryInterface
{
    private readonly Covid19 $__model;
    private readonly \PDO $__connection;

    public function __construct()
    {
        $this->__model = new Covid19;
        $this->__connection = DbConnection::getConnection();
        $this->__connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getResponse(string|null $pais): array
    {
        if (empty($pais)) {
            throw new \InvalidArgumentException("O parâmetro \$pais não pode estar vazio ou nulo.");
        }

        $response = $this->__model->getResponse($pais);
        if ($response == null) {
            throw new \Exception("País não encontrado", 404);
        }

        try {
            date_default_timezone_set("America/Sao_Paulo");
            $date = date('Y-m-d H:i:s');

            $query = "INSERT INTO consultaapi (pais, data) VALUES (:pais, :data)";

            $stmt = $this->__connection->prepare($query);
            $stmt->bindParam(':pais', $pais);
            $stmt->bindParam(':data', $date);

            $stmt->execute();

            return $response;
        } catch (\PDOException $e) {
            throw new \PDOException("Erro ao inserir dados na tabela consultaAPI: " . $e->getMessage());
        }
    }
}