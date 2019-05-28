<?php
session_start();

session_unset();
session_destroy();
$params = session_get_cookie_params();
setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
header('Location: '.$_SERVER['HTTP_REFERER']);
