<?php
    include_once './conn.inc.php';
    /* Get Online Users */
    $sql1 = 'SELECT * FROM admin_users WHERE admin_status = :ad_statT';
    $stmt = $pdo->prepare($sql1);
    $stmt->bindValue(':ad_statT',1);
    $stmt->execute();
    $resT = $stmt->fetchAll();
    /* Get offline Users*/
    $sql2 = 'SELECT * FROM admin_users WHERE admin_status = :ad_statF';
    $stmt = $pdo->prepare($sql2);
    $stmt->bindValue(':ad_statF',0);
    $stmt->execute();
    $resF = $stmt->fetchAll();
    if ($resT['admin_status'] == 1){
        header('Content-type: application/json');
        echo json_encode($resT);
    }
    else if ($resF['admin_status'] == 0){
        header('Content-type: application/json');
        echo json_encode($resF);
    }
?>