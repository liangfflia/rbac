<?php

namespace Rbac\Base;

use Rbac\Session\Session;

class RbacBaseLoader
{
    public function __construct(){
        $this->__loadPresets();
    }

    private function __loadPresets()
    {
        Session::open();
    }
}