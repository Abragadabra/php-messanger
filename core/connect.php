<?php
$db = new mysqli('localhost', 'root', 'root', 'messanger');

if ($db -> connect_error) {
    die('Ошибка подключения' . $db -> connect_error);
}
?>