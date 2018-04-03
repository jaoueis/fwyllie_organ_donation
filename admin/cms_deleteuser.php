<?php
session_start();
require("session.php");
require("connection.php");
require("cms_user_functions.php");
$tbl        = "admin_group";
$users      = fetch_allUsers($link, $tbl);
$user_table = "<h5>All Users</h5>";
while ($row = mysqli_fetch_array($users)) {
    $user_table .= "<div class='inline-rows'>Full Name: " . $row['user_fullname'] . "<a class='btn btn-sm btn-danger right' href=\"caller.php?caller_id=deleteUser&id={$row['user_id']}\">Remove</a></div>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete User</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<div class="editUser">
    <h2>Delete User</h2>
    <?php if (isset($user_table))
        echo $user_table; ?>
    <a href="cms.php" class="backBtn">BACK</a>
</div>
</body>
</html>