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
									<li class="breadcrumb-item active" aria-current="page">Edit story</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
				

				<?php  
				
				$to= mysqli_real_escape_string($con,$_GET["id"]);

				$query2="SELECT * FROM blog WHERE id='$to'"; 
                        $result2 = mysqli_query($con,$query2);
                        $row2 = mysqli_fetch_array($result2);
                        
                            $title="$row2[title]";
                            $id="$row2[id]";
                            $userid="$row2[user_id]";
                            $postdate="$row2[postdate]";
                            $category="$row2[category]";
                            $details="$row2[details]";
                            $ufile="$row2[ufile]";
                            $ufile_source="../uploads/".$ufile;?>


				<!-- Default Basic Forms Start -->
                                   <div class="pd-20 card-box mb-30">
                                       <form action="editstoryaction.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="id" value="<?php echo $to?>">
                                         <div class="form-group">
							<label>Title</label>
							 <input type="text" class="form-control" placeholder="Maximum 20 Words" value='<?php echo $title?>' name="title">
                                                </div>
                                               <div class="form-group">
                                                <label>Category</label>
							 <select type="text" class="form-control" value='<?php echo $category?>' name="cat">
                                            <option value="Food">Food</option>
                                             <option value="Budget">Budget</option>
                                             <option value="History">History</option>
                                             <option value="Adventure">Adventure</option>
                                             <option value="Arts">Arts</option>
                                             <option value="Lodging">Lodging</option>
                                             <option value="Night_Life">Night Life</option>
                                             <option value="Nature">Nature</option>
                                             
                                             </select>  </div>
                                            
                                                <div class="form-group">
							<label>Image</label>
							 <input type="file" class="form-control" placeholder="Select Image" name="ufile">
                                                </div>
                                            <div class="form-group">
                                            <label>Message</label>
                                            <input class="form-control" value='<?php echo $details?>' name="message" placeholder="Write your story here">
                                            </div>
					 <button type="submit" name="save" class="btn btn-lg btn-primary btn-block">Post</button>
                   	
					</form>
					
				</div>
				<!-- horizontal Basic Forms End -->

				


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