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
                        if (file_exists('../uploads/users/'.$admin['admin_image'])){
                            unlink('../uploads/users/'.$admin['admin_image']);
                        }
                        else{
                            header("Location: ../index.php?error=failed_to_updateImage");
                            exit;
                        }
                        move_uploaded_file($file_tmp_name,$file_destination);
                        header("Location: ../index.php?status=posted");
                        exit();
                    }
                    else{
                        header('Location: ../index.php?update=invalid_file_size&size='.$file_size);
                        exit();
                    }
                }
                else if ($file_error === 4){//ファイルがアップロードされていない場合
                    continue;
                }
                else {
                    //header('Location: ../index.php?update=invalid_file');
                    exit();
                }
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
                    header('Location: ../index.php?error=invalid_url');
                    exit;
                }
            }
            else{
                //Exceptionals
                header('Location: ../index.php?error=invalid_count');
                exit;
            }
        }
        header('Location: ../index.php?success=information_updated');
    }
    else{
        echo "<script type = 'text/javascript'>confirm('what do you think?');</script>";
    }
?>