<?php
session_start();
require("session.php");
require("connection.php");
require("cms_user_functions.php");
if (isset($_POST['submit'])) {
    $fname    = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $lvllist  = trim($_POST['lvllist']);
    if (!empty($fname) && !empty($username) && !empty($email) && !empty($lvllist)) {
        $password = uniqid();
        $result   = createUser($link, $fname, $username, $password, $email, $lvllist);
        if ($result !== "You created a new user.") {
            $successmessage = $result;
        } else {
            $errormessage = $result;
        }
    } else {
        if (empty($fname) || empty($username) || empty($email)) {
            $errormessage = "Please fill in required info.";
        }
        if (empty($lvllist)) {
            $errormessage = "Please select a user level.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
<title>Create User</title>
</head>

<body>
<div class="createUser">
    <h2>Create User</h2>
    <?php if (!empty($errormessage)) {
        echo "<p class='errorMsg'>" . $errormessage . "</p>";
    } ?>
    <?php if (!empty($successmessage)) {
        echo "<p class='successMsg'>" . $successmessage . "</p>";
    } ?>
    <form action="cms_createuser.php" method="post" class="createForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fullName">Full Name: <span>*</span></label>
                <input type="text" class="form-control" name="fname" value="" id="fullName">
            </div>
            <div class="form-group col-md-6">
                <label for="userid">Username: <span>*</span></label>
                <input type="text" class="form-control" name="username" value="" id="userid">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="userEmail">Email: <span>*</span></label>
                <input type="text" class="form-control" name="email" value="" id="userEmail">
            </div>
            <div class="form-group col-md-3">
                <label for="userLevel">User Level: <span>*</span></label>
                <select name="lvllist" class="form-control" id="userLevel">
                    <option value="">Select User Level</option>
                    <option value="Super Manager">Super Manager</option>
                    <option value="Administrator">Administrator</option>
                </select>
            </div>
        </div>
        <input type="submit" name="submit" Password="submit" value="CREATE">
        <a href="cms.php" class="backBtn">BACK</a>
    </form>
</div>
</body>

</html>
