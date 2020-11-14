<?php
//session　開始 & $_SESSION[]でユーザー名取得し投稿に反映
include_once 'conn.inc.php';

$pst_url = $_POST['pst-url'];
$pst_title = $_POST['pst-title'];
$pst_description = $_POST['pst-description'];

if(isset($_POST['pst-submit-btn'])){
    if (!empty($pst_url) && !empty($pst_title) && !empty($pst_description)){
        $sql = 'ADD INTO post_content(post_title, post_description, post_author, post_date) VALUES (:pst_url, :pst_title, :pst_description, :pst_author, :pst_date)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pst_url',$pst_url);
        $stmt->bindValue(':pst_title',$pst_title);
        $stmt->bindValue(':pst_description',$pst_description);
        $stmt->bindValue(':pst_author',"test1");
        $stmt->bindValue(':pst_date',"2000-12-26");
        $stmt->execute();
        $res = $stmt->fetch();
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