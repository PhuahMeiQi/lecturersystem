<?php
	session_start();
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		$user = $_SESSION['user'];
		
		if($user=="admin")
		{
			header('location:dhome.php');
		}
	}
	else
	{
		header('location:index.php');
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LECTURER REGISTRATION SYSTEM</title>
	<link rel="icon" href="images/icon.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 bg-white" role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="text-black mb-0"><img src='images/icon.jpg' style="max-width:100px; max-height:100px;" /> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">

                <li class="ml-xl-3 login"><a href="editaccount.php"><span class="border-left pl-xl-4"></span>Edit Account</a></li>
                <li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>

              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>

  

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">
            
            
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1 class="" data-aos="fade-up">Result</h1>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>  
	
<style>
.smallimg{
	max-width:300px; 
	max-height:425px;
}

.pen-5{
		padding:50px;
}

@media (max-width: 460px) {
	.smallimg{
		max-width:200px; 
		max-height:283px;
	}

	.pen-5{
		padding:10px;
	}
}
</style>

    <div class="site-section bg-light">
      <div class="container">
        
        <div class="overlap-category mb-s">
			
			<br>
			<br>
			<center><h1><b>Profile</b></h1></center>
			<br>
			<br>
			
			<div class="pen-5 bg-white">
			
			
			<?php
				
				include('dbconnect.php');
				$sql = "SELECT * FROM user WHERE user_id = ".$_SESSION['id'];
				$query = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
				
				if($row){
					
					echo "
					<div class='row'>
						<div class='col-md-4'>
							<img src='images/".$row['image']."' class='smallimg' />
						</div>
						<div class='col-xl-8'>
						
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Name</b>
								</div>
								<div class='col-xl-8'>
									".$row['name']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Gender</b>
								</div>
								<div class='col-xl-8'>
									".$row['gender']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Date Of Birth</b>
								</div>
								<div class='col-xl-8'>
									".$row['date_of_birth']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Marital</b>
								</div>
								<div class='col-xl-8'>
									".$row['marital']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Race</b>
								</div>
								<div class='col-xl-8'>
									".$row['race']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>CNIC No</b>
								</div>
								<div class='col-xl-8'>
									".$row['ic']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Nationality</b>
								</div>
								<div class='col-xl-8'>
									".$row['nationality']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Domicile</b>
								</div>
								<div class='col-xl-8'>
									".$row['domicile']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Highest Qualification</b>
								</div>
								<div class='col-xl-8'>
									".$row['qualification']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Passing Year</b>
								</div>
								<div class='col-xl-8'>
									".$row['passing_year']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>PEC Reg. No.</b>
								</div>
								<div class='col-xl-8'>
									".$row['pec']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>NTS-GAT ( Subject )</b>
								</div>
								<div class='col-xl-8'>
									".$row['subject']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Present/ Postal Address</b>
								</div>
								<div class='col-xl-8'>
									".$row['postal_address']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Permanent Address</b>
								</div>
								<div class='col-xl-8'>
									".$row['permanent_address']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Email</b>
								</div>
								<div class='col-xl-8'>
									".base64_decode($row['email'])."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Mobile No.</b>
								</div>
								<div class='col-xl-8'>
									".$row['mobile']."
								</div>
							  </div>
							  
							  <div class='row no-gutters'>
								<div class='col-md-4'>
									<b>Phone No.( Residence )</b>
								</div>
								<div class='col-xl-8'>
									".$row['phone']."
								</div>
							  </div>
						  
						</div>
					</div>
					
					
						<br><br>
					
							<div class='row'>
								<table class='table'>
								<thead>
								<tr class='table-active'>
									<th><center>Academic<center></th>
								</tr>
								</thead>
								<tbody>";
						
						
						$sql1 = "SELECT * FROM academic WHERE user_id = ".$_SESSION['id']." ORDER BY year_award DESC";
						$query1 = mysqli_query($con,$sql1);

						while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC)){

							echo "
								<tr>
									<td>
									
									<div class='row'>
										<div class='col-md-4'>
											<img src='images/".$row1['image']."' class='smallimg' />
										</div>
										<div class='col-xl-8'>
										
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Degree/ Certificate held</b>
												</div>
												<div class='col-xl-8'>
													".$row1['certificate']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>From Session</b>
												</div>
												<div class='col-xl-8'>
													".$row1['f_session']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>To Session</b>
												</div>
												<div class='col-xl-8'>
													".$row1['t_session']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Year of Award</b>
												</div>
												<div class='col-xl-8'>
													".$row1['year_award']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Field/ Subject</b>
												</div>
												<div class='col-xl-8'>
													".$row1['subject']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>University/ Institute/ Board</b>
												</div>
												<div class='col-xl-8'>
													".$row1['university']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Institution Country</b>
												</div>
												<div class='col-xl-8'>
													".$row1['country']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Marks Obtained</b>
												</div>
												<div class='col-xl-8'>
													".$row1['marks']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Total Marks</b>
												</div>
												<div class='col-xl-8'>
													".$row1['t_marks']."
												</div>
											  </div>
											  <div class='row no-gutters'>
												<div class='col-md-4'>
													<b>Grade/Division/ CGPA</b>
												</div>
												<div class='col-xl-8'>
													".$row1['cgpa']."
												</div>
											  </div>
											  
											  
										</div>
									</div>
									
									</td>
								</tr>";
						}

							echo "</tbody>
								  </table>
								</div>
								  
							<br><br>
								  
							<div class='row'>
								<table class='table'>
								<thead>
								<tr class='table-active'>
									<th><center>Teaching Experience<center></th>
								</tr>
								</thead>
								<tbody>";
								  
								  
						$sql2 = "SELECT * FROM experience WHERE user_id='".$_SESSION['id']."' AND type='teaching' ORDER BY d_to DESC";
						$query2 = mysqli_query($con,$sql2);
						
						$y1 = $m1 = $d1 = $o_y = $o_m = $o_d = 0; 
						
						while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)){

								$date1 = new DateTime($row2['d_from']);
								$date2 = new DateTime($row2['d_to']);
								 
								$d_date = date_diff($date1,$date2);
								
								$diff = $d_date->format("%y Years, %m Months, %d Days");
								$y1 = $y1 + $d_date->format("%y");
								$m1 = $m1 + $d_date->format("%m");
								$d1 = $d1 + $d_date->format("%d");
						
						echo "	<tr>
									<td>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Name of Organization</b>
										</div>
										<div class='col-md-auto'>
											".$row2['organization']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Designation</b>
										</div>
										<div class='col-md-auto'>
											".$row2['designation']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Scale Job</b>
										</div>
										<div class='col-md-auto'>
											".$row2['scale']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Job Profile</b>
										</div>
										<div class='col-md-auto'>
											".$row2['job_profile']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>From Date</b>
										</div>
										<div class='col-md-auto'>
											".$row2['d_from']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>To Date</b>
										</div>
										<div class='col-md-auto'>
											".$row2['d_to']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Period</b>
										</div>
										<div class='col-md-auto'>
											$diff
										</div>
									  </div>
			
									</td>
								</tr>";


						}
						
						$o_d = $d1%30 ;
						$o_m = $m1 + intval($d1/30);
						$o_y = $y1 + intval($o_m/12);
						
						
						echo "	<tr class='table-info'>
									<td>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Total Experience</b>
										</div>
										<div class='col-md-auto'>
											$o_y Years, $o_m Months, $o_d Days
										</div>
									  </div>
									</td>
								</tr>
							  
								</tbody>
								</table>
							</div>
							  
							<br><br>
								  
							<div class='row'>
								<table class='table'>
								<thead>
								<tr class='table-active'>
									<th><center>Industrial Experience<center></th>
								</tr>
								</thead>
								<tbody>";
								  
								  
						$sql2 = "SELECT * FROM experience WHERE user_id='".$_SESSION['id']."' AND type='industrial' ORDER BY d_to DESC";
						$query2 = mysqli_query($con,$sql2);
						
						$y2 = $m2 = $d2 = $o_y = $o_m = $o_d = 0; 
						
						while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)){
								
								$date1 = new DateTime($row2['d_from']);
								$date2 = new DateTime($row2['d_to']);
								
								$d_date = date_diff($date1,$date2);
								
								$diff = $d_date->format("%y Years, %m Months, %d Days");
								$y2 = $y2 + $d_date->format("%y");
								$m2 = $m2 + $d_date->format("%m");
								$d2 = $d2 + $d_date->format("%d");
						
						echo "	<tr>
									<td>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Name of Organization</b>
										</div>
										<div class='col-md-auto'>
											".$row2['organization']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Designation</b>
										</div>
										<div class='col-md-auto'>
											".$row2['designation']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Scale Job</b>
										</div>
										<div class='col-md-auto'>
											".$row2['scale']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Job Profile</b>
										</div>
										<div class='col-md-auto'>
											".$row2['job_profile']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>From Date</b>
										</div>
										<div class='col-md-auto'>
											".$row2['d_from']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>To Date</b>
										</div>
										<div class='col-md-auto'>
											".$row2['d_to']."
										</div>
									  </div>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Period</b>
										</div>
										<div class='col-md-auto'>
											$diff
										</div>
									  </div>
			
									</td>
								</tr>";

						}
						
						$o_d = $d2%30 ;
						$o_m = $m2 + intval($d2/30);
						$o_y = $y2 + intval($o_m/12);
						
						
						echo "	<tr class='table-info'>
									<td>
									  <div class='row no-gutters'>
										<div class='col-md-4'>
											<b>Total Experience</b>
										</div>
										<div class='col-md-auto'>
											$o_y Years, $o_m Months, $o_d Days
										</div>
									  </div>
									</td>
								</tr>
							  
								</tbody>
								</table>
							</div>";
							
						$sql3 = "SELECT * FROM status WHERE user_id = ".$_SESSION['id'];
						$query3 = mysqli_query($con,$sql3);
						while($row3 = mysqli_fetch_array($query3,MYSQLI_ASSOC)){
							
							echo"
							<br><br>
							
							<div class='row'>
								<table class='table'>
								<thead>
								<tr class='table-active'>
									<th><center>Subject<center></th>
								</tr>
								</thead>
								<tbody>";

									if($row3['status1']=='Approved'){
										echo "<tr class='table-success'>";
									}
									else if($row3['status1']=='Rejected'){
										echo "<tr class='table-danger'>";
									}
									else{
										echo "<tr class='table-warning'>";
									}
									
									echo "
										<td>
										
										  <div class='row no-gutters'>
											<div class='col-md-10'>
												<b>".$row3['subject1']."</b>
											</div>
											<div class='col-md-2'>";
											
											if($row3['status1']=='Approved'){
												echo '<font color="#47AA19"><b>Approved</b></font>';
											}
											else if($row3['status1']=='Rejected'){
												echo '<font color="red"><b>Rejected</b></font>';
											}
											else{
												echo '<font color="orange"><b>Waiting</b></font>';
											}
											
											echo "
											</div>
										  </div>
										</td>
									</tr>";

									if($row3['status2']=='Approved'){
										echo "<tr class='table-success'>";
									}
									else if($row3['status2']=='Rejected'){
										echo "<tr class='table-danger'>";
									}
									else{
										echo "<tr class='table-warning'>";
									}
									
									echo "
										<td>
										
										  <div class='row no-gutters'>
											<div class='col-md-10'>
												<b>".$row3['subject2']."</b>
											</div>
											<div class='col-md-2'>";
											
											if($row3['status2']=='Approved'){
												echo '<font color="#47AA19"><b>Approved</b></font>';
											}
											else if($row3['status2']=='Rejected'){
												echo '<font color="red"><b>Rejected</b></font>';
											}
											else{
												echo '<font color="orange"><b>Waiting</b></font>';
											}
											
											echo "
											</div>
										  </div>
										</td>
									</tr>";

									if($row3['status3']=='Approved'){
										echo "<tr class='table-success'>";
									}
									else if($row3['status3']=='Rejected'){
										echo "<tr class='table-danger'>";
									}
									else{
										echo "<tr class='table-warning'>";
									}
									
									echo "
										<td>
										
										  <div class='row no-gutters'>
											<div class='col-md-10'>
												<b>".$row3['subject3']."</b>
											</div>
											<div class='col-md-2'>";
											
											if($row3['status3']=='Approved'){
												echo '<font color="#47AA19"><b>Approved</b></font>';
											}
											else if($row3['status3']=='Rejected'){
												echo '<font color="red"><b>Rejected</b></font>';
											}
											else{
												echo '<font color="orange"><b>Waiting</b></font>';
											}
											
											echo "
											</div>
										  </div>
										</td>
									</tr>";

									if($row3['status4']=='Approved'){
										echo "<tr class='table-success'>";
									}
									else if($row3['status4']=='Rejected'){
										echo "<tr class='table-danger'>";
									}
									else{
										echo "<tr class='table-warning'>";
									}
									
									echo "
										<td>
										
										  <div class='row no-gutters'>
											<div class='col-md-10'>
												<b>".$row3['subject4']."</b>
											</div>
											<div class='col-md-2'>";
											
											if($row3['status4']=='Approved'){
												echo '<font color="#47AA19"><b>Approved</b></font>';
											}
											else if($row3['status4']=='Rejected'){
												echo '<font color="red"><b>Rejected</b></font>';
											}
											else{
												echo '<font color="orange"><b>Waiting</b></font>';
											}
											
											echo "
											</div>
										  </div>
										</td>
									</tr>
									
								</tbody>
								</table>
							</div>";
						}
									
				}
				else{
					echo "<center>No record</center>";
				}
				
				mysqli_close($con);
				
			?>
			</div>
			
			<br><br>
			<center><button onclick="window.location.href='uhome.php';" class="btn btn-primary py-2 px-4 text-white">Edit</button></center>
			<br><br><br>

		</div>
	  </div>
    </div>
	
    
    <?php include ('footer.php'); ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/rangeslider.min.js"></script>

  <script src="js/main.js"></script>
   
  </body>
</html>