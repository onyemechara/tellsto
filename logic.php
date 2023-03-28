<?php include 'includes/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review']) && isset($_POST['todo']))
{
$todo = mysqli_real_escape_string($con, $_POST["todo"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$url = mysqli_real_escape_string($con, $_POST["url"]);
$rating = mysqli_real_escape_string($con, $_POST["rating"]);
$title = mysqli_real_escape_string($con, $_POST["title"]);
$comment = mysqli_real_escape_string($con, $_POST["comment"]);

$status = "OK";
$msg="";

if ( strlen($title) < 4 ){
$msg=$msg."Title too short<BR>";
$status= "NOTOK";
}

if ( strlen($comment) < 15 ){
$msg=$msg."Comment too short<BR>";
$status= "NOTOK";
}

$date=date("Y-m-d");

if ($status=="OK") 
{
$query=mysqli_query($con,"INSERT INTO reviews (email,url,rating,title,comment,date) VALUES ('$email','$url','$rating','$title','$comment','$date')");
if($query){
// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <'.$sitemail.'>' . "\r\n";
$to=$email;
$subject="Review Sumbitted";
$message='Congratulations, your review has been submitted successfully';
mail($to,$subject,$message,$headers);
echo "<script>alert('Review Submitted Successfully!')</script>";
			echo "<script>window.location = 'report-review.php'</script>";

}
else{
    echo "error";
}

}

else
{ 
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Attention! </br></strong>".$msg."</div>"; //printing error if found in validation
					
}



}







if (isset($_POST['login'])) {
  $status = "OK"; //initial status
  $msg = "";
  $email = mysqli_real_escape_string($con, $_POST['email']); //fetching details through post method
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $phoneNumber = "";


  if ($status == "OK") {

    // Retrieve email and password from database according to user's input, preventing sql injection
    $query = "SELECT * FROM users WHERE (email = '$email') AND (password = '$password') AND (level = '2')";
    if ($stmt = mysqli_prepare($con, $query)) {

      /* execute query */
      mysqli_stmt_execute($stmt);

      /* store result */
      mysqli_stmt_store_result($stmt);

      $num = mysqli_stmt_num_rows($stmt);

      /* close statement */
      mysqli_stmt_close($stmt);
    }
    //mysqli_close($con);
    // Check email and password match

$sqlquery11="SELECT active FROM users where email = '$email'"; //fetching expiry date of email from table
$rec211=mysqli_query($con,$sqlquery11);
$row211 = mysqli_fetch_row($rec211);
$active=$row211[0];
$curdate=date("Y-m-d");

if ($num == 1){
if($active==0){
      	$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Attention! </br></strong>Hi, Your Account Has Been Deactivated, Please Contact the Admin To Renew Your Account.</div>"; //printing error if found in validation
				
   $statusflag= "NOTOK";
    			
}
else{
    
session_start();
  // Set email session variable
  $_SESSION['email'] = $email;
       
        
  $email = $_SESSION['email'];
  $queryupdate = "SELECT * FROM users where email = '$email'"; 
  $pointcall = mysqli_query($con,$queryupdate );
  $row = mysqli_fetch_assoc($pointcall);
  

if($active==1){
   mysqli_query($con,$update);   
 print "<script>alert('You have logged in successfully, Proceed!')</script>";
}

		print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>"; 
}
	 
}

else{
   print "<script>alert('You have entered a wrong email/password')</script>";
   print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>"; 
}} 
else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Attention : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}







if(isset($_POST['register']))
{
// Collect the data from post method of form submission // 
$name=mysqli_real_escape_string($con,$_POST['name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$conditionterms=mysqli_real_escape_string($con,$_POST['conditionterms']);


$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok

if(!ctype_alnum($username)){
echo "<script>alert('User Id Should Contain Alphanumeric Chars Only.')</script>";
$status= "NOTOK";}					

$rr=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$nr = $r[0];
if($nr==1){
  
echo "<script>alert('Username Already Exists. Please Try Another One.')</script>";
$status= "NOTOK";
}	

$rrr=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE mobile = '$mobile'");
$r3 = mysqli_fetch_row($rrr);
$nr3 = $r3[0];
if($nr3==1){
echo "<script>alert('Mobile Number Already Registered.')</script>";
$status= "NOTOK";
}	

$remail=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE email = '$email'");
$re = mysqli_fetch_row($remail);
$nremail = $re[0];
if($nremail==1){
  echo "<script>alert('Email Already Registered.')</script>";
$status= "NOTOK";
}				

if ( strlen($password) < 6 ){
echo "<script>alert('Password Must Be More Than 8 Char Length.')</script>";
$status= "NOTOK";}	

if ( strlen($mobile) > 15 ){
  echo "<script>alert('Please Enter Correct Mobile Number.')</script>";
  $status= "NOTOK";
}

if ( $country == "" ){
echo "<script>alert('Please Enter Your Country Name.')</script>";
$status= "NOTOK";}	

//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
//The value of $ip at this point would look something like: "192.0.34.166"
$ip = ip2long($ip);
//The $ip would now look something like: 1073732954


if ($status=="OK") 
{
$doj=date("Y-m-d");  
$scode=rand(1111111111,9999999999); //generating random code, this will act as signup key
$query=mysqli_query($con,"INSERT INTO users (name,username,email,password,ipaddress,mobile,doj,address,country,signupcode,gender,conditionterms,level,active) VALUES ('$name','$username','$email','$password','$ip','$mobile','$doj','$address','$country','$scode','$gender','$conditionterms','2','1')");
if($query){
   // More headers
   $to      = $email; // Send email to our user
   $subject = 'Booking'; // Give the email a subject 
   $message ='<html><body><div style="padding:5px;background:#eae8e8;line-height:1.6;font-size:13px"><table width=100% border=0 style="background:#fff;padding:0 10px;max-width:500px;margin:0 auto;"><tr><td>';
   $message .= '<a href="'.$siteurl.'"><img style="width:240px;max-width:50%;margin:10px" src="images/logo.png"/></a>';
   $message .= '</td></tr>';
   $message .='<tr><td colspan="2" style="border-top:1px solid #ccc;padding:10px 0"><h3 style="color:#333;font-weight:100;font-size:20px;margin:0;padding:0;font-family:Verdana,Arial,\'Segoe UI\',sans-serif;text-transform:capitalize">'.$subject.'</h3></td></tr>
   <tr><td colspan="2">Dear '.$name.'!<br>
 Your have successfully registered at '.$sitename.'
 </td></tr>
 <tr><td colspan="2">you may proceed to booking your choice of room with us.</td></tr>
 <tr><td colspan="2" style="color:#000;padding:10px 0">Best regards,</td></tr>
 <tr><td colspan="2" style="color:#000;padding:10px 0">Management.</td></tr>';
   $message .= '</table></div></body></html>';
      
   $header = array();
   $header[] = "MIME-Version: 1.0";
   $header[] = "From: <{$adminemail}>";
   /* Set message content type HTML*/
   $header[] = "Content-type:text/html; charset=iso-8859-1";
   $header[] = "Content-Transfer-Encoding: 7bit";
 mail($to, 'Booking', $message, implode("\r\n", $header));


echo "<script>alert('Thank you for registering!')</script>";
echo "<script>window.location = 'index.php'</script>";

}
else{
    echo "error";
}

}

else
{ 
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Attention! </br></strong>".$msg."</div>"; //printing error if found in validation				
}
}





if(isset($_POST['booking']))
{
// Collect the data from post method of form submission // 
$email=mysqli_real_escape_string($con,$_POST['email']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$rm_name=mysqli_real_escape_string($con,$_POST['rm_name']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
$category=mysqli_real_escape_string($con,$_POST['category']);
$nor=mysqli_real_escape_string($con,$_POST['nor']);
$noo=mysqli_real_escape_string($con,$_POST['noo']);
$sex1=mysqli_real_escape_string($con,$_POST['sex1']);
$sex2=mysqli_real_escape_string($con,$_POST['sex2']);
$sex3=mysqli_real_escape_string($con,$_POST['sex3']);
$sex4=mysqli_real_escape_string($con,$_POST['sex4']);
$checkin=mysqli_real_escape_string($con,$_POST['checkin']);
$checkout=mysqli_real_escape_string($con,$_POST['checkout']);

$status = "OK";
$msg="";
//validation starts
if ($checkin > $checkout){
  
echo "<script>alert('Checkin date cannot be greater than Checkout date.')</script>";
  $status= "NOTOK";}	

if ($status=="OK") 
{
$dob=date("Y-m-d");  
$scode=rand(1111111111,9999999999); //generating random code, this will act as signup key
$query=mysqli_query($con,"INSERT INTO booking (name,email,mobile,address,rm_name,amount,category,noo,sex1,sex2,sex3,sex4,nor,checkin,checkout,dob) VALUES ('$name','$email','$mobile','$address','$rm_name','$amount','$category','$noo','$sex1','$sex2','$sex3','$sex4','$nor','$checkin','$checkout','$dob')");
if($query){

  $to      = $email; // Send email to our user
	$subject = 'Booking'; // Give the email a subject 
	$message ='<html><body><div style="padding:5px;background:#eae8e8;line-height:1.6;font-size:13px"><table width=100% border=0 style="background:#fff;padding:0 10px;max-width:500px;margin:0 auto;"><tr><td>';
	$message .= '<a href="'.$siteurl.'"><img style="width:240px;max-width:50%;margin:10px" src="images/logo.png"/></a>';
	$message .= '</td></tr>';
	$message .='<tr><td colspan="2" style="border-top:1px solid #ccc;padding:10px 0"><h3 style="color:#333;font-weight:100;font-size:20px;margin:0;padding:0;font-family:Verdana,Arial,\'Segoe UI\',sans-serif;text-transform:capitalize">'.$subject.'</h3></td></tr>
	<tr><td colspan="2">Dear '.$name.'!<br>
Your booking has been received
</td></tr>
<tr><td colspan="2">Room: '.$rm_name.'</td></tr>
<tr><td colspan="2">no of rooms: '.$nor.'</td></tr>
<tr><td colspan="2">Checkin: '.$checkin.'</td></tr>
<tr><td colspan="2">Checkout: '.$checkout.'</td></tr>
	<tr><td colspan="2" style="color:#000;padding:10px 0">Please, come with your booking receipt</td></tr>';
	$message .= '</table></div></body></html>';
     
	$header = array();
	$header[] = "MIME-Version: 1.0";
	$header[] = "From: <{$adminemail}>";
	/* Set message content type HTML*/
	$header[] = "Content-type:text/html; charset=iso-8859-1";
	$header[] = "Content-Transfer-Encoding: 7bit";
mail($to, 'Booking', $message, implode("\r\n", $header));

echo "<script>alert('You have booked $nor room(s) from $rm_name successfully!')</script>";
echo "<script>window.location = 'profile.php'</script>";

}
else{
    echo "error";
}

}



else
{echo "<script>alert('You can not checkin on $checkin and checkout on $checkout, your checkout date must succeed your checkin date.')</script>";
  echo "<script>window.location = 'index.php'</script>";
          
}

}
?>