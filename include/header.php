<?php
include_once ("db.php");
// Inialize session
session_start();

$sql="SELECT maintain FROM  settings WHERE sno=0";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
	if($main==2 || $main==3)
	{
	print "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
	}

}
?>
<!DOCTYPE html>
<html lang="en">    
 
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $sitename?>.</title>           
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />

        <meta name="description" content="Book a room at <?php echo $sitename?>, Benin and lodge in a hotel near the city center. 
        Free breakfast. WiFi." />
        
        <link rel="canonical" href="index.php" />

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="<?php echo $sitename?>">
        <meta itemprop="description" content="Book a room at <?php echo $sitename?>, Benin and lodge in a hotel near the city center. 
        Free breakfast. WiFi.">
        
        <meta itemprop="image" content="index.php">

        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="index.php">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $sitename?>.">
        <meta property="og:description" content="Book a room at <?php echo $sitename?>, Benin and lodge in a hotel near the city center. 
        Free breakfast. WiFi. Call now to book (+234) 0703-798-6284.">
        
        <meta property="og:image" content="index.php">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo $sitename?>.">
        <meta name="twitter:description" content="It's not unusual to stumble upon celebrities at our breakfast table. Just be polite, and feel free to ask for a selfie">
        <meta name="twitter:image" content="assets/images/restaurant.webp">
 
        <!-- Favicon -->
        <link rel="icon" href="assets/images/favicon.ico" />  

        <!-- Bootstrap -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Flexslider Css -->
	    <link href="assets/plugins/flexslider/flexslider.css" rel="stylesheet">
        <!--font awesome-->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--custom css-->
        <link href="assets/plugins/themify/themify-icons.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/responsive.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400&amp;display=swap" rel="stylesheet">

    