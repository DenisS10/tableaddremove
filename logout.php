<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//header('location: index.php');

if (isset($_COOKIE['auth']) || $_COOKIE['auth'] == 'ok') {
    setcookie('auth','ok',time()-1);
    header('location: login.php');
}






