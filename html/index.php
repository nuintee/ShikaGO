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
    //Show Users
    $st2 = $pdo->prepare('SELECT * FROM admin_users ORDER BY admin_name = :a_i DESC, admin_name ASC');
    $st2->bindValue(':a_i',$_SESSION['aid']);
    $st2->execute();
    $members = $st2->fetchAll(PDO::FETCH_ASSOC);
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
                                <a href = "paypal.com" class = "m-submit-btn white" style = "text-decoration:none;"><i class="fab fa-paypal" style = "margin-right:1em;color:light-blue"></i>ドネート (Paypal.Me使用)</a>
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
                    <div style = 'display:flex;flex-flow:row;flex-wrap:nowrap;justify-content:space-between;align-items:center;'>
                        <p class = 'm-page-title'>".$_SESSION['aid']."さん、ようこそ</p>
                        <form action='../includes/logout.inc.php' method = 'post'>
                            <input type='submit' value = 'ログアウト' class = 'm-submit-btn white'>
                        </form>
                    </div>
                    <div class = 'l-pages'>
                        <div>
                            <form action = '../includes/update_acc.inc.php' method = 'post'>
                                <details>
                                    <summary class = 'm-summary' id = 'username-summary'>表示名の変更</summary>
                                    <input type='password' name = 'adm-name' placeholder = 'ユーザー名' class = 'm-input single-line'>
                                </details>
                                <details>
                                    <summary class = 'm-summary' id = 'pwd-summary'>パスワードの変更</summary>
                                    <input type='password' name = 'adm-name' placeholder = '旧パスワード' class = 'm-input single-line'>
                                    <input type='password' name = 'adm-name' placeholder = '新パスワード' class = 'm-input single-line'>
                                </details>
                                <input type='submit' value = '保存' class = 'm-submit-btn white'>
                            </form>
                        </div>
                    </div>
                <p class = 'm-page-title'>記事投稿</p>
                <div class = 'l-pages' id = 'post_page'>
                    <form action = '../includes/posting.inc.php' method = 'post' enctype = 'multipart/form-data' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <input type='file' accept = 'image/*' name = 'pst-img' class = 'pst-imgs-input' >
                        <h4 class='post-title'>題名</h4>
                        <input type='text' name = 'pst-title' placeholder = '記事タイトル' class = 'm-input single-line'>
                        <h4 class='post-title'>本文</h4>
                        <textarea name='pst-description'　placeholder = '記事本文' id='' cols='30' rows='10' class = 'm-input single-line'></textarea>
                        <input type='submit' value='投稿' name = 'pst-submit-btn' style = 'cursor:pointer' class = 'm-submit-btn'>
                    </form>
                </div>
                <p class = 'm-page-title'>色設定</p>
                <div class = 'l-pages' id = 'l-color_page'>
                    <form action = '../includes/posting.inc.php' method = 'post' enctype = 'multipart/form-data' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'title_color_input' value = '#FFFFFF'>
                            <label>タイトル色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'side_panel_color_input' value = '#1A1C27'>
                            <label>サイドパネル色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'middle_pannel_color_input' value = '#000000'>
                            <label>ミドルパネル色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'text_color_input' value = '#8D8D8D'>
                            <label>文字色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'main_panel_color_input' value = '#2C2F3E'>
                            <label>メインパネル色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'selected_tab_color_input' value = '#2C2F3E'>
                            <label>選択済みタブ色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <div>
                            <input type = 'color' class = 'm-page_color' name = 'shika_color_input' value = '#F8D86C'>
                            <label>テーマ色</label>
                            <button class = 'm-submit-btn white'>デフォルトに変更</button>
                        </div>
                        <input type='submit' value='変更' name = 'color-submit-btn' style = 'cursor:pointer' class = 'm-submit-btn white'>
                    </form>
                </div>
                <p class = 'm-page-title'>管理者登録</p>
                <div class = 'l-pages' id = 'post_page'>
                    <form action = '../includes/acc_create.inc.php' method = 'post' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <!--<input type='file' accept = 'image/*' name = 'adm-img' class = 'adm-imgs-input' >-->
                        <h4 class='post-title'>ユーザーID</h4>
                        <input type='text' name = 'adm-id' placeholder = 'ユーザーID' class = 'm-input single-line'>
                        <h4 class='post-title'>ユーザーネーム</h4>
                        <input type='text' name = 'adm-name' placeholder = '表示名' class = 'm-input single-line'>
                        <h4 class='post-title'>パスワード</h4>
                        <input type='password' name = 'adm-pwd' placeholder = 'パスワード' class = 'm-input single-line'>
                        <input type='submit' value='登録' name = 'adm-submit-btn' style = 'cursor:pointer' class = 'm-submit-btn'>
                    </form>
                </div>
                <p class = 'm-page-title'>管理者一覧</p>
                <div class = 'l-pages' id = 'admin_list'>";
                echo "";
                for ($i=0; $i < count($members) ; $i++) {
                    echo "
                    <form action = '../includes/acc_delete.inc.php' method = 'post'>
                        <h4>Hello</h4>
                        <input type='submit' value='削除' name = 'adm-submit-btn' style = 'background-color:#FF5252;cursor:pointer;color:#FFF;' class = 'm-submit-btn'>
                    </form>";
                    /*
                    echo "
                    <h5 style = 'color:#FFF' class ='m-member-name'>";
                    if ($i == 0){
                        echo 
                        "<form>".
                        $members[$i]['admin_name']."(自分)".
                        "<input type = 'submit' class = 'm-submit-btn' style = 'cursor:pointer' value = 'アカウント削除'>
                        </form>";
                    }
                    else{
                        echo
                        "<div>".
                        $members[$i]['admin_name'].
                        "<button class = 'm-submit-btn red' style = 'cursor:pointer'>アカウント削除</button>".
                        "</div>";
                    }
                    echo "</h5>";
                    */
                }
                }
                ?>
           </div>
<?php include_once './php/footer.php'?>
