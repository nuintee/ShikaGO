<?php
    session_start();
    include_once 'conn.inc.php';

    //* Confirm Popup JS*/

    /*
    $alert = "<script type = 'text/javascript'>
                function confirm_test(){
                    let answer = alert('削除してよろしいですか？');
                    if (answer){
                        console.log('worked');
                    }else{
                        return;
                    }
                }
            </script>";

    if (isset($_POST['adm-delete-btn'])){
        echo $alert;
    }
    else{
        echo "<script type = 'text/javascript'>confirm('what do you think?');</script>";
    }
    */

?>