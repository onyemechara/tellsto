 <?php include'inc/head.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
                        <div class="row">
<?php $query="SELECT id,name,email,doj,active,username FROM  users where username = '".$_SESSION['adminidusername']."'"; 
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
 $aid="$row[id]";
 $regdate="$row[doj]";
 $name="$row[name]";
 $email="$row[email]";
 $username="$row[username]";
 
 }
 ?> 
<?php $result = mysqli_query($con,"SELECT count(*) FROM  users where level = 2 and active = 1 OR active=0");
$row = mysqli_fetch_row($result);
$totalusers = $row[0];
?>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php print $totalusers ?></div>
								<div class="weight-600 font-14">Total Story Seekers</div>
							</div>
						</div>
					</div>
				</div>
 
			<div class="footer-wrap pd-20 mb-20 card-box">
				<?php echo $sitename ?> 2023
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>
</html>