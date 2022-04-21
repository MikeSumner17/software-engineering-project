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
  <title>Add Member</title>
  <link rel="stylesheet" href="addmember.css">
  <script defer src="addmember.js"></script>
</head>

<body>
  <div id="main-holder">
    <h1 id="login-header">Add Member
    </h1>
    
    <form action="sendmember.php" method="post" id="login-form">
      <input type="text" name="firstname" id="firstname" class="login-form-field" placeholder="First Name" required>
      <input type="text" name="lastname" id="lastname" class="login-form-field" placeholder="Last Name" required>
      <input type="date" name="dob" id="dob" class="login-form-field" placeholder="Date of Birth" required>
      <input type="text" name="email" id="email" class="login-form-field" placeholder="Email" required>
      <input type="text" name="barcode" id="barcode" class="login-form-field" placeholder="Barcode Number" required>
      <p>Membership Level:</p> 
      <div>
        <input type="radio" id="contactChoice1"
         name="contact" value="Standard">
        <label for="contactChoice1">Standard</label><br>
    
        <input type="radio" id="contactChoice2"
         name="contact" value="Platinum">
        <label for="contactChoice2">Platinum</label><br><br>
      </div>
      <input type="submit" value="Add Member" id="login-form-submit">
    </form>
  </div>
  
</body>

</html>