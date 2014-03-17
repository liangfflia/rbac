<?php

class DbLayer {
    protected function setData($name, $value)
    {
        $sth = DbConnection::getInstance()->prepare("INSERT INTO user (name, value) VALUES (:name, :value)");
        $sth->bindParam(':name', $name);
        $sth->bindParam(':value', $value);
        $sth->execute();
    }

    public function getData($userId)
    {
        $sth = DbConnection::getInstance()->prepare("SELECT user_name FROM user WHERE id = :userId");
        $sth->bindParam(':userId', $userId);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function execute(Object $pdoInstance, $values)
    {
        try {
            $pdoInstance->execute($values);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}