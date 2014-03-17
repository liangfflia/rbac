<?php

namespace Rbac\Database;

class DbUserData extends DbLayer
{
    public function setUserData($params)
    {
        $this->insert($params);
    }
}