<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<?

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$line = '';
$fp = fopen('table.txt', 'r');
for ($i = 0; $i < $id; $i++) {
    $line = fgets($fp);
}


$lines = explode('&', $line);


?>
<div class="formDivAdd">
    <form action="save.php" method="get">
        <input autocomplete="off" name="id" value="<?= $id ?>" hidden>
        <input autocomplete="off" name="modTask" value="<? if (isset($lines[0])) echo $lines[0] ?>">
        <input autocomplete="off" name="modDeadline" value="<? if (isset($lines[1])) echo $lines[1] ?>">
        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>

</body>
</html>