<?php include 'includes/header.php';?>
<!DOCTYPE html>
<body class="host_version"> 
<?php include 'includes/modal.php' ?>
	
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
					<div class="dtab">
						<div class="container">
							<div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Top Stories </strong>For Tourists</h2>
										<p class="lead">Beautiful exclusive stories </p>
											<a href="" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
                                	<div class="big-tagline">
										<h2><strong>Top Stories </strong>For Tourists</h2>
										<p class="lead">Beautiful exclusive stories </p>
											<a href="" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('https://images.pexels.com/photos/718742/pexels-photo-718742.jpeg?auto=compress&cs=tinysrgb&w=850');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
                               	<div class="big-tagline">
										<h2><strong>Top Stories </strong>For Tourists</h2>
										<p class="lead">Beautiful exclusive stories </p>
											<a href="" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
  

 

    <div id="testimonials" class="parallax section db parallax-off" style="display:none;background-image:url('images/parallax_04.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p>What our Story seekers say! </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_01.png" alt="" class="img-fluid">
                                <h4>James Fernando </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Book!</h3>
                                <p class="lead"> </p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_02.png" alt="" class="img-fluid">
                                <h4>Orobosa Philips </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead"> </p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="images/testi_03.png" alt="" class="img-fluid ">
                                <h4>Venanda Mercy </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">I am so appreciative that there exists a place that still values readers interests </p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->
                       
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="story" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Stories</h3>
                    <p class="lead">Check out the latest stories</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                <?php $query2 = "SELECT * FROM blog ORDER BY id DESC limit 8";
                $result2 = mysqli_query($con, $query2);
                while ($row2 = mysqli_fetch_array($result2)) {

                    $title = "$row2[title]";
                    $id = "$row2[id]";
                    $userid = "$row2[user_id]";
                    $postdate = "$row2[postdate]";
                    $category = "$row2[category]";
                    $details = "$row2[details]";
                    $country = "$row2[country]";
                    $ufile = "$row2[ufile]";
                    $ufile_source = "uploads/" . $ufile;
                    echo "
 <div class='col-lg-4 col-md-6 col-12'>
 <div class='blog-item'>
     <div class='image-blog'>
         <img src='$ufile_source' alt='' class='img-fluid'>
     </div>
     <div class='meta-info-blog'>
         <span><i class='fa fa-calendar'></i> <a href='#'>$postdate</a> </span>
         <span><i class='fa fa-tag'></i>  <a href='#'>$category</a> </span>
         <span><i class='fa fa-comments'></i> <a href='#'>$country</a></span>
     </div>
     <div class='blog-title'>
         <h2><a href='#' title=''>$title</a></h2>
     </div>
     <div class='blog-desc'>
         <p>$details</p>
     </div>
     <div class='blog-button'>
         <a class='hover-btn-new orange' href='readstory.php?id=$id'><span>Read More</span></a> 
         <div class='fb-share-button' data-href='https://developers.facebook.com/docs/plugins/' data-layout='' data-size=''><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse' class='fb-xfbml-parse-ignore'>Share</a></div>
   
     </div>
   <div class='fb-comments' data-href='readstory.php?id=$id' data-width=25 data-numposts='5'></div>
 </div>
</div>
                ";
                } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

   <?php    include 'includes/footer.php'?>

    

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
    
</body>
</html>