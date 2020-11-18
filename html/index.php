<?php session_start(); ?>
<?php include_once './includes/conn.inc.php' ?>
<?php include_once './includes/colors.inc.php';?>
<?php include_once './php/header.php'?>
<?php include_once "./modals.html" ?>
<div class = "m-post-panels is-active" data-index = "1">
    <p class = "m-page-title">投稿一覧</p>
    <?php 
    $st = $pdo->query('SELECT * FROM post_contents');
    $st_img = $pdo->query('SELECT * FROM post_images');
            $res = $st->fetchAll();
            $res_img = $st_img->fetchAll();
            //print_r($res);
            if (count($res) >= 1 && count($res_img) >= 1){
                for ($i= 0; $i < count($res); $i++) { 
                    echo "<div class = 'm-content-panel post'>
                    <img src='./uploads/".$res_img[$i]['file_name']."'>
                    <div class = 'content post'>
                        <h4 class = 'post-title'>".$res[$i]['post_title']."</h4>
                        <p class = 'content-body post'>". $res[$i]['post_description']. "</p>
                        <div class = 'post-footer'>
                            <p class = 'post-date'>".$res[$i]['post_date']."</p>
                            <p class = 'post-author'>投稿者 : ".$res[$i]['post_author']."</p>
                        </div>
                        </div>";
                        if (isset($_SESSION['aid'])){
                            echo "<form action = './includes/post_del.inc.php?posted_id=".$res[$i]['post_id']."' method = 'post'>
                                    <button type = 'submit' value = 'delete' name = 'post-del-btn' class = 'admin_post_del_btn' style = 'background-color:#1A1C27;border:none;border-radius:20px;outline:none;cursor:pointer;height:50px;position:absolute;top:0;right:0;width:50px;'><i class='fas fa-trash-alt' style = 'color:#FF5252;pointer-events:none;object-fit:cover;'></i></button>
                                </form>";
                            }
                            echo"</div>";
                }
            }
            else{
                echo '<h3 class = "m-no-contents-txt"><i class="far fa-frown"></i>まだ投稿はありません。<h3>';
            }
    ?>
</div>
<div class = "m-post-panels" data-index = "2">
                    <p class = "m-page-title">概要</p>
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
                        <p class = "m-page-title">プロジェクト一覧</p>
                        <div class = "m-content-panel project" data-index = "official_bot" onclick = "open_official_bot(this)">
                            <img src="./images/deer.jpg" alt="">
                            <div class = "content project">   
                                <h4 class = "post-title"><i class="fab fa-github"></i><i class="fab fa-node-js"></i>ShicaGO Bot</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                            </div>
                        </div>
                   </div>
                   <div class = "m-post-panels" data-index = "4">
                        <p class = "m-page-title">公式bot <span class = "m-under-constuction dis txt">&nbsp;開発中</span></p>
                        <div class = "m-content-panel project dis">
                            <img src="./images/deer.jpg" alt="">
                            <div class = "content project">   
                                <h4 class = "post-title"><i class="fab fa-github"></i><i class="fab fa-node-js"></i>ShicaGO Bot</h4>
                                <p class = "content-body">
                                カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                                </p>
                            </div>
                        </div>
                        <p class = "m-page-title">Botコマンド一覧</p>
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
                                <a href = "paypal.com" class = "m-submit-btn" style = "text-decoration:none;background-color:#FFF"><i class="fab fa-paypal" style = "margin-right:1em;color:light-blue"></i>ドネート (Paypal.Me使用)</a>
                                <input type="submit" class = "m-submit-btn dis" value = "サーバーに招待する [現在不可]">
                            </div>
                        </div>
                   </div>
            <div class ="m-post-panels" data-index = "5">
                <?php if (!isset($_SESSION['aid'])){
                    echo "<p class = 'm-page-title'>管理者ログイン</p>
                    <div class = 'm-content-panel'>
                        <div class = 'content'>
                            <form action='./includes/login.inc.php' method = 'post' autocomplete='off'>
                                <h4 class = 'post-title'>ユーザー名</h4>
                                <input type='text' class = 'm-input single-line' placeholder = 'ユーザー名' name = 'admin_id_input'>
                                <h4 class = 'post-title'>パスワード</h4>
                                <input type='password' class = 'm-input single-line' placeholder = 'パスワード' name = 'admin_pwd_input'>
                                <input type='submit' class = 'm-submit-btn' value = 'ログイン' name = 'admin_login_btn'>
                            </form>
                        </div>
                    </div>";
                }
                elseif (isset($_SESSION['aid'])){
                    echo "
                <div>
                    <p class = 'm-page-title'>".$_SESSION['aid']."さん、ようこそ</p>
                    <form action='../includes/logout.inc.php' method = 'post'>
                        <input type='submit' value = 'ログアウト' class = 'm-submit-btn'>
                    </form>
                    
                </div>
                <div class = 'l-pages' id = 'post_page'>
                    <p class = 'm-page-title'>記事投稿</p>
                    <form action = '../includes/posting.inc.php' method = 'post' enctype = 'multipart/form-data' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <input type='file' accept = 'image/*' name = 'pst-img' class = 'pst-imgs-input' >
                        <input type='text' name = 'pst-title' placeholder = '記事タイトル'>
                        <textarea name='pst-description'　placeholder = '記事本文' id='' cols='30' rows='10'></textarea>
                        <input type='submit' value='投稿' name = 'pst-submit-btn' style = 'cursor:pointer'>
                    </form>
                </div>
                <div class = 'l-pages' id = 'color_page'>
                    <p class = 'm-page-title'>色設定</p>
                    <form action = '../includes/posting.inc.php' method = 'post' enctype = 'multipart/form-data' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'title_color_input' value = '#FFFFFF'>
                            <label>タイトル色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'side_panel_color_input' value = '#1A1C27'>
                            <label>サイドパネル色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'middle_pannel_color_input' value = '#000000'>
                            <label>ミドルパネル色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'text_color_input' value = '#8D8D8D'>
                            <label>文字色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'main_panel_color_input' value = '#2C2F3E'>
                            <label>メインパネル色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'selected_tab_color_input' value = '#2C2F3E'>
                            <label>選択済みタブ色</label>
                        </div>
                        <div>
                            <input type = 'color' class = 'page_color' name = 'shika_color_input' value = '#F8D86C'>
                            <label>テーマ色</label>
                        </div>
                        <input type='submit' value='変更' name = 'color-submit-btn' style = 'cursor:pointer'>
                    </form>
                </div>";
                }
                ?>
           </div>
<?php include_once './php/footer.php'?>
