<?php include'inc/head.php'; ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Users</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Story Seekers</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">List of Story Seekers</h4>
						</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                                                       
									<th class="table-plus datatable-nosort">Username</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Reg. Date</th>
									<th class="datatable-nosort">Status</th>
								</tr>
							</thead>
							<tbody>
                                                      <?php $query="SELECT * FROM  users where level=2 ORDER BY id DESC"; 
$result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$id="$row[Id]";
	$username="$row[username]";
	$name="$row[name]";
	$email="$row[email]";
	$mobile="$row[mobile]";
	$password="$row[password]";
	$active="$row[active]";
	$doj="$row[doj]";
	
	if($active==1)
	{
	$status="Active";
	}
	else if($active==0)
	{
	$status="Inactive";
	}
	else
	{
	$status="Unknown";
}	
  print "<tr>
				 
				  <td class='table-plus'>$username</td>
				  <td>$name</td>
				  <td>$email</td>
				  <td>$mobile</td>
				 <td>$doj</td>
				  <td>$status</td>
				  </tr>"; }?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			
			</div>
			<?php include'inc/footer.php';?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>