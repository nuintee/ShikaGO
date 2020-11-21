<?php
    session_start();
    include_once 'conn.inc.php';

    if (isset($_POST['adm-delete-btn'])){
        try{
            $member = $_GET['account'];
            $member_id = $_GET['id'];
            $sql = 'DELETE FROM admin_users WHERE admin_name = :admin_name AND admin_id = :admin_id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':admin_name',$member);
            $stmt->bindValue(':admin_id',$member_id);
            $stmt->execute();
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