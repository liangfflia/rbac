<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

$auth = new Rbac\Base\Authenticate();
$registerParams = array('email' => $_POST['email'], 'password' => $_POST['password']);

//$auth->register($registerParams);
$auth->login($registerParams);