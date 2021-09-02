<?php
$options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
$driver = 'mysql';
$charset = 'utf8';

try {
$pdo = new PDO("$driver:host=localhost;dbname=messanger;charset=$charset",
    'root',
    'root',
    $options
);
} catch (PDOException $e) {
    die('Ошибка при подключении к базе данных');
}
?>