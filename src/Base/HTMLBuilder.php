<?php

namespace Rbac\Base;
/**
 * Class HTMLBuilder
 * @package Rbac\Base
 */
class HTMLBuilder {

    public static function getLoginFormHTML()
    {
        return include(__DIR__ . '/html/loginForm.php');
    }

    public static function getRegistratonFormHTML()
    {
        return include(__DIR__ . '/html/registrationForm.php');
    }

    public static function getLogoutHTML()
    {
        return '<a href="">logout</a>';
    }
}