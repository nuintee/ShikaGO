<?php
session_start();
include_once 'conn.inc.php';

$pst_url = $_POST['pst-url'];
$pst_title = $_POST['pst-title'];
$pst_description = $_POST['pst-description'];

if(isset($_POST['pst-submit-btn'])){
    if (!empty($pst_url) && !empty($pst_title) && !empty($pst_description)){
        $sql = 'INSERT INTO post_content (post_title, post_description, post_author, post_date) VALUES (:pst_title, :pst_description, :pst_author, :pst_date)';
        $stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':pst_url',$pst_url);
        $stmt->bindValue(':pst_title',$pst_title);
        $stmt->bindValue(':pst_description',$pst_description);
        $stmt->bindValue(':pst_author',$_SESSION['admin_id_input']);
        $stmt->bindValue(':pst_date',date('Y/m/d H:i:s', time()));
        $stmt->execute();
        $st = $pdo->query('SELECT * FROM post_content');
        $res = $st->fetchAll();
        //print_r($res);
        header("Location: ../php/admin.php");
    }
    else{
        echo "empty!";
        exit();
    }
}
else{
    header('Location: ../php/admin.php');
    exit();
}