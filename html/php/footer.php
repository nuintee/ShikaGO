</main>
       <aside class = "l-right-bar">
            <h4 id = "m-member-display">運営メンバー</h4>
            <hr color = "2C2F3E">
            <div class ="l-status">
                <div class = "l-online">
                    <h4>オンライン</h4>
                    <?php 
                      $user =  $_GET['user'];
                      $sql1 = 'SELECT * FROM admin_users WHERE admin_id = :adid';
                      $stmt = $pdo->prepare($sql1);
                      $stmt->bindValue(':adid',$user);
                      $stmt->execute();
                      $res = $stmt->fetch();
                      ?>
                    <div class = 'l-online'>
                        <div class = 'm-member is-online'>
                            <?php
                            if ($res['admin_status'] == 1){
                            echo
                            "<img class ='m-member-image is-online' src='./images/robot.jpg' alt='membername image'>
                            <h5 class ='m-member-name'>イッシー</h5>";
                            }
                            ?>
                        </div>
                    </div>
                <div class = "l-offline">
                    <h4>オフライン</h4>
                    <div class = "m-member">
                    <?php
                        if ($res['admin_status'] == 0){
                        echo
                        "<img class ='m-member-image' src='./images/robot.jpg' alt='membername image'>
                        <h5 class ='m-member-name'>イッシー</h5>";
                        }
                    ?>
                    </div>
                </div>
            </div>
       </aside>
    </div>
</body>
</html>