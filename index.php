<?php
require_once("admin/newsletter.php");
if (isset($_POST['submit'])) {
    $subEmailAdd = trim($_POST['email']);
    if (!empty($subEmailAdd)) {
        $sub     = 0;
        $result  = saveEmailAdd($subEmailAdd, $sub);
        $message = $result;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Organ Donation</title>
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
include('section/header.html');
include('section/home_hero_banner.html');
include('section/home_header_text.html');
include('section/home_stories.html');
include('section/home_involved.html');
include('section/footer.html');
?>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mobile_nav.js"></script>
<script src="js/video_control.js"></script>
</body>
</html>