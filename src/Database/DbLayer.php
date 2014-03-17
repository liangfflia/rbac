<?php

namespace Rbac\Database;

use PDO;

/**
 * Class DbLayer
 * @package Rbac\Database
 */
class DbLayer
{
    const TABLE_NAME = 'user';

    protected function insert($params)
    {
        $pdoInstance = DbConnection::getInstance()->prepare("INSERT INTO " .
            self::TABLE_NAME . " (email, password, salt) VALUES (:email, :password, :salt)");

        $pdoInstance->bindValue(':email', $params['email']);
        $pdoInstance->bindValue(':password', $params['password']);
        $pdoInstance->bindValue(':salt', $params['salt']);

        $this->execute($pdoInstance);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function select($params)
    {
        $pdoInstance = DbConnection::getInstance()->prepare("SELECT email, password, salt FROM " .
            self::TABLE_NAME . " WHERE `email` = :email");

        $pdoInstance->bindValue(':email', $params['email']);
        $this->execute($pdoInstance);

        return $pdoInstance->fetch(PDO::FETCH_ASSOC);
    }

    protected function execute($pdoInstance){
        try {
            $pdoInstance->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}