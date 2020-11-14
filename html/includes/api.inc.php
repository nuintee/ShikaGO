<?php 
    header('Access-Control-Allow-Origin: *');
    $result = array(
        'hello' => 'Hello'
    );
    echo json_encode($result);
?>