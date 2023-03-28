<?php
include_once ("db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
			
}
$todelete= mysqli_real_escape_string($con,$_GET["id"]);

$result=mysqli_query($con,"DELETE FROM blog WHERE id='$todelete'");
if ($result)
{
print" <script>alert('Story Deleted Successfully!')</script>";
	echo "<script>window.location = 'viewstory.php'</script>";
}
else
{
print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}

?>