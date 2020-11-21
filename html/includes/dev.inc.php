<?php
    include_once 'conn.inc.php';
    //Incase Account Was Updated Inappropriately.

    $hashed_pwd = password_hash('kojika123',PASSWORD_DEFAULT);

    $sql = 'UPDATE admin_users SET admin_pwd = :new_admin_pwd WHERE id = 11';
    $st = $pdo->prepare($sql);
    $st->bindValue(':new_admin_pwd',$hashed_pwd);
    $st->execute();
?>