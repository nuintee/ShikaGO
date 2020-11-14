<?php
//session　開始 & $_SESSION[]でユーザー名取得し投稿に反映
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
        $stmt->bindValue(':pst_author',"test1");
        $stmt->bindValue(':pst_date',"2000-12-26");
        $stmt->execute();
        $st = $pdo->query('SELECT * FROM post_content');
        $res = $st->fetchAll();
        //print_r($res);
        header("Location: ../php/admin.php");
        for ($i= 0; $i < count($res); $i++) { 
            echo "<div class = 'm-content-panel post'>
            <img src='./images/dummy.jpg' alt='post-image'>
            <div class = 'content post'>
                <h4 class = 'post-title'>".$res[$i]['post_title']."</h4>".
                "<p class = 'content-body post'>". $res[$i]['post_description']. "</p>
                <div class = 'post-footer'>
                    <p class = 'post-date'>".$res[$i]['post_date']."</p>
                    <p class = 'post-author'>投稿者 : ".$res[$i]['post_author']."</p>
                </div>
            </div>
        </div>";
        }
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