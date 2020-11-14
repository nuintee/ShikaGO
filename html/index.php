<?php include_once './php/header.php'?>
           <div class ="m-post-panels" data-index = "5">
                <p class = "m-page-title">管理者ログイン</p>
                <div class = "m-content-panel">
                    <div class = "content">
                        <form action="./includes/login.inc.php" method = "post" autocomplete="off">
                            <h4 class = "post-title">ユーザー名</h4>
                            <input type="text" class = "m-input single-line" placeholder = "ユーザー名" name = "admin_id_input">
                            <h4 class = "post-title">パスワード</h4>
                            <input type="password" class = "m-input single-line" placeholder = "パスワード" name = "admin_pwd_input">
                            <input type="submit" class = "m-submit-btn" value = "ログイン" name = "admin_login_btn">
                        </form>
                    </div>
                </div>
           </div>
<?php include_once './php/footer.php'?>