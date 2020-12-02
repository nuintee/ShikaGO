<?php
session_start();
include_once './includes/online.inc.php';
?>
</main>
       <aside class = "l-right-bar">
            <h4 id = "m-member-display">運営メンバー</h4>
            <hr color = "2C2F3E">
            <div class = 'l-status'>
            <?php
                $st = $pdo->prepare('SELECT * FROM admin_users');
                $st->execute();
                $res = $st->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($res); $i++){
                    echo "<div class = 'm-member' data-comment = '".$res[$i]['admin_comment']."'>";
                    echo "<img class ='m-member-image' src = '../uploads/users/".$res[$i]['admin_image']."' alt = 'i'>";
                    echo "<h5 class = 'm-member-name'>".$res[$i]['admin_name']."</h5>";
                    echo "</div>";
                }
            ?>
            </div>
       </aside>
    </div>
</body>
</html>