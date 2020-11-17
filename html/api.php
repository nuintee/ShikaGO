 <?php
        header('Access-Control-Allow-Origin: http://www.example.com');
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);
        //print_r($data);
        if ($data['cmd'] == 'users'){
            include_once './includes/conn.inc.php';
            $st = $pdo->query('SELECT * FROM admin_users');
            $res = $st->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        }
        else if ($data['cmd']== ''){
            ;
        }
 ?>