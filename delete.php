<?php
header('location: index.php');
$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
if (isset($_GET['numberOfRecord']))
    $numberOfRecord = $_GET['numberOfRecord'];
echo '<pre>';
print_r($_GET);
print_r($file_out);

if (isset($numberOfRecord) && $numberOfRecord >= 0) {
    $numberOfRecord--;


    unset($file_out[$numberOfRecord]);    //удаляем строчку
    $numberOfRecord = '';
}
file_put_contents("table.txt", implode("", $file_out));