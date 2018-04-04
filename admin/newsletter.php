<?php
function saveEmailAdd($subEmailAdd, $sub) {
    include("connection.php");
    $checkExist = "SELECT * FROM email_sub WHERE email = '{$subEmailAdd}'";
    $existSub   = mysqli_query($link, $checkExist);
    if ($existSub->num_rows > 0) {
        $message = "<p>You already subscribed.</p>";
        return $message;
    } else {
        $userstring = "INSERT INTO email_sub (email, subscription) VALUES('{$subEmailAdd}','{$sub}')";
        $userquery  = mysqli_query($link, $userstring);
        if ($userquery) {
            $message = "<p>Thanks for subscription ;)</p>";
            return $message;
        } else {
            $message = "Sorry progress failed, please try again.";
            return $message;
        }
    }
    mysqli_close($link);
}