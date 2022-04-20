<?php
session_start();

DEFINE('DB_HOST', 'gymmanagementdb.cvouqioew9pk.us-east-1.rds.amazonaws.com');
DEFINE('DB_USER', 'team5');
DEFINE('DB_PASSWORD', 'team5sweng');
DEFINE('DB_NAME', 'Team5GymManagementDB');

// Create connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

if (!isset($_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['email'], $_POST['barcode']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill out all fields');
}

if (empty($_POST['firstname']) || empty($_POST['lastname'] || empty($_POST['dob']) || empty($_POST['email']) || empty($_POST['barcode']))) {
	// One or more values are empty.
	exit('Please fill out all fields');
}

$date = date("m-d-Y", strtotime($_POST['dob']));
if ($stmt = $con->prepare('INSERT INTO Team5GymManagementDB.members (firstname, lastname, dateofbirth, email, barcode) VALUES (?, ?, ?, ?, ?)')) {
	$stmt->bind_param('sssss', $_POST['firstname'], $_POST['lastname'], $date, $_POST['email'], $_POST['barcode']);
	$stmt->execute();
    header('Location: ../main/main.html');
    //$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    ?><script> alert("Could not prepare statement!"); window.history.back();</script><?php
}
//$con->close();
?>