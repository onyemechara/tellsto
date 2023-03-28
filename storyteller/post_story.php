<?php
session_start(); //starting session
include('db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$title=mysqli_real_escape_string($con,$_POST['title']); //fetching details through post method
$cat = mysqli_real_escape_string($con,$_POST['cat']);
$message = mysqli_real_escape_string($con,$_POST['message']);
$country = mysqli_real_escape_string($con,$_POST['country']);


if ( strlen($title) < 2 ){
$msg=$msg."Subject Should Have Minimum 2 Characters.<BR>";
$status= "NOTOK";}

if ( strlen($message) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Body must contain more than 4 char length.<BR>";
$status= "NOTOK";}

$uploads_dir = '../uploads';

        $tmp_name = $_FILES["ufile"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["ufile"]["name"]); 
        $random_digit=rand(0000,9999);
        $new_file_name=$random_digit.$name;
        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
if($status=="OK")
{
$res1=mysqli_query($con,"INSERT INTO blog (user_id, title, category, ufile, details, postdate,country, status) VALUES ('Admin', '$title', '$cat', '$new_file_name', '$message', NOW(),'$country', '1')");

if($res1)
{
print" <script>alert('Story Submitted Successfully!')</script>";
	echo "<script>window.location = 'createstory.php'</script>";
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
