<?php

namespace Rbac\Base;

use Rbac\Database\DbLayer;
use Rbac\Database\DbUserData;

class Authenticate extends RbacBaseLoader
{
    const COST = 10;

    protected $redirectPage;

    protected $isAuthenticated;

    public function __construct()
    {
        $this->redirectPage = $_SERVER['HTTP_REFERER'];
    }

    /**
     * Handle login action.
     */
    public function login($username, $password)
    {
        if($this->isAuthenticated && $this->redirectPage) {
            header('Location: ' . $this->redirectPage);
            die;
        }
    }

    public function logout()
    {

    }

    public function register(array $registerParams)
    {
        $password = $this->generateHashWithSalt($registerParams['password']);


    }

    /**
     * @param $password
     * @return string
     */
    protected function generateHashWithSalt($password)
    {
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", self::COST) . $salt;
        $hash = crypt($password, $salt);

        return array(
            'password' => $hash,
            'salt' => $salt
        );
    }

}