<?php
//phpinfo();
//echo $_ENV['DB_PASSWORD'];
$dsn = 'mysql:dbname=heroku_cf252f380af6ab2;host=us-cdbr-east-02.cleardb.com;charset=utf8;';
$db_user = 'bf1be1e594e912';
$db_pwd = '73646de4';

try {
    $pdo = new PDO($dsn, $db_user, $db_pwd);
} catch (PDOException $e) {
    print_r("not working".$e);
    exit();
}