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

    if (isset($_POST['adm-update-btn'])){
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
            else if ((!empty($member) || empty($old_pwd) || empty($new_pwd)) && (!empty($comment) || empty($comment)) && empty($image)){
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
        
    }
    else{
        echo "<script type = 'text/javascript'>confirm('what do you think?');</script>";
    }
?>