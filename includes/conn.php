<?php
$con = new mysqli("localhost", "acecqxjr_1", "Emmanuel261..", "acecqxjr_txt");
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// $sql = "SELECT maintain FROM  settings";
// if ($result = mysqli_query($con, $sql)) {

//   /* fetch associative array */
//   while ($row = mysqli_fetch_row($result)) {
//     $main = $row[0];
//   }
//   if ($main == 1 || $main == 3) {
//     print "
// 				<script language='javascript'>
// 					window.location = 'maintain.php';
// 				</script>
// 			";
//   }
// }


$mission_statement = "SELECT * FROM settings";
$mission = mysqli_query($con, $mission_statement);
$rowmission = mysqli_fetch_array($mission);
$mis = "$rowmission[mission_statement]";
$sitename = "$rowmission[coname]";
$sitemail = "$rowmission[email]";
$siteaddress = "$rowmission[address]";
$sitemobile = "$rowmission[mobile]";
$wlink = "$rowmission[wlink]";
