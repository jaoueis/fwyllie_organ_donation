<?php
    session_start();
    require("session.php");
    require("connection.php");
    require("cms_user_functions.php");
	$id = $_SESSION['user_id'];
	$popForm = fetch_userInfo($link, $id);
	$info = mysqli_fetch_array($popForm);

	if(isset($_POST['submit'])){
		if(!empty(trim($_POST['fname'])) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST["lvllist"]))){
			$fname = trim($_POST['fname']);
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$email = trim($_POST['email']);
			$lvl = trim($_POST["lvllist"]);
			$result = editUser($link, $id, $fname, $username, $password, $email, $lvl);
			$message = $result;
		}
		else{
			$message = "Please fill in all required fields.";
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Edit User</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/cms.css">
	</head>
	<body>
		<div class="editUser">
			<h2>Edit User</h2>
			<?php if(!empty($message)){echo "<p class='errorMsg'>" . $message . "</p>";}?>
			<form action="cms_edituser.php" method="post" class="createForm">
				<div class="form-row">
        			<div class="form-group col-md-6">
						<label for="fullName">Full Name: <span>*</span></label>
						<input type="text" id="fullName" class="form-control" name="fname" value="<?php echo $info['user_fullname'];?>">
					</div>
        			<div class="form-group col-md-6">
						<label for="userid">Username: <span>*</span></label>
						<input type="text" id="userid" class="form-control" name="username" value="<?php echo $info['user_id'];?>">
					</div>
				</div>
				<div class="form-row">
        			<div class="form-group col-md-6">
						<label for="userpwd">Password: <span>*</span></label>
						<input type="text" id="userpwd" class="form-control" name="password" value="">
					</div>
        			<div class="form-group col-md-6">	
						<label for="userEmail">Email: <span>*</span></label>
						<input type="text" id="userEmail" class="form-control" name="email" value="<?php echo $info['user_email'];?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="userLevel">User Level: <span>*</span></label>
						<select name="lvllist" class="form-control" id="userLevel">
							<option value="">Select User Level</option>
							<option value="Super Manager">Super Manager</option>
							<option value="Administrator">Administrator</option>
						</select>
					</div>
				</div>
				<input type="submit" name="submit" value="Edit Account">
				<a href="cms.php" class="backBtn">BACK</a>
			</form>
		</div>
	</body>
</html>