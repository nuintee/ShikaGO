<?php
session_start();
include_once './conn.inc.php';

if (isset($_POST['post-del-btn'])){
    if (isset($_GET['posted_id'])){
        $pid_del = $_GET['posted_id'];
        //Delte Contents
        //Find Image
        $sql_find = 'SELECT * FROM post_contents WHERE post_id = :pid_del';
        //Delete Images
        $st_i = $pdo->prepare($sql_find);
        $st_i->bindValue(':pid_del',$pid_del);
        $st_i->execute();
        $res_find = $st_i->fetch();
        //Deletion
        //Uploadsからも削除
        if (file_exists('../uploads/posts/'.$res_find['post_image'])){
            unlink('../uploads/posts/'.$res_find['post_image']);
            $sql_cont = 'DELETE FROM post_contents WHERE post_id = :pid_del';
            $st_c = $pdo->prepare($sql_cont);
            $st_c->bindValue(':pid_del',$pid_del);
            $st_c->execute();
        }
        else{
            header('Location: ../index.php?error=failed_to_remove_image');
            exit;
        } 
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