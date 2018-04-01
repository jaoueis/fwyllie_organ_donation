<?php
	session_start();
	require('connection.php');
	$currentTime = date('H:i:s');
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$loginTime = "SELECT login_date FROM admin_group WHERE user_id = '{$user_id}'";
		$find_user_login_time = mysqli_query($link, $loginTime);
		$lastLoginTime = "";
		if(mysqli_num_rows($find_user_login_time)){
			$founduser = mysqli_fetch_array($find_user_login_time, MYSQLI_ASSOC);
			$lastLoginTime = $founduser['login_date'];
		}
	}
	else{
        header("Location: login.php");
        exit;
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Administrator</title>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/cms.css">
    </head>
	<body>
		<div class="adminPanel">
			<h2>Administration Panel</h2>
			<div class="last-time-login">
				<?php if(!empty($lastLoginTime)) echo "<p>Last Time Successful Login: " . $lastLoginTime . "</p>"; ?>
			</div>
			<div class="greetings">
                <?php
                	if($currentTime > "00:00:00" && $currentTime < "12:00:00"){ echo "<h3>Good morning, " . $_SESSION['user_name'] . ". Welcome to administration panel.</h3>"; }
					if($currentTime > "12:00:00" && $currentTime < "17:00:00"){ echo "<h3>Good afternoon, " . $_SESSION['user_name'] . ". Welcome to administration panel.</h3>"; }
					if($currentTime > "17:00:00" && $currentTime < "20:00:00"){ echo "<h3>Good evening, " . $_SESSION['user_name'] . ". Welcome to administration panel.</h3>"; }
					if($currentTime > "20:00:00" && $currentTime < "24:00:00"){ echo "<h3>Good night, " . $_SESSION['user_name'] . ". Welcome to administration panel.</h3>"; }	
				?>
			</div>
			<div class="navigation">
				<a href="cms_createuser.php">Create User</a>
				<a href="cms_edituser.php">Edit User</a>
				<a href="cms_deleteuser.php">Delete User</a>
				<a href="cms_story.php">Stories</a>
				<a href="cms_statistic.php">Statstics</a>
				<a href="logout.php">Sign Out</a>
			</div>
		</div>
	</body>
</html>