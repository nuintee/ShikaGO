<?php
    session_start();
    include_once 'conn.inc.php';

    $current_user_id = $_GET['user'];
    $current_user_name = $_SESSION['aid'];
    $member = $_POST['adm-name'];
    $old_pwd = $_POST['adm-old-pwd']; //Must password verify
    $new_pwd = $_POST['adm-new-pwd'];
    $hashed_pwd = password_hash($new_pwd,PASSWORD_DEFAULT);

    if (isset($_POST['adm-update-btn'])){
        try{
            
            $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE admin_id = :admin_id');
            $stmt->bindValue(':admin_id',$current_user_id);
            $stmt->execute();
            $res = $stmt->fetch();
            

            //Name Change
            if ($member != $current_user_name && !empty($member) && empty($old_pwd) || empty($new_pwd)){
                
                $sql = 'UPDATE admin_users SET admin_name = :new_admin_name WHERE admin_id = :admin_id';
                $st = $pdo->prepare($sql);
                $st->bindValue(':new_admin_name',$member);
                $st->bindValue(':admin_id',$current_user_id);
                $st->execute();
                $result = $st->fetch(PDO::FETCH_ASSOC);
                unset($_SESSION['aid']);
                $_SESSION['aid'] = $result['admin_name'];
                header('Location: ../index.php?success=username_updated');
                exit;
            }

            //Password Change
            else if (empty($member) && !empty($old_pwd) && !empty($new_pwd)){
                if (password_verify($old_pwd,$res['admin_pwd'])){
                    $sql = 'UPDATE admin_users SET admin_pwd = :new_admin_pwd WHERE admin_id = :admin_id';
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
            //All Update at once;
            else if ($member != $current_user_name &&!empty($member) && !empty($old_pwd) && !empty($new_pwd)){
                
                $sql = 'UPDATE admin_users SET admin_pwd = :new_admin_pwd, admin_name = :new_admin_name WHERE admin_id = :admin_id';
                $st = $pdo->prepare($sql);
                $st->bindValue(':new_admin_pwd',$hashed_pwd);
                $st->bindValue(':admin_id',$current_user_id);
                $st->bindValue(':new_admin_name',$member);
                $st->execute();
                
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