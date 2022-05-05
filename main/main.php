<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyGymManager</title>
        <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
        <script defer src="main.js"></script>
    </head>    
    
    <body>
        <div class="topnav">
            <a class="topnav-left" href="../add_member/addmember.php">Add Member</a>
            <a class="topnav-left" href="../search/search.php">Search</a>
            <a class="topnav-left" href="../plans/plans.html">Plans</a>
            <a class="topnav-right" href="logout.php">Log Out</a>
        </div> 

    	<div class="mainbody">
            <iframe id="calendar" src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23616161&ctz=America%2FNew_York&showTitle=0&mode=WEEK&src=bjhuMjU0OTRyOHJtZHFlMnAxZmg1cm1mZDhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23E4C441" style="border-width:0" width="1600" height="800" frameborder="0" scrolling="no"></iframe>        
        </div>
    </body>
</html>
