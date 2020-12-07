<?php 
    session_start();
    include_once 'conn.inc.php';
    if (isset($_SESSION['aid'])){
        if (isset($_POST['adm-id']) && isset($_POST['adm-pwd']) && isset($_POST['adm-name']) && isset($_FILES['adm-img'])){
            //Image Handling
            $pst_img = $_FILES['adm-img'];
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
                    $file_destination = '../uploads/users/'.$file_name_new;
                    move_uploaded_file($file_tmp_name,$file_destination);
                    // Pwd To Var
                    $ad_pass = $_POST['adm-pwd'];
                    try{
                        // Add Admin Account To DB
                        $sql = 'INSERT INTO admin_users (admin_id,admin_pwd,admin_name,admin_comment,admin_image,admin_status,grade) VALUES (:aid,:apd,:ana,:aco,:adm,:ads,:grd)';
                        $add_stmt = $pdo->prepare($sql);
                        $add_stmt->bindValue(':aid',$_POST['adm-id']);
                        $add_stmt->bindValue(':apd',password_hash($ad_pass,PASSWORD_DEFAULT));
                        $add_stmt->bindValue(':ana',$_POST['adm-name']);
                        $add_stmt->bindValue(':aco',null);
                        $add_stmt->bindValue(':adm',$file_name_new);
                        $add_stmt->bindValue(':ads',0);
                        //Checks if the account is created by admin or others
                        if ($_SESSION['grade'] != 1){
                            $add_stmt->bindValue(':grd',0);
                        }
                        else{
                            $add_stmt->bindValue(':grd',1);
                        }
                        $add_result = $add_stmt->execute();
                        if ($add_result){
                            header('Location: ../index.php?success=added_user');
                            exit;
                        }
                        else{
                            header('Location: ../index.php?error=failed_to_add_user');
                            exit;
                        }
                    }
                    catch (PDOException $e){
                         header('Location: ../index.php?error='.$e->getMessage());
                         exit;
                    }
                }
                else{
                    header('Location: ../index.php?error=file_size_too_large');
                }
            }
            else{
                header('Location: ../index.php?error=file_error');
            }
        }
        elseif (!isset($_POST['adm-id'])){
            header('Location: ../index.php?error=empty_id');
        }
        elseif (!isset($_POST['adm-pwd'])){
            header('Location: ../index.php?error=empty_password');
        }
        elseif (!isset($_POST['adm-name'])){
            header('Location: ../index.php?error=empty_username');
        }
        elseif (!isset($_FILES['adm-img'])){
            var_dump($_FILES['adm-img']);
            header('Location: ../index.php?error=empty_image');
        }
        else{
            header('Location: ../index.php?error=unknown_error');
        }
    }
    else{
        header('Location: ../index.php?error=invalid_access');
    }
    
?>