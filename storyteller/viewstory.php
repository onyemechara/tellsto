<?php include'inc/head.php'; ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View story</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
			



				<div class="row clearfix"> 
            <?php   $query2="SELECT * FROM blog ORDER BY id DESC limit 4"; 
                        $result2 = mysqli_query($con,$query2);
                        while($row2 = mysqli_fetch_array($result2)){
                        
                            $title="$row2[title]";
                            $id="$row2[id]";
                            $userid="$row2[user_id]";
                            $postdate="$row2[postdate]";
                            $category="$row2[category]";
                            $details="$row2[details]";
                              $country="$row2[country]";
                              $ufile="$row2[ufile]";
        $ufile_source="../uploads/".$ufile;
 echo "
 <div class='col-lg-3 col-md-6 col-sm-12 mb-30'>
 <div class='card card-box'>
     <img src='$ufile_source' alt=''style='max-height:300px' class='card-img-top'>
     <div class='card-body'>
	 
     <div class='info-blog' style='font-size:12px'>
         <span><i class='fa fa-calendar'></i> <a href='#'>$postdate</a> </span>
         <span><i class='fa fa-tag'></i>  <a href='#'>$category</a> </span>
         <span><i class='fa fa-comments'></i> <a href='#'>$country</a></span>
     </div>
     <h2 class='card-title weight-200'><a href='#' title=''>$title</a></h2>
 	 <p class='card-title>$details</p>
    
     <div class='blog-button'>
         <a class='btn btn-primary' href='editstory.php?id=$id'><span>Edit</span></a>
    
	 <a class='btn btn-danger' href='deletestory.php?id=$id'><span>Delete</span></a>
 </div>
 </div>
</div>
                ";}?>
            </div><!-- end row -->
			
			


			</div>
			<?php include'inc/footer.php';?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>