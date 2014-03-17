<?php

namespace Rbac\Base;

use Rbac\Database\DbLayer;
use Rbac\Database\DbUserData;

/**
 * Class Authenticate
 * @package Rbac\Base
 */
class Authenticate extends RbacBase
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
     *
     * @param $username
     * @param $password
     */
    public function login($username, $password)
    {
        if($this->isAuthenticated) {
            $this->redirect($this->redirectPage);
        }
    }

    public function logout()
    {

    }

    /**
     * @param array $registerParams
     */
    public function register(array $registerParams)
    {
        $params = $this->generateHashWithSalt($registerParams['password']);

        $db = new DbUserData();

        if($db->setUserData($params)) {
            $this->redirect($this->redirectPage . '?registration=true');
        }
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