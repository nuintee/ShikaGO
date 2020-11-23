<?php
session_start();
session_regenerate_id();
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

        $login_sql = 'SELECT * FROM admin_users WHERE admin_id = :admn_id';
        $login_stmt = $pdo->prepare($login_sql);
        $login_stmt->bindValue(':admn_id',$admin_id_input);
        $login_stmt->execute();
        $admin = $login_stmt->fetch(PDO::FETCH_ASSOC);
        if($admin['admin_id'] === $admin_id_input && password_verify($admin_pwd_input,$admin['admin_pwd'])){
            $_SESSION['aid'] = $admin['admin_name'];
            $_SESSION['adid'] = $admin['admin_id'];
            $_SESSION['adcomment'] = $admin['admin_comment'];
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