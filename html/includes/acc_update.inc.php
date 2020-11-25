<?php
    session_start();
    include_once 'conn.inc.php';

    $current_user_id = $_GET['user'];
    $current_user_name = $_SESSION['aid'];
    $member = $_POST['adm-name'];
    $old_pwd = $_POST['adm-old-pwd']; //Must password verify
    $new_pwd = $_POST['adm-new-pwd'];
    $hashed_pwd = password_hash($new_pwd,PASSWORD_DEFAULT);
    $comment = $_POST['adm-comment'];

    $image = $_FILES['update_img'];

    $twitter = $_POST['adm-twitter'];
    $github = $_POST['adm-github'];
    $discord = $_POST['adm-discord'];
    $total = 0;

    $st = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :admin_id');
    $st->bindValue(':admin_id',$current_user_id);
    $st->execute();
    $admin = $st->fetch();

    /*
    if (isset($twitter) || isset($github) || isset($discord)){
        $links_arr = array($github,$twitter,$discord);
        for ($i = 0; $i < count($links_arr); $i ++){
            if (filter_var($links_arr[$i],FILTER_VALIDATE_URL) || empty($links_arr[$i])){
                switch ($i){
                    case 0:
                        // echo 'github<br>';
                        $l_st = $pdo->prepare('UPDATE admin_users SET admin_github = :link WHERE admin_id = :current_id');
                        $l_st->bindValue(':current_id', $current_user_id);
                        $l_st->bindValue(':link',$github);
                        $l_st->execute(); 
                        break;
                    case 1:
                        // echo 'twitter<br>';
                        $l_st = $pdo->prepare('UPDATE admin_users SET admin_twitter = :link WHERE admin_id = :current_id');
                        $l_st->bindValue(':current_id', $current_user_id);
                        $l_st->bindValue(':link',$twitter);
                        $l_st->execute(); 
                        break;
                    case 2:
                        // echo 'discord<br>';
                        $l_st = $pdo->prepare('UPDATE admin_users SET admin_discord = :link WHERE admin_id = :current_id');
                        $l_st->bindValue(':current_id', $current_user_id);
                        $l_st->bindValue(':link',$discord);
                        $l_st->execute(); 
                        break;
                }
                header('Location: ../index.php?updated_links');
            }
            else {
                header('Location: ../index.php?invalid=links');
            }
        }
    }
    else{
        header('Location: ../index.php?error=nothing_was_posted');
    }
    */

    if (isset($_POST['adm-update-btn'])){
        $update_arr = array($member,$old_pwd,$new_pwd,$comment,$image,$github,$twitter,$discord);
        for ($i = 0; $i < count($update_arr); $i++){
            if ($i == 0){
                //Member
                $sql = 'UPDATE admin_users SET admin_name = :admin_name WHERE admin_id = :admin_id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':admin_name',$member);
                $stmt->bindValue(':admin_id',$current_user_id);
                $stmt->execute();
            }
            else if ($i == 1 || $i == 2){
                //Password
                if ((!empty($old_pwd) && !empty($new_pwd)) || password_verify($old_pwd,$admin['admin_pwd'])){
                    $sql = 'UPDATE admin_users SET admin_pwd = :admin_pwd WHERE admin_id = :admin_id';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':admin_pwd',password_hash($new_pwd,PASSWORD_DEFAULT));
                    $stmt->bindValue(':admin_id',$current_user_id);
                    $stmt->execute();
                }
                elseif (empty($old_pwd) || empty($new_pwd)){
                    continue;
                }
                else{
                    header('Location: ../index.php?invalid=passoword_does_not_match');
                    exit;
                }
            }
            else if ($i == 3){
                //Comment
                $sql = 'UPDATE admin_users SET admin_comment = :admin_comment WHERE admin_id = :admin_id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':admin_comment',$comment);
                $stmt->bindValue(':admin_id',$current_user_id);
                $stmt->execute();
            }
            else if ($i == 4){
                //Image
                //echo $i.' : '.$update_arr[$i].'<br>';
            }
            else if ($i == 5 || $i == 6 || $i == 7){
                //Links
                if (empty($update_arr[$i]) || filter_var($update_arr[$i],FILTER_VALIDATE_URL)){
                    switch ($i){
                        case 5:
                            $sql = 'UPDATE admin_users SET admin_github = :link WHERE admin_id = :admin_id';
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':link',$update_arr[$i]);
                            $stmt->bindValue(':admin_id',$current_user_id);
                            $stmt->execute();
                        break;
                        case 6:
                            $sql = 'UPDATE admin_users SET admin_twitter = :link WHERE admin_id = :admin_id';
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':link',$update_arr[$i]);
                            $stmt->bindValue(':admin_id',$current_user_id);
                            $stmt->execute();
                        break;
                        case 7:
                            $sql = 'UPDATE admin_users SET admin_discord = :link WHERE admin_id = :admin_id';
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':link',$update_arr[$i]);
                            $stmt->bindValue(':admin_id',$current_user_id);
                            $stmt->execute();
                        break;
                    }
                }
                else{
                    header('Location: ../index.php?error=invalid=url');
                    exit;
                }
            }
            else{
                //Exceptionals
                header('Location: ../index.php?error=invalid_count');
                exit;
            }
        }
        /*
        try{
            $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :admin_id');
            $stmt->bindValue(':admin_id',$current_user_id);
            $stmt->execute();
            $res = $stmt->fetch();

            //Name Change
            if (!empty($member) && (empty($old_pwd) || empty($new_pwd)) && empty($comment) && empty($image)){
                $sql = 'UPDATE admin_users SET admin_name = :new_admin_name WHERE admin_id = :admin_id';
                $st = $pdo->prepare($sql);
                $st->bindValue(':new_admin_name',$member);
                $st->bindValue(':admin_id',$current_user_id);
                $st->execute();
                $result = $st->fetch(PDO::FETCH_ASSOC);
                $_SESSION['aid'] = $result['admin_name'];
                header('Location: ../index.php?success=username_updated');
                exit;
            }

            //Password Change
            else if (empty($member) && !empty($old_pwd) && !empty($new_pwd) && empty($comment) && empty($image)){
                if (password_verify($old_pwd,$res['admin_pwd'])){
                    $sql = 'UPDATE admin_users SET admin_comment = :new_admin_pwd WHERE admin_id = :admin_id';
                    $st = $pdo->prepare($sql);
                    $st->bindValue(':new_admin_pwd',$hashed_pwd);
                    $st->bindValue(':admin_id',$current_user_id);
                    $st->execute();
                    header('Location: ../index.php?success=passoword_updated');
                    exit;
                }
                else{
                    echo "password does not match!";
                }
            }
            //Comment Change
            else if ((!empty($member) || empty($member) || empty($old_pwd) || empty($new_pwd)) && (!empty($comment) || empty($comment)) && empty($image) || !empty($image)){
                $sql = 'UPDATE admin_users SET admin_comment = :new_comment WHERE admin_id = :admin_id';
                $st = $pdo->prepare($sql);
                $st->bindValue(':new_comment',$comment);
                $st->bindValue(':admin_id',$current_user_id);
                $st->execute();
                header('Location: ../index.php?success=comment_updated');
                exit;
            }
            //Image Update
            else if (!empty($image)){
                //Image Handling
                $file_name = $image['name'];
                $file_tmp_name = $image['tmp_name'];
                $file_size = $image['size'];
                $file_error = $image['error'];
                $file_type= $image['type'];
                $file_extension = explode('.',$file_name);
                $file_actual_extension = strtolower(end($file_extension));
                
                $allowed = array('jpg','jpeg','png','HEIC');
                if ($file_error === 0){
                    if ($file_size < 2000000){
                        $file_name_new = uniqid('', true).".".$file_actual_extension;
                        $file_destination = '../uploads/users/'.$file_name_new;
                        $sql = 'UPDATE admin_users SET admin_image = :new_image WHERE admin_id = :admin_id';
                        $st = $pdo->prepare($sql);
                        $st->bindValue(':admin_id',$current_user_id);
                        $st->bindValue(':new_image',$file_name_new);
                        $st->execute();
                        move_uploaded_file($file_tmp_name,$file_destination);
                        header("Location: ../index.php?status=posted");
                        exit();
                    }
                    else{
                        header('Location: ../index.php?post=invalid_file_size&size='.$file_size);
                        exit();
                    }
                }
                else {
                    header('Location: ../index.php?post=invalid_file');
                    exit();
                }
            }
            //Links Update
            
            //All Update at once;
            else if (!empty($member) && !empty($old_pwd) && !empty($new_pwd) && !empty($comment) && !empty($image)){

                //Image Handling
                $file_name = $image['name'];
                $file_tmp_name = $image['tmp_name'];
                $file_size = $image['size'];
                $file_error = $image['error'];
                $file_type= $image['type'];
                $file_extension = explode('.',$file_name);
                $file_actual_extension = strtolower(end($file_extension));
                
                $allowed = array('jpg','jpeg','png','HEIC');
                if ($file_error === 0){
                    if ($file_size < 2000000){
                        $file_name_new = uniqid('', true).".".$file_actual_extension;
                        $file_destination = '../uploads/users/'.$file_name_new;
                        $sql = 'UPDATE admin_users SET admin_pwd = :new_admin_pwd, admin_name = :new_admin_name, admin_comment = :new_comment, admin_image = :new_image WHERE admin_id = :admin_id';
                        $st = $pdo->prepare($sql);
                        $st->bindValue(':new_admin_pwd',$hashed_pwd);
                        $st->bindValue(':admin_id',$current_user_id);
                        $st->bindValue(':new_admin_name',$member);
                        $st->bindValue(':new_comment',$comment);
                        $st->bindValue(':new_image',$file_name_new);
                        $st->execute();
                        move_uploaded_file($file_tmp_name,$file_destination);
                        header("Location: ../index.php?status=posted");
                        exit();
                    }
                    else{
                        header('Location: ../index.php?post=invalid_file_size&size='.$file_size);
                        exit();
                    }
                }
                else {
                    header('Location: ../index.php?post=invalid_file');
                    exit();
                }
                
                header('Location: ../index.php?success=account_updated');
                exit;
            }
            //Exception
            else {
                echo "empty info!";
            }
        }
        catch(PDOException $e){
            header('Location: ../index.php?success='.$e->getMessage());
            exit;
        }
        */
        header('Location: ../index.php?success=information_updated');
    }
    else{
        echo "<script type = 'text/javascript'>confirm('what do you think?');</script>";
    }
?>