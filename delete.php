<?php
$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
if (isset($numberOfRecord) && $numberOfRecord > 0) {
    //$recordCount--;


    unset($file_out[$numberOfRecord]);    //удаляем строчку
    $numberOfRecord = '';
}
file_put_contents("table.txt", implode("", $file_out));