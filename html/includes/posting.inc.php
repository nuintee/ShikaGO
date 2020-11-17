<?php
session_start();
include_once 'conn.inc.php';

$pst_img = $_FILES['pst-img'];
$pst_title = $_POST['pst-title'];
$pst_description = $_POST['pst-description'];

if(isset($_POST['pst-submit-btn'])){
    if (!empty($pst_title) && !empty($pst_description)){
        $file_name = $pst_img['name'];
        $file_tmp_name = $pst_img['tmp_name'];
        $file_size = $pst_img['size'];
        $file_error = $pst_img['error'];
        $file_type= $pst_img['type'];

        $file_extension = explode('.',$file_name);
        $file_actual_extension = strtolower(end($file_extension));

        $allowed = array('jpg','jpeg','png','HEIC');
        if ($file_error === 0){
            if ($file_size < 1000000){
                $file_name_new = uniqid('', true).".".$file_actual_extension;
                $file_destination = '../uploads/'.$file_name_new;
                $sql = 'INSERT INTO post_contents (post_title, post_description, post_image, post_author, post_date) VALUES (:pst_title, :pst_description, :pst_images, :pst_author, :pst_date)';
                $stmt = $pdo->prepare($sql);
                //$stmt->bindValue(':pst_url',$pst_img);
                $stmt->bindValue(':pst_title',$pst_title);
                $stmt->bindValue(':pst_description',$pst_description);
                $stmt->bindValue(':pst_images',$pst_img);
                $stmt->bindValue(':pst_author',$_SESSION['aid']);
                $stmt->bindValue(':pst_date',date('Y/m/d H:i:s', time()));
                $stmt->execute();
                $st = $pdo->query('SELECT * FROM post_contents');
                $fk_st = $pdo->prepare('INSERT INTO post_images(file_name,file_size,file_type) VALUES (:file_name, :file_size, :file_type)');
                $fk_st->bindValue(':file_name',$file_name_new);
                $fk_st->bindValue(':file_size',$file_size);
                $fk_st->bindValue(':file_type',$file_type);
                $fk_st->execute();
                $fk_res = $fk_st->fetchAll();
                $res = $st->fetchAll();
                move_uploaded_file($file_tmp_name,$file_destination);
                header("Location: ../index.php?status=posted");
                exit();
            }
            else{
                echo $file_size;
            }
        }
        else {
            echo "an error occured";
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