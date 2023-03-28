	<?php
	session_start(); //starting session
include('db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$name=mysqli_real_escape_string($con,$_POST['name']); //fetching details through post method
$user = mysqli_real_escape_string($con,$_POST['username']);
$mail = mysqli_real_escape_string($con,$_POST['email']);
$pass = mysqli_real_escape_string($con,$_POST['password']);


if($status=="OK")
{
$res1=mysqli_query($con,"INSERT INTO users (name, username, email, password,active,level) VALUES ('$name', '$user', '$mail', '$pass','1','1')");

if($res1)
{
print" <script>alert('Story teller account created successfully!')</script>";
	echo "<script>window.location = 'index.php'</script>";
}
else
{
print "error!!!! try again later.";
}


} 
else {
        
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing errors
	 
}

?>