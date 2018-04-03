<?php
session_start();
require("session.php");
require("connection.php");

if (isset($_POST["updateStatistic"])) {
    if (!empty(trim($_POST["id"])) && !empty(trim($_POST["content"]))) {
        $id            = $_POST["id"];
        $content       = $_POST["content"];
        $editStatistic = $link->query("UPDATE statistics SET statistic_desc='$content' WHERE statistic_id = '$id'");
        if ($editStatistic) {
            $successmessage = "Update statistic successful.";
        } else {
            $errormessage = "Failed to update statistic.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

if (isset($_POST["newStatistic"])) {
    if (!empty(trim($_POST["content"]))) {
        $content      = $_POST["content"];
        $addStatistic = $link->query("INSERT INTO statistics (statistic_desc) VALUES ('$content')");
        if ($addStatistic) {
            $successmessage = "Add new statistic successful.";
        } else {
            $errormessage = "Failed to create statistic.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

$fetch_statistic = "SELECT * FROM statistics";
$statistics      = mysqli_query($link, $fetch_statistic);
if ($statistics) {
    $statistic_table = "<table class='table table-sm><thead><tr><th>Id</th><th>Content</th><th></th><th></th></tr><thead><tbody>'";
    while ($row = mysqli_fetch_array($statistics)) {
        $statistic_table .= "<tr><td>" . $row["statistic_id"] .
                            "</td><td>" . $row["statistic_desc"] .
                            "</td><td><a class='btn btn-sm btn-info selectStatistic' href='#' id='" . $row["statistic_id"] . "'>Select</a>" .
                            "</td><td><a class='btn btn-sm btn-danger' href='caller.php?caller_id=deleteStatistic&id=" . $row["statistic_id"] . "'>Remove</a></td></tr>";
    }
    $statistic_table .= "</tbody></table>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Statistics</title>
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<div class="cmsPanel">
    <h2>Statistic Management</h2>
    <?php if (!empty($statistic_table))
        echo $statistic_table; ?>
    <hr>
    <form action="cms_statistic.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="statisticId">ID:</label>
                <input type="text" class="form-control" name="id" id="statisticId" readonly />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="statisticContent">Content:</label>
                <textarea class="form-control" name="content" id="statisticContent"></textarea>
            </div>
        </div>
        <?php if (!empty($errormessage)) {
            echo "<p class='errorMsg'>" . $errormessage . "</p>";
        } ?>
        <?php if (!empty($successmessage)) {
            echo "<p class='successMsg'>" . $successmessage . "</p>";
        } ?>
        <input type="submit" name="updateStatistic" value="UPDATE">
        <input type="submit" name="newStatistic" value="CREATE">
        <a href="cms.php" class="backBtn">BACK</a>
    </form>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/cms.js"></script>
</body>
</html>