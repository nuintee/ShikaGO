<?php
    include_once '../includes/conn.inc.php';
    #include_once '../includes/online.inc.php';
    session_start();
    #Session Statusを1にする (オンライン化)
    $sql_statusT = $pdo->prepare('UPDATE admin_users SET admin_status = 1 WHERE admin_id = :s_id');
    $sql_statusT->bindValue(":s_id",$_SESSION['aid']);
    $sql_statusT->execute();
    $result = $sql_statusT->fetchAll();
    echo json_encode($result);
?>

<form action="../includes/logout.inc.php" method = "post">
    <input type="submit" value = "logout">
</form>

<div class = "l-pages" id = "post_page">
    <form action = "../includes/posting.inc.php" method = "post" enctype = "multipart/form-data">
        <input type="file" accept = "image/*" name = "pst-img" class = "pst-imgs-input">
        <input type="text" name = "pst-title" placeholder = "記事タイトル">
        <textarea name="pst-description"　placeholder = "記事本文" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="投稿" name = "pst-submit-btn">
    </form>
</div>

<script src="../js/base64.js"></script>