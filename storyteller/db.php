<?php
$con = new mysqli("localhost", "dailaeyl_1", "Emmanuel261..", "dailaeyl_test");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

  $mission_statement="SELECT * FROM settings"; 
                       $mission = mysqli_query($con,$mission_statement);
                       $rowmission = mysqli_fetch_array($mission);
                       $mis="$rowmission[mission_statement]";
                       $sitename="$rowmission[coname]";
                       $sitemail="$rowmission[email]";
                       $siteaddress="$rowmission[address]";
                       $sitemobile="$rowmission[mobile]";


?>