<?php
session_start();

if(isset($_GET['lang']))
{
    setcookie('lang', $_GET['lang']);
}
if(isset($_POST['input-usuario']))
{
    $_SESSION['usuario'] = $_POST['input-usuario'];
}

header('Location: '.$_SERVER['HTTP_REFERER']);

