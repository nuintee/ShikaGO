<?php
session_start();
include_once './includes/online.inc.php';
?>
</main>
       <aside class = "l-right-bar">
            <h4 id = "m-member-display">運営メンバー</h4>
            <hr color = "2C2F3E">
            <div class ="l-status">
                <div class = "l-online">
                    <h4>オンライン</h4>
                        <div class = 'm-member is-online'>
                            <?php
                            
                            for ($i = 0; $i < count($resT); $i++){
                                echo "<img class ='m-member-image is-online' src='./images/robot.jpg' alt='membername image'>
                                <h5 class ='m-member-name'>".$resT[$i]['admin_id']."</h5>";
                            }
                            
                            /*
                            echo
                            "<img class ='m-member-image is-online' src='./images/robot.jpg' alt='membername image'>
                            <h5 class ='m-member-name'>".$res['admin_name']."</h5>";
                            }
                            */
                            ?>
                        </div>
                    </div>
                <div class = "l-offline">
                    <h4>オフライン</h4>
                    <div class = "m-member">
                    <?php
                        /*
                        for ($j = 0; $j < count($resF); $j++){
                        echo "<img class ='m-member-image' src='./images/robot.jpg' alt='membername image'>
                        <h5 class ='m-member-name'>".$resF[$j]['admin_id']."</h5>";
                        }
                        */
                    ?>
                    </div>
                </div>
            </div>
       </aside>
    </div>
</body>
</html>