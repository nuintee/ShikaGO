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
                <li><button class = "m-category-btn is-active"><i class="fas fa-paper-plane"></i>Feed</button></li>
                <li><button class = "m-category-btn"><i class="fas fa-info"></i>About</button></li>
                <li><button class = "m-category-btn"><i class="fas fa-lightbulb"></i>Projects</button></li>
                <li><button class = "m-category-btn"><i class="fas fa-robot"></i>Bot</button></li>
            </ul>
            <hr color = "2C2F3E">
            <footer class = "l-bottom-category">
                <button class = "m-category-btn">Admin</button>
            </footer>
       </aside>
       <main>
           <?php echo '<h3 class = "m-page-title">投稿一覧</h3>' ?> 
       </main>
       <aside class = "l-right-bar">
            <h4 id = "m-member-display">メンバー</h4>
            <hr color = "2C2F3E">
            <ul class = "l-online">
                <h4>オンライン</h4>
            </ul>
            <ul class = "l-offline">
                <h4>オフライン</h4>
            </ul>
       </aside>
    </div>
</body>
</html>