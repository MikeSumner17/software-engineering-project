<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">
  <script defer src="index.js"></script>
</head>

<?php
require_once "connect.php";
?>

<body>
  <div id="main-holder">
    <h1 id="login-header">Login</h1>
    
    <div id="login-page-image-holder">
      <img id="login-page-image" src="Barbell image.jpg" class="center">
    </div>
    
    <form id="login-form">
      <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">
      <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">
      <input type="submit" value="Login" id="login-form-submit">
      <input type="button" value="Create Account" id="create-account-button">
    </form>
  
  </div>
</body>

</html>
