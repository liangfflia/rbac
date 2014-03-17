<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

$auth = new Rbac\Base\Authenticate();
$registerParams = array('email' => $_POST['email'], 'password' => $_POST['password']);

if(isset($_POST['login'])) {
    $auth->login($registerParams);
}
else {
    $auth->register($registerParams);
}
