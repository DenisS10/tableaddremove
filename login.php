<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//header('location: index.php');


if (isset($_POST['login'])) {
    $login = $_POST['login'];
}
if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
}
if (isset($_POST['cbRemember'])) {
    $cbRemember = $_POST['cbRemember'];
}

if (isset($login) && $login == 'login' && isset($pass) && $pass == 'pass') {
    if (isset($cbRemember) && $cbRemember == 'on') {
        setcookie('auth', 'ok', time()+60*60*24*7 );
        header('location: index.php');
    } else {
        setcookie('auth', 'ok', time()+60*60);
        header('location: index.php');
    }
    print_r($_POST);
}


?>
<html>
<head>
    <meta charset="utf-8">
    <title>table</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<pre>
<div class="formDivLogin">

    <form action="login.php" method="post">
        <input class="inp" name="login">
        <input class="inp" type="password" autocomplete="off" name="pass"><br>
        <input class="inp" type="checkbox"  name="cbRemember"> remember
        <button class="btn btnSend" type="submit">Login</button>
    </form>


</div></pre>
</body>
</html>
