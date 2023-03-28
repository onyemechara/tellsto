	
<?php

include_once ("conn.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to landing page

if (isset($_SESSION['email'])) {
    
 $email = $_SESSION['email']; 
}

if(isset($_POST['close'])){
	unset($_SESSION['billingid']);
	redirect(web_root.'index.php'); 
}

if (isset($_POST['billingid'])){
	$_SESSION['billingid'] = $_POST['billingid'];
}

	 $query="SELECT * FROM booking WHERE id = ".$_SESSION['billingid'].""; 
 
	 $result = mysqli_query($con,$query);
	 
	 $row = mysqli_fetch_array($result);
	 
	  $id="$row[id]";
	  $rm_name="$row[rm_name]";
	  $category="$row[category]";
	  $noo="$row[noo]";
	  $nor="$row[nor]";
	  $mobile="$row[mobile]";
	  $checkin="$row[checkin]";
	  $checkout="$row[checkout]";
	  $remark="$row[remark]";
	  $amount="$row[amount]";
	  $paymethod="$row[paymethod]";
	  $dob="$row[dob]";

	  $date1=date_create("$checkin");
	  $date2=date_create("$checkout");
	  $diff=date_diff($date1,$date2);

$tamount = $diff->format("%R%a") * $amount * $nor;


	$ques=mysqli_query($con,"SELECT * FROM users WHERE email= '$email'");
	$rowx = mysqli_fetch_array($ques);
	$address = $rowx['address'];
	$name = $rowx['name'];
?>
 
<div class="modal-dialog" style="width:90%">
  <div class="modal-content">
	<div class="modal-header">
		<button class="close" id="btnclose" data-dismiss="modal" type= "button">×</button>
		 <span id="printout">
 
		<table>
			<th>
				<td align="center"> 
				<img src="assets/images/home/logo.png" width='100'  alt="Image">
        		</td> 
				<td align="center"> 
				<h2 style='text-transform: uppercase'><?php echo $sitename?></h2>
        		</td> 
			</th>
		</table>
		
		 
 	 <div class="modal-body"> 
 	 <h4><?php echo $remark?></h4><br/>
		<h5>Dear Sir/Ma'am,</h5>
		<h5>As you have booked <?php echo $paymethod; ?>, please have the exact amount of cash to pay to our staff and bring this billing details.</h5>
		 <hr/>
		 <h4><strong>Booking Information</strong></h4>
		 <table id="table" class="table table-bordered">
			<thead>
				<tr>
					<th>BOOKING No</th>
					<th>ROOM</th>
					<th>CATEGORY</th>
					<th>No OF ROOM(S)</th>
					<th>CHEKIN</th>
					<th>CHEKOUT</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td> <?php echo $id; ?></td>
					<td> <?php echo $rm_name ?></td>
					<td> <?php echo $category ?></td>
					<th> <?php echo $nor ?> Room(s)</th> 
					<th> <?php echo $checkin ?> </th>  
					<th> <?php echo $checkout ?> </th> 
				</tr>



				</tbody>

			<div class="col-md-12">
			<p><strong>Name :</strong> <?php echo $name ;?></p>
		 	<p><strong>Address :</strong> <?php echo $address ?></p>
		 	<p><strong>Contact Number :</strong> <?php echo $mobile;?></p> 
		 	</div>
	</div>

			</tbody>
		
       </table>
	   <br>
 		<div class="row">
		  	<div class="col-md-12 pull-left">
		  	 <div>Booking Date : <?php echo $dob; ?></div>
		  	 <div>Payment Method : <?php echo $paymethod; ?></div>

		  	</div>
		  	<div class="col-md-12 pull-right">
		  		<p align="right">Total Price : ₦ <?php echo $tamount;?></p>
		  	</div>
		  </div>
		 
		 
  </div> 

  <hr/> 
  <div class="row">
  <div class="col-md-12 pull-left">
		 		 <p>Please print this as a proof of booking</p><br/>
		  	  <p>We hope you enjoy your stay. Have a nice day!</p>
		  	  <p>Sincerely.</p>
		  	  </div>
		 
	</div>
	</div> 

</span>

		<div class="modal-footer">
		 <div id="divButtons" name="divButtons">
		<button  onclick="tablePrint();" class="btn btn_fixnmix pull-right "><span class="glyphicon glyphicon-print" ></span> Print</button>     
        <button class="btn btn-pup" id="btnclose" data-dismiss="modal" type="button">Close</button> 
		 </div> 
		</div>
	<!-- </form> -->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
 </div>
  <script>
function tablePrint(){ 
 // document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
     // document.all.divButtons.style.visibility = 'Show';  
   
    return false; 

    } 
 
</script>