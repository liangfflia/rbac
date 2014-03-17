<?php

namespace Rbac\Database;

class DbConnection
{
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            try {
                self::$_instance = new PDO(
                    "mysql:host=localhost;dbname=rbac",
                    'root',
                    'ver1taS'
                );
            }
            catch(PDOException $e) {
                die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
            }
        }

        return self::$_instance;
    }

    private function __clone()
    {
    }
}
