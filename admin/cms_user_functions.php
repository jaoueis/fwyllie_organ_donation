<?php
    require_once("../PHPMailer/PHPMailer.php");
	  require_once("../PHPMailer/SMTP.php");
 	  require_once("../PHPMailer/POP3.php");
	  require_once("../PHPMailer/Exception.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    function createUser($link, $fname, $username, $password, $email, $lvllist){
        $hashedPWD = password_hash($password, PASSWORD_BCRYPT);
        $datetime =new DateTime("now");
        $datetime = $datetime->modify('+5 minutes');
        $expiredTime = $datetime->format('Y-m-d H:i:s');
        $userstring = "INSERT INTO admin_group (user_id, user_fullname, user_pwd, user_email, login_date, user_ip, user_permission, expire_time) VALUES('{$username}','{$fname}','{$hashedPWD}','{$email}', NULL, 'no','{$lvllist}','{$expiredTime}')";//order is important, it has to matchup with the database
        //echo $userstring;
        $userquery = mysqli_query($link, $userstring);
        if($userquery){
            $userMsg = "<p>Hello " . $fname . ", you become a new user now. Please check your account info below:" . "</p><br/><li>User Name: " . $username . "</li>" . "<li>Password: " . $password . "</li><br/><p>Plese click <a href='http://localhost:8888/fwyllie_organ_donation-xjin/admin/login.php'>HERE</a> to login.</p>";
            //send email
            $mailToUser = new PHPMailer(true);
            try {
                $mailToUser->isSMTP();
                //$mailToUser->SMTPDebug = 2;
                $mailToUser->SMTPSecure = 'ssl';// Enable verbose debug output
                $mailToUser->Host = 'smtp.163.com';
                $mailToUser->SMTPAuth = true;
                $mailToUser->Username = 'wesley618@163.com';
                $mailToUser->Password = '68760273a';
                $mailToUser->Port = 465;
                $mailToUser->setFrom('wesley618@163.com', 'Admin');
                $mailToUser->addAddress($email);
                $mailToUser->isHTML(true);
                $mailToUser->Subject = 'New User';
                $mailToUser->addReplyTo('wesley618@163.com', 'Admin');
                $mailToUser->Body = "<h2>New User</h2>" . $userMsg;
                $mailToUser->AltBody = "<h2>New User</h2>" . $userMsg;
                $mailToUser->send();
                $mailSuccessMsgUser = "Email has been sent.";
                $message = "You created a new user.";
                return $message;
            }
            catch (Exception $e) {
                $message = 'Message could not be sent. ' . 'Mailer Error: ' . $mailToUser->ErrorInfo;
                return $message;
            }
            header("Location: cms_createuser.php");
            exit;
        }
        else {
            $message = "Sorry progress failed, please try again.";
            return $message;
        }
        mysqli_close($link);
    }

    function fetch_userInfo($link, $id){
		$querySingle = "SELECT * FROM admin_group WHERE user_id = '{$id}'";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
    }

    function fetch_allUsers($link, $tbl) {
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.";
			return $error;
		}
		mysqli_close($link);
	}

    function editUser($link, $id, $fname, $username, $password, $email, $lvl) {
		$hashedPWD = password_hash($password, PASSWORD_BCRYPT);
		$updatestring = $link->query("UPDATE admin_group SET user_fullname='$fname', user_id='$username', user_pwd='$hashedPWD', user_email='$email', user_permission = '$lvl', expire_time='unlimited', user_first_time_login='no' WHERE user_id= '$id'");

		if($updatestring) {
            $_SESSION["user_name"] = $fname;
            header("Location: cms.php");
            exit;
        }
        else{
			$message = "Sorry progress failed, please try again.";
			return $message;
		}
		mysqli_close($link);
    }
?>
