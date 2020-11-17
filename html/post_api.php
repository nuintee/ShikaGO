 <?php
        //header('Access-Control-Allow-Origin: http://www.example.com');
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);
        $pt = $data['title'];
        $pd = $data['description'];
        $pa = $data['author'];
        $date = date('Y/m/d H:i:s', time());
        //print_r($data);
        if (!empty($data)){
            include_once './includes/conn.inc.php';
            $sql = 'INSERT INTO post_contents (post_title, post_description, post_image, post_author, post_date) VALUES (:pt,:pd,:pm,:pa,:dat)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':pt',$pt);
            $stmt->bindValue(':pd',$pd);
            $stmt->bindValue(':pm','');
            $stmt->bindValue(':pa',$pa);
            $stmt->bindValue(':dat',$date);
            $stmt->execute();
            $res = $st->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        }
        else{
            ;
        }
 ?>