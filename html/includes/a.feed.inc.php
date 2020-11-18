<?php
    include_once '../includes/conn.inc.php';
    $sql = "SELECT * FROM admin_users WHERE admin_status = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
?>