<?php

namespace Rbac\Base;

use Rbac\Session\Session;
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
     * @param $registerParams
     */
    public function login($registerParams)
    {
        $db = new DbUserData();
        $result = $db->getUserData($registerParams['email'], $registerParams['password']);

        $incomingPassword = $result['password'] . $result['salt'];
        $dbPassword = $this->generateHashWithSalt($registerParams['password'], $result['salt']);

        if($incomingPassword === $dbPassword) {
            $this->isAuthenticated = true;
        }

        if($this->isAuthenticated) {
            $this->redirect($this->redirectPage . '?login=true');
        }
        else {
            echo 'Your password is incorrect!';
        }
    }

    /**
     * Handle logout action.
     */
    public function logout()
    {
        Session::destroy();
        $this->redirect($this->redirectPage);
    }

    /**
     * @param array $registerParams
     * @return bool
     */
    public function register(array $registerParams)
    {
        $params = array();
        if(array_search('', $registerParams)) {
            return false;
        }

        $params['email'] = $registerParams['email'];

        $generatedPasswordItem = $this->generateHashWithSalt($registerParams['password']);

        foreach ($generatedPasswordItem as $key => $value) {
            $params[$key] = $value;
        }

        $db = new DbUserData();

        if($db->setUserData($params)) {
            $this->redirect($this->redirectPage . '?registration=true');
        }
    }

    /**
     * @param $password
     * @return string
     */
    protected function generateHashWithSalt($password, $salt = false)
    {
        if ($salt == false) {
            $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $salt = sprintf("$2a$%02d$", self::COST) . $salt;

            $hash = crypt($password, $salt);

            return array(
                'password' => $hash,
                'salt' => $salt
            );
        }
        else {
            $hash = crypt($password, $salt);

            return $hash . $salt;
        }
    }

}