<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Member</title>
  <link rel="stylesheet" href="search.css">
  <script defer src="search.js"></script>
</head>

<body>
  <div id="main-holder">
    <h1 id="login-header">Find Member
    </h1>
    <form action="sendsearch.php" method="post" id="login-form">
      <input type="text" name="search" id="search" class="login-form-field" placeholder="Barcode or Last Name" required>
      <input type="submit" value="Search" id="login-form-submit">
    </form>
    <button onclick="window.location.href='../main/main.php'" name="back" id="back" class="backbutton">Back</button>
  </div>
</body>

</html>