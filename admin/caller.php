<?php
    session_start();
    require("connection.php");
    if(isset($_SESSION["user_id"])){
        if(isset($_GET["caller_id"])){
            if($_GET["caller_id"] == "deleteUser" && isset($_GET["id"])){
                $id = $_GET["id"];
                $delstring = "DELETE FROM admin_group WHERE user_id = '{$id}'";
                $delquery = mysqli_query($link, $delstring);
                mysqli_close($link);
                header("Location: cms.php");
            }
            else if($_GET["caller_id"] == "deleteStory" && isset($_GET["id"])){
                $id = $_GET["id"];
                $delstring = "DELETE FROM stories WHERE story_id = {$id}";
                $delquery = mysqli_query($link, $delstring);
                mysqli_close($link);
                header("Location: cms_story.php"); 
            }
            else if($_GET["caller_id"] == "deleteStatistic" && isset($_GET["id"])){
                $id = $_GET["id"];
                $delstring = "DELETE FROM statistics WHERE statistic_id = {$id}";
                $delquery = mysqli_query($link, $delstring);
                mysqli_close($link);
                header("Location: cms_statistic.php"); 
            }
        }
        else{
            header("Location: cms.php");
            exit;
        }
    }
    else{
        header("Location: login.php");
        exit;
    }
?>