<?php
header('location: index.php');
//Сохранение в файл
if (isset($_POST['task'])) {
    $task = $_POST['task'];
}
if (isset($_POST['deadline'])) {
    $deadline = $_POST['deadline'];
}
if (!empty($task) && !empty($deadline)) {



        $fw = fopen("table.txt", 'a');
        $str = $task . '&' . $deadline . '&' . PHP_EOL;
        fwrite($fw, $str);
        fclose($fw);
    }

