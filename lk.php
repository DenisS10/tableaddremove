<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//header('location: index.php');
$loginMod = isset($_POST['login']) ? $_POST['login'] : '';
$oldPass = isset($_POST['oldPass']) ? $_POST['oldPass'] : '';
$newPass = isset($_POST['newPass']) ? $_POST['newPass'] : '';
$newRepeatPass = isset($_POST['newRepeatPass']) ? $_POST['newRepeatPass'] : '';


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
$query = '';
$query = "SELECT `id`,`login`,`password`,`user_name` FROM users";
$res = mysqli_query($db, $query);


//$row = mysqli_fetch_assoc($res);
$users = [];
while ($row = mysqli_fetch_assoc($res)) {
    $users[] = $row;


}
echo '<pre>';
print_r($users);

$username = $users[2]['user_name'];


echo $username;

foreach ($users as $user) {


    $logPass = password_verify($oldPass, $user['password']);
    $newHashPass = password_hash($newRepeatPass,PASSWORD_DEFAULT);

    if ($loginMod == $user['login'] && $logPass == true) {
        $tempUser=$user['login'];
        $queryMod = "UPDATE `users` SET `password`='$newHashPass'WHERE `login` ='$loginMod'  ";//UPDATE `users` SET `login`='www' WHERE (`id`='71')
        $result = mysqli_query($db,$queryMod);
        mysqli_close($db);
        break 1;
    }
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
    <pre>
    <form action="lk.php" method="post">
        <input class="form-control" placeholder="Enter login" name="loginMyAcc">
        <input class="form-control" placeholder="Enter old password" autocomplete="off" name="oldPass">
        <input class="form-control" placeholder="Enter new password" type="password" autocomplete="off" name="newPass">
        <input class="form-control" placeholder="Repeat new password" type="password" autocomplete="off"
               name="newRepeatPass">
        <!--        <div>-->
        <!--            <input class="form-check-input" type="checkbox" name="cbRemember">Remember me-->
        <!---->
        <!--        </div>-->
        <button class="btn btn-primary" type="submit">Login</button>

    </form>


</div>

</body>
</html>
