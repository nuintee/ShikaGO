<?php 
    session_start();
    /*
    if (isset($_SESSION['aid'])){
        header('Location: ./php/admin.php?user='.$_SESSION['aid']);
    }else{
        echo
    */
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Cache-Control" content="no-cache">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/base.css">
            <link rel="stylesheet" href="./css/layout.css">
            <link rel="stylesheet" href="./css/module.css">
            <link rel="stylesheet" href="./css/state.css">
            <link rel="icon" href="./images/deer.jpg">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">                    
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
            <title>ShikaGO</title>
            <script src="./js/tabs.js" defer = "defer"></script>
            <script src="./js/modals.js" defer = "defer"></script>
            <script src="./js/base64.js" defer = "defer"></script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js" defer = "defer"></script>
            <script src = "../js/feed_ajax.js" defer = "defer"></script>
        </head>
        <body>
            <div class = "l-main">
               <aside class = "l-left-bar">
                    <div class = "l-top-title">
                        <img src="./images/deer.jpg" alt="deer-logo">
                        <h1>ShikaGO</h1>
                    </div> 
                    <hr color = "2C2F3E">
                    <ul class = "l-category">
                        <li><button class = "m-category-btn is-active" data-index = "1"><i class="fas fa-paper-plane"></i>フィード</button></li>
                        <li><button class = "m-category-btn" data-index = "2"><i class="fas fa-info"></i>概要</button></li>
                        <li><button class = "m-category-btn" data-index = "3"><i class="fas fa-lightbulb"></i>プロジェクト</button></li>
                        <li><button class = "m-category-btn" data-index = "4"><i class="fas fa-robot"></i>公式Bot</button></li>
                    </ul>
                    <hr color = "2C2F3E">
                    <footer class = "l-bottom-category">
                        <?php 
                            if (!isset($_SESSION['aid'])){
                                echo "<button class = 'm-category-btn' data-index = 'admin'><i class='fas fa-lock'></i>管理者</button>";
                            }
                            else{
                                echo "<button class = 'm-category-btn' data-index = 'admin'><i class='fas fa-lock-open'></i>".$_SESSION['aid']."</button>";
                            }
                        ?>
                    </footer>
               </aside>
               <main>