<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//header('location: index.php');

$login ='';
$pass = '';
$cbRemember ='';
if (isset($_POST['login'])) {
    $login = $_POST['login'];
}
if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
}
if (isset($_POST['cbRemember'])) {
    $cbRemember = $_POST['cbRemember'];
}

if ( $login == 'login' && $pass == 'pass') {
    if ( $cbRemember == 'on') {
        setcookie('auth', 'ok', time()+60*60*24*7 );
        header('location: index.php');
    } else {
        setcookie('auth', 'ok', time()+60*60);
        header('location: index.php');
    }
    //print_r($_POST);
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

<div class="form-row align-items-center formDivLogin">
<?='<pre>'?>
    <form action="login.php" method="post">
        <input class="form-control" placeholder="Enter login" name="login">
        <input class="form-control" placeholder="Enter password" type="password" autocomplete="off" name="pass"><br>
<div >
        <input class="form-check-input"  type="checkbox" name="cbRemember">Remember me

</div>
        <button class="btn btn-primary"  type="submit">Login</button>
    </form>


</div>
</pre>
</body>
</html>
