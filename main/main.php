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
    </body>
</html>
