<?php
include_once 'conn.inc.php';

$admin_id_input = $_POST['admin_id_input'];
$admin_pwd_input = $_POST['admin_pwd_input'];

if (isset($_POST['admin_login_btn'])){
    if (empty($admin_id_input)){
        echo 'ユーザーIDが未入力です。';
    }
    else if (empty($admin_pwd_input)){
        echo 'パスワードが未入力です。';
    }
    else if (!empty($admin_id_input) && !empty($admin_pwd_input)){
        //$sql = 'INSERT INTO admin_users (admin_id, admin_pwd) VALUES ("root4","kojika123")';
        $sql = 'SELECT * FROM admin_users WHERE admin_id = :admn_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':admn_id',$admin_id_input);
        $stmt->execute();
        $admin = $stmt->fetch();
        if($admin['admin_id'] === $admin_id_input && password_verify($admin['admin_pwd'],password_hash($admin_pwd_input,PASSWORD_DEFAULT))){
            session_start();
            $_SESSION['aid'] = $admin['admin_name'];
            $sql_status = 'UPDATE admin_users SET admin_status = 1 WHERE admin_id = :admin_id_input';
            $stmt_status = $pdo->prepare($sql_status);
            $stmt_status->bindValue(':admin_id_input',$admin_id_input);
            $stmt_status->execute();
            header('Location: ../../index.php?login=success');
            exit();
        }
        else{
            header('Location: ../../index.php?login=failed');
            exit();
        }
    }
}
else{
    header('Location: ../../index.php');
    exit;
}
?>