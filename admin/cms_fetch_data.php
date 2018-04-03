<?php
header('Content-Type: application/json');
session_start();
require("session.php");
require("connection.php");
if (isset($_GET["content"])) {
    if ($_GET["content"] == "story") {
        if (isset($_GET["getData"])) {
            $id            = $_GET["getData"];
            $fetch_stories = "SELECT * FROM stories WHERE story_id = '$id'";
            $stories       = mysqli_query($link, $fetch_stories);
            if ($stories) {
                $row = mysqli_fetch_array($stories);
                echo json_encode($row);
            }
        } else {
            header("Location: cms.php");
            exit;
        }
    }
    if ($_GET["content"] == "statistic") {
        if (isset($_GET["getData"])) {
            $id            = $_GET["getData"];
            $fetch_stories = "SELECT * FROM statistics WHERE statistic_id = '$id'";
            $statistics    = mysqli_query($link, $fetch_stories);
            if ($statistics) {
                $row = mysqli_fetch_array($statistics);
                echo json_encode($row);
            }
        } else {
            header("Location: cms.php");
            exit;
        }
    }
} else {
    header("Location: cms.php");
    exit;
}