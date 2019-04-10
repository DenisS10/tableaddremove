<?php
header('location: index.php');
$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
//echo '<pre>';
//print_r($_GET);
if (isset($_GET['numberOfRecord']))
    $numberOfRecord = $_GET['numberOfRecord'];
//print_r($file_out);

//echo  '<br>';
if (isset($numberOfRecord) && $numberOfRecord > 0) {
    $numberOfRecord--;
  //  print_r('$numberOfRecord = '.$numberOfRecord.PHP_EOL);

    unset($file_out[$numberOfRecord]);    //удаляем строчку
    $numberOfRecord = '';

    //print_r($file_out);
   // exit();
}
file_put_contents("table.txt", implode("", $file_out));