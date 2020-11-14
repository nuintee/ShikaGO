<?php
//phpinfo();
//echo $_ENV['DB_PASSWORD'];
$dsn = 'mysql:dbname=ShikaGO_DB;host=45a3999ae9dc;';
$db_user = 'root';
$db_pwd = 'secret';

try {
    $pdo = new PDO($dsn, $db_user, $db_pwd);
} catch (PDOException $e) {
    exit();
}