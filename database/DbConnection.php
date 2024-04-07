<?php
namespace Database;

use Dotenv\Dotenv;

class DbConnection
{
    public static function getConnection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '../../');
        $dotenv->load();

        $db_host = $_ENV['DB_HOST'];
        $db_name = $_ENV['DB_DATABASE'];
        $db_user = $_ENV['DB_USERNAME'];
        $db_pass = $_ENV['DB_PASSWORD'];

        try {
            $connection = new \PDO("mysql:host={$db_host};dbname={$db_name};", $db_user, $db_pass);
            return $connection;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}