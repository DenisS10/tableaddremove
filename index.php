<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<head>
    <meta charset="utf-8">
    <title>table</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
<pre>
    <?
    if (isset($_POST['task'])) {
        $task = $_POST['task'];
    }
    if (isset($_POST['deadline'])) {
        $deadline = $_POST['deadline'];
    }
    ?>
</pre>



<?

    if (!empty($_POST['task'] && $_POST['deadline'])) {
        if (isset($task) && isset($deadline)) {


            $fw = fopen("table.txt", 'a');
//$line = implode(PHP_EOL, $line);
            $str = $task . ';' . $deadline . ';' . PHP_EOL;
            fwrite($fw, $str);
            fclose($fw);
        }
    }

?>
<div class="tableDiv">
    <table class="table table-bordered">
        <?php $fp = fopen('table.txt', 'r');
        while ($line = fgets($fp)) {
            if (!$line)
                continue;

            $line = explode(';', $line);
            if (count($line) < 2)
                continue;
            ?>
            <tr>
                <td><?= $line[0] ?></td>
                <td><?= $line[1] ?></td>

            </tr>

            <?
        }
        fclose($fp);
        ?>

    </table>

</div>
<div class="formDiv">
    <form action="index.php" method="post">
        <input autocomplete="off" name="task">
        <input autocomplete="off" name="deadline">
        <button class="btn" type="submit">Send</button>
    </form>
</div>

</html>