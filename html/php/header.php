<?php 
    session_start();
    if (isset($_SESSION['aid'])){
        echo "welcome admin";
        echo '<form action="./includes/logout.inc.php" method = "post">
            <input type="submit" value = "logout">
        </form>';
    }else{
        echo '<!DOCTYPE html>
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
                        <button class = "m-category-btn" data-index = "admin"><i class="fas fa-lock"></i>管理者</button>
                    </footer>
               </aside>
               <main>
               <?php //include_once(modals.html)?>
                   <div class = "m-post-panels is-active" data-index = "1">
                        <div class = "m-content-panel post">
                            <img src="./images/dummy.jpg" alt="post-image">
                            <div class = "content post">
                                <h4 class = "post-title">投稿開始!</h4>
                                <p class = "content-body post">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                                <div class = "post-footer">
                                    <p class = "post-date">2020/11/18/22:30</p>
                                    <p class = "post-author">投稿者 : イッシー</p>
                                </div>
                            </div>
                        </div>
                        <div class = "m-content-panel post">
                            <img src="./images/dummy.jpg" alt="post-image">
                            <div class = "content post">
                                <h4 class = "post-title">投稿開始!</h4>
                                <p class = "content-body post">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                                <div class = "post-footer">
                                    <p class = "post-date">2020/11/18/22:30</p>
                                    <p class = "post-author">投稿者 : イッシー</p>
                                </div>
                            </div>
                        </div>
                        <div class = "m-content-panel post">
                            <img src="./images/dummy.jpg" alt="post-image">
                            <div class = "content post">
                                <h4 class = "post-title">投稿開始!</h4>
                                <p class = "content-body post">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                                <div class = "post-footer">
                                    <p class = "post-date">2020/11/18/22:30</p>
                                    <p class = "post-author">投稿者 : イッシー</p>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class = "m-post-panels" data-index = "2">
                       <?php //echo <p class = "m-page-title">概要</p> ?>
                        <div class = "m-content-panel">
                            <div class = "content">
                                <h4 class = "post-title">ShicaGOとは</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                                <h4 class = "post-title">将来</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                                <h4 class = "post-title">使用技術</h4>
                                <p class = "content-body">
                                    Docker, HTML/CSS, JavaScript, PHP, MySQL<br>
                                    (フレームワーク未使用)
                                </p>
                            </div>
                        </div>
                   </div>
                   <div class = "m-post-panels" data-index = "3">
                       <?php //echo <p class = "m-page-title">プロジェクト一覧</p> ?>
                        <div class = "m-content-panel project" data-index = "official_bot" onclick = "open_official_bot(this)">
                            <img src="./images/robot.jpg" alt="">
                            <div class = "content project">   
                                <h4 class = "post-title"><i class="fab fa-github"></i><i class="fab fa-node-js"></i>ShicaGO Bot</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                            </div>
                        </div>
                   </div>
                   <div class = "m-post-panels" data-index = "4">
                        <?php //echo <p class = "m-page-title">公式bot <span class = "m-under-constuction dis txt">&nbsp;開発中</span></p> ?>
                        <div class = "m-content-panel project dis">
                            <img src="./images/robot.jpg" alt="">
                            <div class = "content project">   
                                <h4 class = "post-title"><i class="fab fa-github"></i><i class="fab fa-node-js"></i>ShicaGO Bot</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                            </div>
                        </div>
                        <?php //echo <p class = "m-page-title">Botコマンド一覧</p> ?>
                        <div class = "m-content-panel">
                            <div class = "content">
                                <h4 class = "post-title">!help</h4>
                                <p class = "content-body">
                                    Botコマンドの表示
                                </p>
                                <h4 class = "post-title">!bmi 身長体重</h4>
                                <p class = "content-body">
                                    BMI指数の表示
                                </p>
                                <h4 class = "post-title">!decide 選択肢A 選択肢B 選択肢C (何個でも可能)</h4>
                                <p class = "content-body">
                                    選択肢からランダムで一つを選択
                                </p>
                                <h4 class = "post-title">!movie タイトル</h4>
                                <p class = "content-body">
                                該当映画のポスターと平均ユーザースコアを表示<br>*TMDB API使用
                                </p>
                                <h4 class = "post-title">!rate タイトル 評価点(1 - 10)</h4>
                                <p class = "content-body">
                                該当映画の評価を行う (1 - 10点)<br>要TMDBアカウント<br>*TMDB API使用
                                </p>
                                <input type="submit" class = "m-submit-btn dis" value = "サーバーに招待する [現在不可]">
                            </div>
                        </div>
                   </div>';
    }
?>

