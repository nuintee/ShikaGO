<?php
session_set_cookie_params(60 * 5);
session_start(); 
?>
<?php include_once './includes/conn.inc.php' ?>
<?php include_once './includes/colors.inc.php';?>
<?php include_once './php/header.php'?>
<?php include_once "./php/modals.php" ?>
<div class = "m-post-panels is-active" data-index = "1">
    <p class = "m-page-title">投稿一覧</p>
    <?php 
    $st = $pdo->prepare('SELECT * FROM post_contents');
    $st->execute();
    $res = $st->fetchAll();
    //Show Users
    $st2 = $pdo->prepare('SELECT * FROM admin_users ORDER BY admin_name = :a_i DESC, admin_name ASC');
    $st2->bindValue(':a_i',$_SESSION['aid']);
    $st2->execute();
    $members = $st2->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($res)){
                for ($i= 0; $i < count($res); $i++) { 
                    echo "<div class = 'm-content-panel post'>
                            <img src='./uploads/posts/".$res[$i]['post_image']."'>
                            <div class = 'content post'>
                                <h4 class = 'post-title'>".$res[$i]['post_title']."</h4>
                                <p class = 'content-body post'>". $res[$i]['post_description']. "</p>
                                <div class = 'post-footer'>
                                    <p class = 'post-date'>".$res[$i]['post_date']."</p>
                                    <p class = 'post-author'>投稿者 : ".$res[$i]['post_author']."</p>
                                </div>
                            </div>";
                    if (isset($_SESSION['aid'])){
                        //Regular Account Action
                        if ($_SESSION['adid'] != 'guest'){
                            echo"<div>
                                    <form action = './includes/post_del.inc.php?posted_id=".$res[$i]['post_id']."' method = 'post' onsubmit = 'return confirm_post_del();' class = 'l-post-del-btn'>
                                        <button type = 'submit' value = 'delete' name = 'post-del-btn' class = 'm-admin_post_del_btn' ><i class='fas fa-trash-alt' style = 'color:#FF5252;pointer-events:none;object-fit:cover;'></i></button>
                                    </form>
                                </div>";
                        }
                        //Guest Account Action
                        else{
                            //Deleteble Pattern
                            if ($res[$i]['post_author'] == 'Guest' || $res[$i]['post_author'] == 'Target'){
                               echo"<div>
                                        <form action = './includes/post_del.inc.php?posted_id=".$res[$i]['post_id']."' method = 'post' onsubmit = 'return confirm_post_del();' class = 'l-post-del-btn'>
                                            <button type = 'submit' value = 'delete' name = 'post-del-btn' class = 'm-admin_post_del_btn' ><i class='fas fa-trash-alt' style = 'color:#FF5252;pointer-events:none;object-fit:cover;'></i></button>
                                        </form>
                                    </div>";
                            }
                            //Undeletable Pattern
                            else{
                                echo"<div class = 'l-post-del-btn' onclick = 'cannot_post_del();' >
                                        <button type = 'submit' value = 'delete' name = 'post-del-btn' class = 'm-admin_post_del_btn' ><i class='fas fa-trash-alt' style = 'color:#FF5252;pointer-events:none;object-fit:cover;'></i></button>
                                    </div>";
                            }
                        }
                    }
                    //Closing Div
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
                                    42Tokyoで仲良くなったIT好きなメンバーと始めた共同プロジェクトの一環です。
                                    名前の由来は「生まれたての小鹿」からです。
                                </p>
                                <h4 class = "post-title">将来</h4>
                                <p class = "content-body">
                                    現在はDiscordのBot制作に力を注いでいますが、様々なプロジェクトのプランはあるので定期的に更新していこうと思ております。
                                </p>
                                <h4 class = "post-title">開発について</h4>
                                <p class = "content-body">
                                    要件定義・設計からUI/UXデザイン、そしてコーディングまでの全てを
                                    ISHYが開発致しました。
                                    使用技術は以下の通りです。
                                    Docker, HTML/CSS, JavaScript, PHP, MySQL, Heroku<br>
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
                                    本メンバーで行う共同プロジェクトの第一弾となります。
                                    ほとんど毎日Discord上で通話をしながら作業していることが多い為に、より便利に快適にしようという思いから
                                    比較的取っ掛かりやすいDiscordのBot制作に取り掛かり始めました。
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
                                    本メンバーで行う共同プロジェクトの第一弾となります。
                                    ほとんど毎日Discord上で通話をしながら作業していることが多い為に、より便利に快適にしようという思いから
                                    比較的取っ掛かりやすいDiscordのBot制作に取り掛かり始めました。
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
                                <input type="submit" class = "m-submit-btn dis" value = "サーバーへ招待(準備中)">
                            </div>
                        </div>
                   </div>
            <div class ="m-post-panels" data-index = "5">
                <?php if (!isset($_SESSION['aid'])){
                    echo "<p class = 'm-page-title'>管理者ログイン</p>
                    <div class = 'm-content-panel'>
                        <div class = 'content'>
                            <form action='./includes/login.inc.php' method = 'post' autocomplete='off'>
                                <h4 class = 'post-title'>ユーザーID</h4>
                                <input type='text' class = 'm-input single-line' placeholder = 'ユーザー名' name = 'admin_id_input'>
                                <h4 class = 'post-title'>パスワード</h4>
                                <div class = 'l-pwd-pack' style = 'display:flex;flex-flow:row;flex-direction: row;flex-wrap:nowrap;'>
                                    <input type='password' class = 'm-input single-line pwd' placeholder = 'パスワード' name = 'admin_pwd_input'>
                                    <button type = 'button' class = 'm-pwd-toggle-button fas fa-eye'></button>
                                </div>
                                <input type='submit' class = 'm-submit-btn' value = 'ログイン' name = 'admin_login_btn'>
                            </form>
                        </div>
                    </div>";
                }
                elseif (isset($_SESSION['aid'])){
                    //Gather Comment At the time;
                    $st = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :adid');
                    $st->bindValue(':adid',$_SESSION['adid']);
                    $st->execute();
                    $res = $st->fetch(PDO::FETCH_ASSOC);
                    echo "
                    <div style = 'display:flex;flex-flow:row;flex-wrap:nowrap;justify-content:space-between;align-items:center;'>
                        <p class = 'm-page-title'>".$res['admin_name']."さん、ようこそ</p>
                        <form action='../includes/logout.inc.php' method = 'post'>
                            <input type='submit' value = 'ログアウト' class = 'm-submit-btn white'>
                        </form>
                    </div>
                    <div class = 'l-pages'>
                        <form action = '../includes/acc_update.inc.php?user=".$_SESSION['adid']."'"."method = 'post' class = 'l-admin-container' enctype='multipart/form-data'>
                            <div class = 'l-texts-wrapper'>
                                <details>
                                    <summary class = 'm-summary' id = 'username-summary'>表示名の変更</summary>
                                    <input type='text' name = 'adm-name' placeholder = 'ユーザー名' value = ".$res['admin_name']." class = 'm-input single-line'>
                                </details>
                                <details>
                                    <summary class = 'm-summary' id = 'pwd-summary'>パスワードの変更</summary>
                                        <div class = 'l-pwd-pack' style = 'display:flex;flex-flow:row;flex-direction: row;flex-wrap:nowrap;'>
                                            <input type='password' name = 'adm-old-pwd' placeholder = '旧パスワード' class = 'm-input single-line pwd'>
                                            <button type = 'button' class = 'm-pwd-toggle-button fas fa-eye'></button>
                                        </div>
                                        <div class = 'l-pwd-pack' style = 'display:flex;flex-flow:row;flex-direction: row;flex-wrap:nowrap;'>
                                            <input type='password' name = 'adm-new-pwd' placeholder = '新パスワード' class = 'm-input single-line pwd'>
                                            <button type = 'button' class = 'm-pwd-toggle-button fas fa-eye'></button>
                                        </div>
                                </details>
                                <details>
                                    <summary class = 'm-summary' id = 'comment-summary'>一言コメントの変更</summary>
                                        <input type='text' name = 'adm-comment' placeholder = 'コメント' value = '".$res['admin_comment']."' class = 'm-input single-line'>
                                </details>
                                <!-- 調整中
                                <details>
                                    <summary class = 'm-summary' id = 'link-summary'>関連リンク</summary>
                                        <input type='text' name = 'adm-github' placeholder = 'Github' value = '".$res['admin_github']."' class = 'm-input single-line'>
                                        <input type='text' name = 'adm-twitter' placeholder = 'Twitter' value = '".$res['admin_twitter']."' class = 'm-input single-line'>
                                        <input type='text' name = 'adm-discord' placeholder = 'Discord' value = '".$res['admin_discord']."' class = 'm-input single-line'>
                                </details>
                                -->
                                <div class = 'l-submit-btn'>
                                    <input type='submit' value = '保存' class = 'm-submit-btn white' name = 'adm-update-btn'>
                                </div>
                            </div>
                            <label for = 'm-admin_img_upload_input' class = 'm-img_upload_label'>
                                    <span style = 'pointer-events:none;'>画像を選択</span>
                                    <input type = 'file' class = 'l-input-container' id = 'm-admin_img_upload_input' name = 'update_img'>
                            </label>
                        </form>
                    </div>
                <p class = 'm-page-title'>記事投稿</p>
                <div class = 'l-pages' id = 'post_page'>
                    <form action = '../includes/posting.inc.php' method = 'post' enctype = 'multipart/form-data' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'>
                        <label for = 'm-post_upload_input' class = 'm-img_upload_label full'>
                            <span style = 'pointer-events:none;'>画像を選択</span>
                            <input type = 'file' accept = 'image/*' class = 'l-input-container' id = 'm-post_upload_input' name = 'pst-img'>
                        </label>
                        <h4 class='post-title'>題名</h4>
                        <input type='text' name = 'pst-title' placeholder = '記事タイトル' class = 'm-input single-line'>
                        <h4 class='post-title'>本文</h4>
                        <textarea name='pst-description'　placeholder = '記事本文' id='' cols='30' rows='10' class = 'm-input single-line' oninput = 'sanitize(this);'></textarea>
                        <input type='submit' value='投稿' name = 'pst-submit-btn' style = 'cursor:pointer' class = 'm-submit-btn'>
                    </form>
                </div>
                <p class = 'm-page-title'>管理者登録</p>
                <div class = 'l-pages' id = 'post_page'>
                    <form action = '../includes/acc_create.inc.php' method = 'post' id = 'm-admin_post_panel' style = 'color:#FFF;background-color : #2C2F3E;display:flex;flex-flow:column;'  enctype='multipart/form-data'>      
                        <label for = 'm-create_img_upload_input' class = 'm-img_upload_label'>
                            <span style = 'pointer-events:none;'>画像を選択</span>
                            <input type = 'file' accept = 'image/*' class = 'l-input-container' id = 'm-create_img_upload_input' name = 'adm-img'>
                        </label>
                        <h4 class='post-title'>ユーザーID</h4>
                        <input type='text' name = 'adm-id' placeholder = 'ユーザーID' class = 'm-input single-line'>
                        <h4 class='post-title'>ユーザーネーム</h4>
                        <input type='text' name = 'adm-name' placeholder = '表示名' class = 'm-input single-line'>
                        <h4 class='post-title'>パスワード</h4>
                        <div class = 'l-pwd-pack' style = 'display:flex;flex-flow:row;flex-direction: row;flex-wrap:nowrap;'>
                            <input type='password' name = 'adm-pwd' placeholder = 'パスワード' class = 'm-input single-line pwd'>
                            <button type = 'button' class = 'm-pwd-toggle-button fas fa-eye'></button>
                        </div>
                        <input type='submit' value='登録' name = 'adm-submit-btn' style = 'cursor:pointer' class = 'm-submit-btn'>
                    </form>
                </div>
                <p class = 'm-page-title'>管理者一覧</p>
                <div class = 'l-pages' id = 'admin_list'>";
                    for ($i=0; $i < count($members); $i++){
                        if ($i == 0){
                            //Current Account
                            echo 
                                "<form action = '../includes/acc_delete.inc.php?account=".$members[$i]['admin_name']."&id=".$members[$i]['admin_id']."'"."method = 'post' style = 'display:flex;align-items:center;justify-content:space-between;' onsubmit='return confirm_test(this)'>
                                    <div>
                                        <h4 class ='m-member-name' style = 'color:#FFF;margin-right:1em;'>".$members[$i]['admin_name']."(自分)"."</h4>
                                        <h5 class ='m-member-name' style = 'color:var(--category-txt-passive-color)'> "."ID: ".$members[$i]['admin_id']." </h5>
                                    </div>
                                <input type='submit' value='アカウント削除' name = 'adm-delete-btn' style = 'background-color:#FF5252;color:#FFF;cursor:pointer' class = 'm-submit-btn'>
                            </form>
                            <hr size = '2' width='100%' color='#1A1C27'>";
                        }
                        else{
                            //Guest Account Action
                            if ($_SESSION['adid'] == 'guest'){
                                //Deletable Account
                                if ($members[$i]['admin_id'] == 'target' || $members[$i]['admin_id'] == 'Target'){
                                    echo "<form action = '../includes/acc_delete.inc.php?account=".$members[$i]['admin_name']."&id=".$members[$i]['admin_id']."'"."method = 'post' style = 'display:flex;align-items:center;justify-content:space-between;' onsubmit='return confirm_test(this)'>
                                            <div>
                                                <h4 class ='m-member-name' style = 'color:#FFF;margin-right:1em;'>".$members[$i]['admin_name']."</h4>
                                                <h5 class ='m-member-name' style = 'color:var(--category-txt-passive-color)'> "."ID: ".$members[$i]['admin_id']." </h5>
                                            </div>
                                            <input type='submit' value='アカウント削除' name = 'adm-delete-btn' style = 'background-color:#FF5252;color:#FFF;cursor:pointer' class = 'm-submit-btn'>
                                        </form>
                                        <hr size = '2' width='100%' color='#1A1C27'>";
                                }
                                //Undeletable Account
                                else {
                                    echo "<div style = 'display:flex;align-items:center;justify-content:space-between;' onclick='cannot_post_del()'>
                                            <div>
                                                <h4 class ='m-member-name' style = 'color:#FFF;margin-right:1em;'>".$members[$i]['admin_name']."</h4>
                                                <h5 class ='m-member-name' style = 'color:var(--category-txt-passive-color)'> "."ID: ".$members[$i]['admin_id']." </h5>
                                            </div>
                                            <input type='submit' value='アカウント削除' name = 'adm-delete-btn' style = 'background-color:#FF5252;color:#FFF;cursor:pointer' class = 'm-submit-btn'>
                                        </div>
                                    <hr size = '2' width='100%' color='#1A1C27'>";
                                }
                            }
                            //Regular Account Aciton
                            else{
                                echo "<form action = '../includes/acc_delete.inc.php?account=".$members[$i]['admin_name']."&id=".$members[$i]['admin_id']."'"."method = 'post' style = 'display:flex;align-items:center;justify-content:space-between;' onsubmit='return confirm_test(this)'>
                                        <div>
                                            <h4 class ='m-member-name' style = 'color:#FFF;margin-right:1em;'>".$members[$i]['admin_name']."</h4>
                                            <h5 class ='m-member-name' style = 'color:var(--category-txt-passive-color)'> "."ID: ".$members[$i]['admin_id']." </h5>
                                        </div>
                                        <input type='submit' value='アカウント削除' name = 'adm-delete-btn' style = 'background-color:#FF5252;color:#FFF;cursor:pointer' class = 'm-submit-btn'>
                                    </form>
                                <hr size = '2' width='100%' color='#1A1C27'>";
                            }
                        }
                    }
                }
                ?>
           </div>
<?php include_once './php/footer.php'?>
