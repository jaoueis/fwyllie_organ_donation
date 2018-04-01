<?php
    session_start();
    require("connection.php");
    require("login_verify.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_SESSION["login_user"])){
            header("Location: cms.php");
            exit;
        }
        else{
            if(!empty($_POST["username"]) && !empty($_POST["password"])){
                $ip = $_SERVER['REMOTE_ADDR'];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $checkAttempt = "SELECT * FROM login_attempt WHERE user_ip = '{$ip}'";
                $checkResult = mysqli_query($link, $checkAttempt);
                $attempt_count = 0;
                if(mysqli_num_rows($checkResult)){
                    $att = mysqli_fetch_array($checkResult, MYSQLI_ASSOC);
                    $attempt_count = $att['attempt_counter'];
                    if($attempt_count > 3){
                        $message = "Your account has been blocked.";
                    }
                    else{
                        $message = account_verify($link, $username, $password, $attempt_count, $ip);
                    }
                }
                else{
                    $message = account_verify($link, $username, $password, $attempt_count, $ip);
                }
            }
            else{
                $message = "Your user name or password is missing. Please try again.";
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Administrator Login</title>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/cms.css">
    </head>
    <body>
        <div class="loginBox">
            <h2>USER LOGIN</h2><br/>
			<?php if(!empty($message)){ echo "<p class='inputError'>" . $message . "</p>";} ?>
			<form action="login.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
				        <label for="login_id">Username:</label>
				        <input type="text" class="form-control" id="login_id" name="username" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
				        <label for="login_pwd">Password:</label>
				        <input type="password" class="form-control" id="login_pwd" name="password" value="">
                    </div>
                </div>
				<input type="submit" name="submit" value="LOGIN">
                <a href="../index.php" class="backBtn">HOME</a>
			</form>
        </div>
    </body>
</html>
