<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//header('location: index.php');
$login = isset($_POST['login']) ? $_POST['login'] : '';


$db = mysqli_connect('site.local',
    'root',
    '',
    'Tasks'
);
if (!$db) {
    echo $db->errno . ' ' . $db->error . ' ';
    print_r($db->error_list);
    //exit();
}
$query='';
$query = "SELECT `id`,`login`,`password`,`user_name` FROM users";
$res = mysqli_query($db, $query);




//$row = mysqli_fetch_assoc($res);
$users = [];
while ($row = mysqli_fetch_assoc($res)) {
    $users[] = $row;


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
    <?= '<pre>' ?>
    <form action="lk.php" method="post">
        <input class="form-control" placeholder="Введите старый пароль" name="oldPass">
        <input class="form-control" placeholder="Введите новый пароль" type="password" autocomplete="off" name="newPass">
        <input class="form-control" placeholder="Повторите пароль" type="password" autocomplete="off" name="newRepeatPass">
<!--        <div>-->
<!--            <input class="form-check-input" type="checkbox" name="cbRemember">Remember me-->
<!---->
<!--        </div>-->
        <button class="btn btn-primary" type="submit">Login</button>

    </form>


</div>

</body>
</html>
