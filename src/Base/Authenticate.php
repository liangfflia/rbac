<?php

namespace Rbac\Base;

use Rbac\Session\Session;

class Authenticate extends RbacBaseLoader
{
    const SALT_MAX_LENGTH = 12;

    protected $redirectPage;

    protected $isAuthenticated;

    public function __construct()
    {
        $this->redirectPage = $_SERVER['HTTP_REFERER'];
    }

    /**
     * Handle login action.
     */
    public function login()
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
    protected function generateHashWithSalt(string $password)
    {
        $intermediateSalt = md5(uniqid(rand(), true));
        $salt = substr($intermediateSalt, 0, self::SALT_MAX_LENGTH);
        $hash = hash("sha256", $password . $salt);

        return array(
            'password' => $hash,
            'salt' => $salt
        );
    }

}