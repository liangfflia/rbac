<?php

class DbConnection
{
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new PDO(
                "mysql:host=localhost;dbname=rbac",
                'root',
                'ver1taS'
            );
            self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$_instance;
    }

    private function __clone()
    {
    }
}
