<?php
session_start();

DEFINE('DB_HOST', 'gymmanagementdb.cvouqioew9pk.us-east-1.rds.amazonaws.com');
DEFINE('DB_USER', 'team5');
DEFINE('DB_PASSWORD', 'team5sweng');
DEFINE('DB_NAME', 'Team5GymManagementDB');

// Create connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['search'])) {
	// Could not get the data that should have been sent.
	exit('Please enter search target!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['search'])) {
	// value is empty.
	exit('Please enter search target');
}
$search = $_POST['search'];
// add code here using is_numeric() to determine if the input is a barcode or a name. 
if(is_numeric($_POST['search'])) {
    // its a barcode!! proceed...
    $member = $con->query("SELECT * FROM members WHERE barcode = $search");
    if(mysqli_num_rows($member) > 0) {
        ?><!DOCTYPE html>
        <html>
            <title>Found Member</title>
        <body>
            <table align="center" border="1px" style="width:600px; line-hight:40px;">
                <tr>
                    <th colspan="9"><h2>Results</h2></th>
                </tr>
                <t>
                    <th>-</th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Date of Birth </th>
                    <th> Email </th>
                    <th> Membership </th>
                    <th> Barcode </th>
                    <th> Active? </th>
                    <th> Total Check-ins </th>
                </t>
            <?php
                while($rows=mysqli_fetch_assoc($member)) {
                    ?>
                    <tr>
                    <td><form action="actions/checkin.php" method="post">
                            <input type="hidden" name="barcode" value=<?php echo $rows['barcode']?>>
                            <input type="submit" name="Check-in"; value="Check-in">
                            </form>
                        </td>
                        <td><?php echo $rows['firstname']; ?></td>
                        <td><?php echo $rows['lastname']; ?></td>
                        <td><?php echo $rows['dateofbirth']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['membershiplevel']; ?></td>
                        <td><?php echo $rows['barcode']; ?></td>
                        <td><?php if($rows['active'] == 1) {
                                        echo 'yes';
                                    } else {
                                        echo 'no';
                                    } ?></td>
                        <td><?php echo $rows['checkins']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </body>
        </html>
        <?php
    } else {
        ?><script> alert("Search Target Not In Database!"); window.history.back();</script><?php
    }
} else {
    // its not a barcode! proceed...
    $result = $con->query("SELECT * FROM members WHERE '$search' LIKE CONCAT('%',lastname,'%')");
    //$members = "SELECT * FROM members WHERE lastname LIKE " .$con->quote($_POST['search']);
    
    if(mysqli_num_rows($result) > 0) {
        ?><!DOCTYPE html>
        <html>
            <title>Found Members</title>
        <body>
            <table align="center" border="1px" style="width:600px; line-hight:40px;">
                <tr>
                    <th colspan="8"><h2>Results</h2></th>
                </tr>
                <t>
                    <th>-</th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Date of Birth </th>
                    <th> Email </th>
                    <th> Membership </th>
                    <th> Barcode </th>
                    <th> Active? </th>
                    <th> Total Check-ins </th>
                </t>
            <?php
                while($rows=mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><form action="actions/checkin.php" method="post">
                            <input type="hidden" name="barcode" value=<?php echo $rows['barcode']?>>
                            <input type="submit" name="Check-in"; value="Check-in">
                            </form>
                        </td>
                        <td><?php echo $rows['firstname']; ?></td>
                        <td><?php echo $rows['lastname']; ?></td>
                        <td><?php echo $rows['dateofbirth']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['membershiplevel']; ?></td>
                        <td><?php echo $rows['barcode']; ?></td>
                        <td><?php if($rows['active'] == 1) {
                                        echo 'yes';
                                    } else {
                                        echo 'no';
                                    } ?></td>
                        <td><?php echo $rows['checkins']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </body>
        </html>
        <?php
    } else {
        ?><script> alert("No Matching Results Found!"); window.history.back();</script><?php    
    }
}
?>
