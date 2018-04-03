<?php
if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
}
if (isset($_SESSION["user_name"])) {
    unset($_SESSION["user_name"]);
}

header("Location: login.php");
exit;