<?php
$db = new mysqli('host', 'user', 'password', 'base');

if ($db -> connect_error) {
    die('Ошибка подключения' . $db -> connect_error);
}
?>