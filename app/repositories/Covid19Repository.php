<?php 
namespace App\Repositories;

use App\Models\Api\Covid19;
use App\Repositories\Interfaces\ApiRepositoryInterface;
use Database\DbConnection;

class Covid19Repository
{
    private Covid19 $__model;
    private \PDO $__connection;

    public function __construct(Covid19 $covid19) {
        $this->__model = $covid19;
        $this->__connection = DbConnection::getConnection();
        $this->__connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    
}