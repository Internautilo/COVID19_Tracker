<?php
namespace App\Repositories;

use App\Models\Api\PaisesDisponiveis;
use App\Repositories\Interfaces\ApiRepositoryInterface;
use Database\DbConnection;

class PaisesDisponiveisRepository
{
    private PaisesDisponiveis $__model;
    private \PDO $__connection;

    public function __construct() {
        $this->__model = new PaisesDisponiveis;
        $this->__connection = DbConnection::getConnection();
        $this->__connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}