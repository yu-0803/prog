<?php

session_start();



$_SESSION = array();

if (ini_get('session.use_cookies')) {

    $_params = session_get_cookie_params();

    setcookie(session_name(), '', time() -42000,

    $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}

session_destroy();



setcookie('email', '', time()-3600);



header('Location: login.php');

exit();

?>