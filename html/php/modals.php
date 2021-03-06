<?php 
    session_start();
    include_once './includes/conn.inc.php';

    $st = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :admin_id');
    $st->bindValue(':admin_id',$_SESSION['adid']);
    $st->execute();
    $res = $st->fetch();
    $links_arr = array($res['admin_github'],$res['admin_twitter'],$res['admin_discord']);
?>
<div class ="m-modal-bg member">
    <div class = "m-modal-main">
        <div class ="modal-top">
            <img src="./images/robot.jpg" alt="member-profile">
            <h4></h4>
            <?php
                for ($i = 0; $i < count($links_arr); $i++){
                    if (!empty($links_arr[$i])){
                        switch ($i){
                            //番号で表示アイコン制御
                            case 0:
                                echo '<a href="" target="_blank" style="color: #FFF; font-size: 1.5em;"><i class="fab fa-github"></i></a>';
                                break;
                            case 1:
                                echo '<a href="" target="_blank" style="color: #FFF; font-size: 1.5em;"><i class="fab fa-twitter"></i></a>';
                                break;
                            case 2:
                                echo '<a href="" target="_blank" style="color: #FFF; font-size: 1.5em;"><i class="fab fa-discord"></i></a>';
                                break;
                        }
                    }
                    else{
                        echo null;
                    }
                }
            ?>
        </div>
        <div class = "modal-txt">
            <p></p>
        </div>
    </div>
</div>

<div class="m-modal-bg post">
    <div class = "m-content-panel project dis">
        <img src="./images/robot.jpg" alt="">
        <div class = "content project">   
            <h4 class = "post-title">ShicaGO Bot</h4>
            <p class = "content-body">
            カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
            カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
            カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
            </p>
            <div class = "post-footer">
                <p class = "post-date">2020/11/18/22:30</p>
                <p class = "post-author">投稿者 : イッシー</p>
            </div>
        </div>
    </div>
</div>