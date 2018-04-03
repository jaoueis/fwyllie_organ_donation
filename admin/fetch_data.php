<?php
header('Content-Type: application/json');
require("connection.php");
if (isset($_GET["data"])) {
    if ($_GET["data"] == "story") {
        $fetch_stories = "SELECT * FROM stories";
        $story_array   = array();
        $stories       = mysqli_query($link, $fetch_stories);
        if ($stories) {
            while ($row = $stories->fetch_assoc()) {
                array_push($story_array, $row);
            }
            echo json_encode($story_array);
        }
    } else if ($_GET["data"] == "statistic") {
        $fetch_statisticss = "SELECT * FROM statistics";
        $statistics_array  = array();
        $statistics        = mysqli_query($link, $fetch_statisticss);
        if ($statistics) {
            while ($row = $statistics->fetch_assoc()) {
                array_push($statistics_array, $row);
            }
            echo json_encode($statistics_array);
        }
    }
}