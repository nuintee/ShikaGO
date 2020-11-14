<?php
session_start();
include_once 'conn.inc.php';

$pst_url = $_POST['pst-img'];
$pst_title = $_POST['pst-title'];
$pst_description = $_POST['pst-description'];

if(isset($_POST['pst-submit-btn'])){
    if (!empty($pst_url) && !empty($pst_title) && !empty($pst_description)){
        $sql = 'INSERT INTO post_contents (post_title, post_description, post_image, post_author, post_date) VALUES (:pst_title, :pst_description, :pst_images, :pst_author, :pst_date)';
        $stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':pst_url',$pst_url);
        $stmt->bindValue(':pst_title',$pst_title);
        $stmt->bindValue(':pst_description',$pst_description);
        $stmt->bindValue(':pst_images',$pst_url);
        $stmt->bindValue(':pst_author',$_SESSION['admin_id_input']);
        $stmt->bindValue(':pst_date',date('Y/m/d H:i:s', time()));
        $stmt->execute();
        $st = $pdo->query('SELECT * FROM post_contents');
        $res = $st->fetchAll(); 
        header("Location: ../php/admin.php");
        exit();
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