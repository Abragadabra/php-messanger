<?php
require_once 'connect.php';

$result = array();

//? Помещаю в переменные данные с формы
$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

//? Если переменные не пустые то делаю запрос в базу, и помещаю данные
if (!empty($message) && !empty($from)) {

    //? SQL запрос
    $sql = 'INSERT INTO messages (message, username) VALUES (:message, :username)';

    //? Вместо :message и :from помещаю данные пользователя
    $params = [
        'message' => $message,
        'username' => $from
    ];

    //? Подготавливаю запрос в БД
    $query = $pdo -> prepare($sql);

    //? Результат запроса в базу, записываю в переменную
    $result['send_status'] = $query -> execute($params);

    //? Отображаю сообщения
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;

    $items = 'SELECT * FROM messages WHERE id >' . $start;

    $query = $pdo -> prepare($items);

    $query -> execute();

    while($row = $query -> fetch(PDO::FETCH_OBJ)) {
        $result['items'][] = $row;
    }

    header('Access-Control-Allow-Orgin: *');

    //? Тип данных json
    header('Content-Type: application/json');

    //? Превращаю в json
    echo json_encode($result);
} else {
    die('ошибка');
}
?>