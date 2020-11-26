<?php
session_start();
include_once './conn.inc.php';

if (isset($_POST['post-del-btn'])){
    if (isset($_GET['posted_id'])){
        $pid_del = $_GET['posted_id'];
        //Delte Contents
        $sql_cont = 'DELETE FROM post_contents WHERE post_id = :pid_del';
        $st_c = $pdo->prepare($sql_cont);
        $st_c->bindValue(':pid_del',$pid_del);
        $st_c->execute();
        //Find Image
        $sql_find = 'SELECT * FROM post_images WHERE file_id = :fid_del';
        //Delete Images
        $sql_imag = 'DELETE FROM post_images WHERE file_id = :fid_del';
        $st_i = $pdo->prepare($sql_find);
        $st_i->bindValue(':fid_del',$pid_del);
        $st_i->execute();
        $res_find = $st_i->fetch();
        //Deletion
        $st_i = $pdo->prepare($sql_imag);
        $st_i->bindValue(':fid_del',$pid_del);
        $st_i->execute();
        //Uploadsからも削除
        //unlink('../uploads/posts/'.$res_find['file_name']);
        header('Location: ../index.php?post=deleted');
    }
    else{
        header('Location: ../index.php?error=empty_post');
    }
}
else{
    header('Location: ../index.php?error=invalid_access');
}

?>