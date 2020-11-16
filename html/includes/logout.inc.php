<?php

session_start();

#Session Statusを0にする (オフライン化)
include_once '../includes/conn.inc.php';
$sql_statusF = $pdo->prepare('UPDATE admin_users SET admin_status = 0 WHERE admin_id = :s_id');
$sql_statusF->bindValue(":s_id",$_SESSION['aid']);
$sql_statusF->execute();

session_unset();
session_destroy();

header("location: ../index.php");
exit();