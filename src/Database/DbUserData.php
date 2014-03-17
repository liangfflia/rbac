<?php

namespace Rbac\Database;
/**
 * Class DbUserData
 * @package Rbac\Database
 */
class DbUserData extends DbLayer
{
    public function setUserData($params)
    {
        if($this->insert($params)) {
            return true;
        }
    }
}