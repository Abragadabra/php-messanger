<?php
require_once 'connect.php';

$result = array();

$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

if (!empty($message) && !empty($from)) {
    //? Запрос к БД
    $sql = "INSERT INTO `messages` (`message`, `username`) VALUES ('".$message."', '".$from."')";

    //? Помещаю реузльтат выполнения запроса к базе в result
    $result['send_status'] = $db -> query($sql);
}

//? Закрываю подключание к базе
$db -> close();

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

//? Помещаю в json 
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>