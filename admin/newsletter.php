<?php
function saveEmailAdd($subEmailAdd, $sub) {
    include("connection.php");
    $userstring = "INSERT INTO email_sub (id, email, subscription) VALUES('{$subEmailAdd}','{$sub}')";
    var_dump($userstring);
    $userquery = mysqli_query($link, $userstring);
    if ($userquery) {
        $message = "<p>Thanks for subscription ;)</p>";
        return $message;
    } else {
        $message = "Sorry progress failed, please try again.";
        return $message;
    }
    mysqli_close($link);
}