<?php
    session_start();
    include_once 'conn.inc.php';

    if (isset($_POST['adm-delete-btn'])){
        try{
            $member = $_GET['account'];
            $member_id = $_GET['id'];
            //Get Image Directory
            $st = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :admin_id');
            $st->bindValue(':admin_id',$member_id);
            $st->execute();
            $res = $st->fetch(PDO::FETCH_ASSOC);
            $image_dir = $res['admin_image'];


            if (file_exists('../uploads/users/'.$image_dir)){
                unlink('../uploads/users/'.$image_dir);
                $sql = 'DELETE FROM admin_users WHERE admin_id = :admin_id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':admin_id',$member_id);
                $stmt->execute();
            }
            else{
                header('Location: ../index.php?error=failed_to_delete_account');
                exit;
            }
            header('Location: ../index.php?success=account_deleted');
            exit;
        }
        catch(PDOException $e){
            header('Location: ../index.php?success='.$e->getMessage());
            exit;
        }
        
    }
    else{
        echo "<script type = 'text/javascript'>confirm('what do you think?');</script>";
    }
?>