<?php

namespace Rbac\Database;

use PDO;

/**
 * Class DbLayer
 * @package Rbac\Database
 */
class DbLayer {

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

    public function select($params)
    {
        $pdoInstance = DbConnection::getInstance()->prepare("SELECT user_name FROM " .
            self::TABLE_NAME . " WHERE id = :userId");

        foreach ($params as $param) {
            $pdoInstance->bindParam(':param', $param);
            $this->execute($pdoInstance);
        }

        return $pdoInstance->fetchAll(PDO::FETCH_ASSOC);
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