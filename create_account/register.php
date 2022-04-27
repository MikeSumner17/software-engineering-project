<?php
session_start();

DEFINE('DB_HOST', 'gymmanagementdb.cvouqioew9pk.us-east-1.rds.amazonaws.com');
DEFINE('DB_USER', 'team5');
DEFINE('DB_PASSWORD', 'team5sweng');
DEFINE('DB_NAME', 'Team5GymManagementDB');

// Create connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT password FROM users WHERE user_name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		?><script> alert("Username exists, please choose another!"); window.history.back();</script><?php
	} else {
		// Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO users (user_name, password) VALUES (?, ?)')) {
	    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	        $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
	        $stmt->execute();
            header('Location: ../index.html');
        } else {
	        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			?><script> alert("Could not prepare statment!"); window.history.back();</script><?php
        }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	?><script> alert("Could not prepare statment!"); window.history.back();</script><?php
}
$con->close();
?>
