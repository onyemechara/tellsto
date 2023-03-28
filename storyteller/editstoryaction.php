<?php
session_start(); //starting session
include('db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$id=mysqli_real_escape_string($con,$_POST['id']); 
$cat = mysqli_real_escape_string($con,$_POST['cat']);
$title = mysqli_real_escape_string($con,$_POST['title']);
$message = mysqli_real_escape_string($con,$_POST['message']);



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
$res1=mysqli_query($con,"UPDATE blog SET title='$title', category='$cat', ufile='$new_file_name', details='$message' WHERE id='$id'");

if($res1)
{
print" <script>alert('Story Edited Successfully!')</script>";
	echo "<script>window.location = 'viewstory.php'</script>";
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
