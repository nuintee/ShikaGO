<?php 
include_once '../includes/conn.inc.php';
$st = $pdo->query('SELECT * FROM post_content');
        $res = $st->fetchAll();
        //print_r($res);
        for ($i= 0; $i < count($res); $i++) { 
            echo "<div class = 'm-content-panel post'>
            <img src='./images/dummy.jpg' alt='post-image'>
            <div class = 'content post'>
                <h4 class = 'post-title'>".$res[$i]['post_title']."</h4>".
                "<p class = 'content-body post'>". $res[$i]['post_description']. "</p>
                <div class = 'post-footer'>
                    <p class = 'post-date'>".$res[$i]['post_date']."</p>
                    <p class = 'post-author'>投稿者 : ".$res[$i]['post_author']."</p>
                </div>
            </div>
        </div>";
        }
?>