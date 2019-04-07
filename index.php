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

</head>
<body>
<pre>
    <? //проверка входящих данных
    if (isset($_POST['task'])) {
        $task = $_POST['task'];
    }
    if (isset($_POST['deadline'])) {
        $deadline = $_POST['deadline'];
    }
    if (isset($_POST['numberOfRecord'])) {
        $numberOfRecord = $_POST['numberOfRecord'];
    }
    ?>
</pre>

<?
//Сохранение в файл
if (!empty($task) && !empty($deadline)) {
    if (isset($task) && isset($deadline)) {


        $fw = fopen("table.txt", 'a');
        $str = $task . ';' . $deadline . ';' . PHP_EOL;
        fwrite($fw, $str);
        fclose($fw);
    }
}

?>

<?


$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
if (isset($numberOfRecord) && $numberOfRecord > 0) {
    $numberOfRecord--;
    unset($file_out[$numberOfRecord]);    //удаляем строчку
    $numberOfRecord = '';
}
file_put_contents("table.txt", implode("", $file_out));

//echo '---------------------------------------------------------------------------';
//var_dump($file_out);
//записываем нужную строку  в файл
//file_put_contents("rob.txt", $file_out[$row_number], FILE_APPEND);


//записали остачу в файл
//file_put_contents("co.txt", implode("", $file));
?>
</div>
<div class="tableDiv">
    <table class="table table-bordered">
        <?php $fp = fopen('table.txt', 'r');//Чтение в таблицу
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
                <!-- <td><button class="btn-danger" type="button">X</button></td>-->
            </tr>

            <?
        }
        fclose($fp);
        ?>

    </table>

</div>
<div class="formDivAdd">
    <form action="index.php" method="post">
        <p>Добавление данных в таблицу</p>
        <input autocomplete="off" name="task">
        <input autocomplete="off" name="deadline">
        <button class="btn btnSend" type="submit">Send</button>
    </form>
</div>
<div class="formDivAdd">
    <form action="index.php" method="POST">
        <p>Удаление данных из таблицы по номеру строки</p>
        <input autocomplete="off" placeholder="Номер строки" name="numberOfRecord">
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</div>
</body>
</html>