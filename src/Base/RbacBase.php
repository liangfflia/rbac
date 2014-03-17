<?php

namespace Rbac\Base;

use Rbac\Session\Session;

/**
 * Class RbacBaseLoader
 * @package Rbac\Base
 */
class RbacBase
{
    public function __construct(){
        $this->__loadPresets();
    }

    private function __loadPresets()
    {
        Session::open();
    }

    /**
     * @param $url
     */
    protected function redirect($url)
    {
        if($url) {
            header('Location: ' . $url);
            die;
        }
    }
}