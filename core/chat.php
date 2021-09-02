<?php
require_once 'connect.php';

$result = array();

$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

if (!empty($message) && !empty($from)) {
    $sql = 'INSERT INTO messages (message, from) VALUES (:message, :from)';

    $params = [
        'message' => $message,
        'from' => $from
    ];

    $query = $pdo -> prepare($sql);

    $result['send_status'] = $query -> execute($params);

    header('Access-Control-Allow-Orgin: *');
    header('Content-Type: application/json');

    echo json_encode($result);
}
?>