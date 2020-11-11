<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/module.css">
    <link rel="stylesheet" href="./css/state.css">
    <link rel="icon" href="./images/deer.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">                    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <title>ShikaGO</title>
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
                <li><button class = "m-category-btn"><i class="fas fa-info" data-index = "2"></i>概要</button></li>
                <li><button class = "m-category-btn"><i class="fas fa-lightbulb" data-index = "3"></i>プロジェクト</button></li>
                <li><button class = "m-category-btn"><i class="fas fa-robot" data-index = "4"></i>Bot</button></li>
            </ul>
            <hr color = "2C2F3E">
            <footer class = "l-bottom-category">
                <button class = "m-category-btn">管理者</button>
            </footer>
       </aside>
       <main>
           <?php echo '<p class = "m-page-title">投稿一覧</p>' ?> 
           <div class = "m-post-panels is-active">
                <div class = "m-post-panel">
                    <img src="./images/dummy.jpg" alt="post-image">
                    <div class = "post-content">
                        <h4 class = "post-title">投稿開始!</h4>
                        <p class = "post-body">
                        カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。本文用なので使い方を間違えると不自然に見えることもありますので要注意。これは正式な文章の代わりに入れて使うダミーテキストです。主に書籍やウェブページなどのデザインを作成する時によく使われます。文章に特に深い意味はありません。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。
                        </p>
                        <div class = "post-footer">
                            <p class = "post-date">2020/11/18/22:30</p>
                            <p class = "post-author">投稿者 : イッシー</p>
                        </div>
                    </div>
                </div>
           </div>
       </main> 
       <aside class = "l-right-bar">
            <h4 id = "m-member-display">メンバー</h4>
            <hr color = "2C2F3E">
            <div class ="l-status">
                <div class = "l-online">
                    <h4>オンライン</h4>
                    <div class = "m-member is-online">
                        <img class ="m-member-image is-online" src="./images/robot.jpg" alt="membername image">
                        <h5>イッシー</h5>
                    </div>
                </div>
                <div class = "l-offline">
                    <h4>オフライン</h4>
                    <div class = "m-member">
                        <img class ="m-member-image" src="./images/robot.jpg" alt="membername image">
                        <h5>イッシー</h5>
                    </div>
                </div>
            </div>
       </aside>
    </div>
</body>
</html>