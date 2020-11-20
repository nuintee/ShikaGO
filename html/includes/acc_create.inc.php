<?php 
    session_start();
    include_once 'conn.inc.php';

    if (isset($_SESSION['aid'])){
        if (isset($_POST['adm-id']) && isset($_POST['adm-pwd']) && isset($_POST['adm-name'])) {
            // Pwd To Var
            $ad_pass = $_POST['adm-pwd'];
           try{
                // Add Admin Account To DB
                $sql = 'INSERT INTO admin_users (admin_id,admin_pwd,admin_name,admin_status) VALUES (:aid,:apd,:ana,:ads)';
                $add_stmt = $pdo->prepare($sql);
                $add_stmt->bindValue(':aid',$_POST['adm-id']);
                $add_stmt->bindValue(':apd',password_hash($ad_pass,PASSWORD_DEFAULT));
                $add_stmt->bindValue(':ana',$_POST['adm-name']);
                $add_stmt->bindValue(':ads',0);
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
        elseif (!isset($_POST['adm-id'])){
            header('Location: ../index.php?error=empty_id');
        }
        elseif (!isset($_POST['adm-pwd'])){
            header('Location: ../index.php?error=empty_password');
        }
        elseif (!isset($_POST['adm-name'])){
            header('Location: ../index.php?error=empty_username');
        }
        else{
            header('Location: ../index.php?error=unknown_error');
        }
    }
    else{
        header('Location: ../index.php?error=invalid_access');
    }
    
?>