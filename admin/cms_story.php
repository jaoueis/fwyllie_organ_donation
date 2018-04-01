<?php
    session_start();
    require("session.php");
    require("connection.php");

    if(isset($_POST["updateStory"])){
        if(!empty(trim($_POST["id"])) && !empty(trim($_POST["title"])) && !empty(trim($_POST["paragraph"]))){
            $storyId = $_POST["id"];
            $storyTitle = $_POST["title"];
            $storyContent = $_POST["paragraph"];
            $editStory = $link->query("UPDATE stories SET story_title='$storyTitle', story_paragraph='$storyContent' WHERE story_id = '$storyId'");
            if($editStory){
                $successmessage = "Update story successful.";
            }
            else{
                $errormessage = "Failed to update story.";
            }
        }
        else{
            $errormessage = "Please fill in all required fields.";
        }
    }

    if(isset($_POST["newStory"])){
        if(!empty(trim($_POST["title"])) && !empty(trim($_POST["paragraph"]))){
            $storyTitle = $_POST["title"];
            $storyContent = $_POST["paragraph"];
            $addStory = $link->query("INSERT INTO stories (story_title, story_paragraph) VALUES ('$storyTitle', '$storyContent')");
            if($addStory){
                $successmessage = "Add new story successful.";
            }
            else{
                $errormessage = "Failed to create story.";
            }
        }
        else{
            $errormessage = "Please fill in all required fields.";
        }
    }

    $fetch_stories = "SELECT * FROM stories";
    $stories = mysqli_query($link, $fetch_stories);
    if($stories){
        $story_table = "<table class='table table-sm><thead><tr><th>Story Id</th><th>Title</th><th>Story</th><th></th><th></th></tr><thead><tbody>'";
        while($row = mysqli_fetch_array($stories)){
            $story_table.= "<tr><td>" . $row["story_id"] . 
            "</td><td>" . $row["story_title"] . 
            "</td><td>" . $row["story_paragraph"] . 
            "</td><td><a class='btn btn-sm btn-info selectStory' href='#' id='" . $row["story_id"] . "'>Select</a>" . 
            "</td><td><a class='btn btn-sm btn-danger' href='caller.php?caller_id=deleteStory&id=" . $row["story_id"] . "'>Remove</a></td></tr>";
        }
        $story_table.= "</tbody></table>";
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stories</title>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/cms.css">
    </head>
	<body>
		<div class="cmsPanel">
			<h2>Stories Management</h2>
			<?php if(!empty($story_table)) echo $story_table; ?><hr>
            <form action="cms_story.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="storyId">ID:</label>
                        <input type="text" class="form-control" name="id" id="storyId" readonly/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="storyTitle">Title:</label>
                        <input type="text" class="form-control" name="title" id="storyTitle"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="storyContent">Paragraph:</label>
                        <textarea class="form-control" name="paragraph" id="storyContent"></textarea>
                    </div>
                </div>
                <?php if(!empty($errormessage)){echo "<p class='errorMsg'>" . $errormessage . "</p>";}?>
                <?php if(!empty($successmessage)){echo "<p class='successMsg'>" . $successmessage . "</p>";}?>
                <input type="submit" name="updateStory" value="UPDATE">
                <input type="submit" name="newStory" value="CREATE">
                <a href="cms.php" class="backBtn">BACK</a>
            </form>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/cms.js"></script>
	</body>
</html>