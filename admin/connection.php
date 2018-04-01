<?php
    $host_name  = "localhost";
    $database   = "organ_donation";
    $user_name  = "root";
    $password   = "root";
	date_default_timezone_set("America/Toronto");
    $link = mysqli_connect($host_name, $user_name, $password, $database);

    if(mysqli_connect_errno())
    {
    echo "<p>Verbindung zum MySQL Server fehlgeschlagen: ".mysqli_connect_error()."</p>";
    }

?>
