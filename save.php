<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
header('location: index.php');
//if (isset($_GET['id'])) {
//    $id = $_GET['id'];
//}
//if (isset($_GET['modTask'])) {
//    $modTask = $_GET['modTask'];
//}
//if (isset($_GET['modDeadline'])) {
//    $modDeadline = $_GET['modDeadline'];
//}
$id = isset($_GET['id']) ? $_GET['id'] : '';
$modTask = isset($_GET['modTask']) ? $_GET['modTask'] : '';
$modDeadline = isset($_GET['modDeadline']) ? $_GET['modDeadline'] : '';



$workArr = file("table.txt"); // Считываем весь файл в массив

//if (isset($numberOfRecord) && $numberOfRecord > 0) {
//$recordCount--;
$workArr[$id - 1] = $modTask . '&' . $modDeadline . '&' . PHP_EOL; //Рефакторинг массива
file_put_contents("table.txt", implode("", $workArr));//Запись нового массива в файл



//unset($file_out[$numberOfRecord]);    //удаляем строчку
// $numberOfRecord = '';
//}

?>
