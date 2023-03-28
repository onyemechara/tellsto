<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<body class="host_version"> 

<?php
    $toupdate =  mysqli_real_escape_string($con,$_GET['id']);
    $query2="SELECT * FROM blog WHERE id='$toupdate'"; 
                        $result2 = mysqli_query($con,$query2);
                        $row2 = mysqli_fetch_array($result2);
                        
                            $title="$row2[title]";
                            $id="$row2[id]";
                            $userid="$row2[user_id]";
                            $postdate="$row2[postdate]";
                            $category="$row2[category]";
                            $details="$row2[details]";
                              $ufile="$row2[ufile]";
                            $ufile_source="uploads/".$ufile;

                        ?>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3><?php echo $title?></h3>
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="<?php echo $ufile_source; ?>" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				
				
				<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2><?php echo $title?></h2>
                        <p><?php echo $details?></p>
<div class='fb-comments' data-href='readstory.php?id=$id' data-width=25 data-numposts='5'></div>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	


  <?php    include 'includes/footer.php'?>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>
</html>