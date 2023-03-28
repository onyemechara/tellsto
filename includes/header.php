<?php include 'includes/conn.php';
// Inialize session
session_start();

// $sql="SELECT maintain FROM  settings WHERE sno=0";
// 		  if ($result = mysqli_query($con, $sql)) {

//     /* fetch associative array */
//     while ($row = mysqli_fetch_row($result)) {
//         $main= $row[0];
//     }
// 	if($main==2 || $main==3)
// 	{
// 	print "
// 				<script language='javascript'>
// 					window.location = 'maintain.php';
// 				</script>
// 			";
// 	}

// }
?>

<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title><?php echo $sitename ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/logo.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">

<!-- Modernizer for Portfolio -->
<script src="js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=660203284858189&autoLogAppEvents=1" nonce="w2211Of2"></script>
</head>
<!-- Start header -->
<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<p style="color:#FFF">TOUSTO</p>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbars-host">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php
										// echo active if the current page is index.php
										if ($_SERVER['PHP_SELF'] == '/index.php') {
											echo 'active';
										}
										?>"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item <?php
										// echo active if the current page is index.php
										if ($_SERVER['PHP_SELF'] == '/about.php') {
											echo 'active';
										}
										?>"><a class="nav-link" href="about.php">About</a></li>
					<li class="nav-item <?php
										// echo active if the current page is index.php
										if ($_SERVER['PHP_SELF'] == '/story.php') {
											echo 'active';
										}
										?>"><a class="nav-link" href="story.php">Gallery</a></li>
					<li class="nav-item <?php
										// echo active if the current page is index.php
										if ($_SERVER['PHP_SELF'] == '/contact.php') {
											echo 'active';
										}
										?>"><a class="nav-link" href="contact.php">Contact</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Information</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="#story">Stories</a>
							<a class="dropdown-item" href="storyteller/reg.php">Become a story teller</a>
						</div>
					</li>

				</ul>

				<?php if (isset($_SESSION['email'])) {
					echo "
						 <ul class='nav navbar-nav navbar-right'>
						 <li><a class='hover-btn-new log orange' href='logout.php'><span>Logout</span></a></li>
						</ul>";
				} else {
					echo "
					<ul class='nav navbar-nav navbar-right'>
                        <li><a class='hover-btn-new log orange' href='#' data-toggle='modal' data-target='#login'><span>Login</span></a></li>
                    </ul>";
				} ?>
			</div>
		</div>
	</nav>
</header>
<!-- End header -->