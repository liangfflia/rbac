<?php

namespace Rbac\Database;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class DbUserData
 * @package Rbac\Database
 */
class DbUserData extends DbLayer
{
    /**
     * @param $params
     * @return bool
     */
    public function setUserData($params)
    {
        try {
            $this->insert($params);

            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUserData($email, $password)
    {
        $params = array();

        $params['email'] = $email;
        $params['password'] = $password;

        try {
            return $this->select($params);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}