<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
header('location: index.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['modTask'])) {
    $modTask = $_GET['modTask'];
}
if (isset($_GET['modDeadline'])) {
    $modDeadline = $_GET['modDeadline'];
}
echo '<pre>';
print_r($_GET);
$workArr = file("table.txt"); // Считываем весь файл в массив

//if (isset($numberOfRecord) && $numberOfRecord > 0) {
    //$recordCount--;
$workArr[$id-1] = $modTask . '&' . $modDeadline . '&' . PHP_EOL;
file_put_contents("table.txt", implode("", $workArr));
echo '<pre>';
print_r($workArr);



    //unset($file_out[$numberOfRecord]);    //удаляем строчку
   // $numberOfRecord = '';
//}

?>
