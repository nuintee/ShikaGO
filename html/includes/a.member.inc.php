<?php
    include_once '../includes/conn.inc.php';
    $sql = "SELECT * FROM admin_users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
?>