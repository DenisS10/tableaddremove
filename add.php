<?php
header('location: index.php');
//Сохранение в файл
//if (isset($_POST['task'])) {
//    $task = $_POST['task'];
//}
//if (isset($_POST['deadline'])) {
//    $deadline = $_POST['deadline'];
//}

$task = isset($_POST['task']) ? $_POST['task'] : '';
$deadline = isset($_POST['deadline']) ? $_POST['deadline'] : '';




if (!empty($task) && !empty($deadline)) {


//    $fw = fopen("table.txt", 'a');
//    $str = $task . '&' . $deadline . '&' . PHP_EOL;
//    fwrite($fw, $str);
//    fclose($fw);
    $db = mysqli_connect('site.local',
        'root',
        '',
        'Tasks'
    );
    if (!$db) {
        echo $db->errno . ' ' . $db->error . ' ';
        print_r($db->error_list);
        exit();
    }
    $currDate = time();

    $querySave="insert into task(task, deadline, `creation date`) values('$task','$deadline','$currDate')";
    $result = mysqli_query($db,$querySave);


    mysqli_close($db);

}
