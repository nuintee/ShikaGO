
<?php 

include_once('conn.inc.php');

$admin_id_input = $_POST['admin_id_input'];
$admin_pwd_input = $_POST['admin_pwd_input'];

if (isset($_POST['admin_login_btn'])){
    if (empty($admin_id_input)){
        echo 'ユーザーIDが未入力です。';
    }
    else if (empty($admin_pwd_input)){
        echo 'パスワードが未入力です。';
    }
    elseif (!empty($admin_id_input) && !empty($admin_pwd_input)){
        $sql = "SELECT * FROM admin_users WHERE id = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}
else{
    echo "not working";
    exit;
}