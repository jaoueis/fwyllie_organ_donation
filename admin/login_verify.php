<?php
    function account_verify($link, $username, $password, $attempt_count, $ip){
        $username = mysqli_real_escape_string($link, $username);
        $password = mysqli_real_escape_string($link, $password);
        $loginstring = "SELECT * FROM admin_group WHERE user_id='{$username}'";
        $user_set = mysqli_query($link, $loginstring);
        if(mysqli_num_rows($user_set)){
            $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
            $currentTime = date('Y-m-d H:i:s');
            if($currentTime < $founduser['expire_time'] || $founduser['expire_time'] == "unlimited"){
                //password verify
                if (password_verify($password, $founduser['user_pwd'])) {
                    $id = $founduser['user_id'];
                    $firstTimeLogin = $founduser['user_first_time_login'];
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name']= $founduser['user_fullname'];
                    $currTime = date('Y-m-d H:i:s');
                    //update Login successful time
                    $update = "UPDATE admin_group SET user_ip='{$ip}', login_date = '{$currTime}' WHERE user_id = '{$id}'";
                    $updatequery = mysqli_query($link, $update);
                    //remove record from attempt history
                    $delAttempt = "DELETE * FROM login_attempt WHERE user_ip = '{$ip}'";
                    $delResult = mysqli_query($link, $delAttempt);
                    if($firstTimeLogin == "no"){
                        $removeExpire = "UPDATE admin_group SET expire_time = 'unlimited' WHERE user_id = '{$id}'";
                        $updateExpire = mysqli_query($link, $removeExpire);
                        header("Location: cms.php");
                        exit;
                    }
                    else{
                        header("Location: cms_edituser.php");
                        exit;
                    }
                }
                else{
                    $counter = $attempt_count + 1;
                    $updateAttempt = "UPDATE login_attempt SET attempt_counter = '{$counter}' WHERE user_ip = '{$ip}'";
                    $updateResult = mysqli_query($link, $updateAttempt);
                    $message = "Your password is invalid.";
                    return $message;
                }
            }
            else{
                $message = "Sorry, your account has been suspended.";
                return $message;
            }
        }
        else{
            $counter = $attempt_count + 1;
            $checkAttempt = "SELECT * FROM login_attempt WHERE user_ip = '{$ip}'";
            $checkResult = mysqli_query($link, $checkAttempt);
            if(mysqli_num_rows($checkResult)){
                $updateAttempt = "UPDATE login_attempt SET attempt_counter = '{$counter}' WHERE user_ip = '{$ip}'";
                $updateResult = mysqli_query($link, $updateAttempt);
            }
            else{
                $addAttempt = "INSERT INTO login_attempt (user_ip, attempt_counter) VALUES ('{$ip}', '{$counter}')";
                $addResult = mysqli_query($link, $addAttempt);
            }
            $message = "Your username is invalid.";
            return $message;
        }
        mysqli_close($link);
    }

?>