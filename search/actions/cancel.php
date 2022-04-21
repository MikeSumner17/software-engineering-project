<?php
session_start();

DEFINE('DB_HOST', 'gymmanagementdb.cvouqioew9pk.us-east-1.rds.amazonaws.com');
DEFINE('DB_USER', 'team5');
DEFINE('DB_PASSWORD', 'team5sweng');
DEFINE('DB_NAME', 'Team5GymManagementDB');

// Create connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// AYO SECURITY!! SECURITY!?? oh yeah, ain't got none. 

        $barcode = $_POST['barcode'];
        if(!$con->connect_error) {$con->query("UPDATE members SET active = 0 WHERE barcode ='$barcode'");}
        ?><script>
        alert('Membership has been cancelled.'); window.location.href = '../search.html';
        </script><?php
        //header('Location: ../search.html');

?>