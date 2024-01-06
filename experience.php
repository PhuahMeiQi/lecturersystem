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
	
	if(isset($_POST['submit'])){
		
		include('dbconnect.php');

		$sql = "INSERT INTO experience (user_id, organization, designation, scale, job_profile, d_from, d_to, type)
								VALUES ('".$_SESSION['id']."','".$_POST['organization']."','".$_POST['designation']."','".$_POST['scale']."','".$_POST['job_profile']."','".$_POST['d_from']."','".$_POST['d_to']."','".$_POST['type']."')";
		$query = mysqli_query($con,$sql);
					
		if($query){
			mysqli_close($con);
		}

	}
	
	if(isset($_POST['delete_exp'])){
		
		include('dbconnect.php');
		
		$sql = "DELETE FROM experience WHERE exp_id='".$_POST['exp_id']."'";
		$query = mysqli_query($con,$sql);
			
		if($query){
			mysqli_close($con);
			echo "<script>window.open('experience.php','_self')</script>";
			
		}
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
                <h1 class="" data-aos="fade-up">Register To Be A Lecturer</h1>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        
        <div class="overlap-category mb-s">
			
			<br>
			<br>
			<center><h1><b>Employment History</b></h1></center>
			<br>
			<br>
			
			<div class="pen-5 bg-white">
				<div class='row'>
					<table class='table table-hover'>
						<thead>
						<tr class='table-active'>
							<th colspan="2"><center>Teaching Experience<center></th>
						</tr>
						</thead>
						<tbody>
						
						<?php
						
							include('dbconnect.php');
							$sql2 = "SELECT * FROM experience WHERE user_id='".$_SESSION['id']."' AND type='teaching' ORDER BY d_to DESC";
							$query2 = mysqli_query($con,$sql2);
							$total_row = mysqli_num_rows($query2);
							
							$y1 = $m1 = $d1 = $o_y = $o_m = $o_d = 0; 
							
							if($total_row!=0){
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
					
											</td>";
								?>	
											<td>
												<form action="experience.php" method="post">
													<input type="hidden" name="exp_id" value="<?php echo $row2['exp_id']; ?>">
													<button type='submit' name='delete_exp' class='close' onclick="return confirm('Are you sure you want to delete?')" aria-label='Close'>
													  <span aria-hidden="true">&times;</span>
													</button>
												</form>
											</td>
										</tr> 
								<?php

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
											<td>
											</td>
										</tr>";
							}
							else{
									echo "
										<tr>
											<td colspan='2' width='100000px' align='center'>No record</td>
										</tr>";
							}
							
							mysqli_close($con);
							
						?>
						
										<tr>
											<td class="table-success" colspan="2" onclick="teaching();" align="center">Add record</td>
										</tr>
										
										<tr id="teaching" style="display:none;">
											<td colspan='2'>
												
												<form action="experience.php" method="post"  class="bg-white">
													<br>
			  
												  <div class="row form-group">
													  <label><h3>Teaching Experience</h3></label> 
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Name of Organization</label> 
													  <input type="text" name="organization" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Designation</label> 
													  <input type="text" name="designation" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Scale</label> 
													  <input type="text" name="scale" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Job Profile</label> 
													  <input type="text" name="job_profile" class="form-control" required>
													</div>
												  </div>
												  

												  <div class="row form-group">
													<div class="col-md-4">
													  <label class="text-black">Date From</label> 
													  <input type="date" name="d_from" max="3000-12-31" min="1000-01-01" style="width: 200px; " class="form-control">
													</div>
													<div class="col-md-4">
													  <label class="text-black">Date To</label> 
													  <input type="date" name="d_to" max="3000-12-31" min="1000-01-01" style="width: 200px; " class="form-control">
													</div>
												  </div>
											
													<br>
													<input type="hidden" name="type" value="Teaching">
													
												  <div class="row form-group">
													<div class="col-md-12">
													  <center><input type="submit" name="submit" value="Add" class="btn btn-success py-2 px-4 text-white"></center>
													</div>
												  </div>

												</form>
											
											</td>
										</tr>	

						</tbody>
					</table>
				</div>
				
				<br><br>
				
				<div class='row'>
					<table class='table table-hover'>
						<thead>
						<tr class='table-active'>
							<th colspan="2"><center>Industrial Experience<center></th>
						</tr>
						</thead>
						<tbody>
						
						<?php
						
							include('dbconnect.php');
							$sql2 = "SELECT * FROM experience WHERE user_id='".$_SESSION['id']."' AND type='industrial' ORDER BY d_to DESC";
							$query2 = mysqli_query($con,$sql2);
							$total_row2 = mysqli_num_rows($query2);
							
							$y1 = $m1 = $d1 = $o_y = $o_m = $o_d = 0; 
							
							if($total_row2!=0){
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
					
											</td>";
								?>	
											<td>
												<form action="experience.php" method="post">
													<input type="hidden" name="exp_id" value="<?php echo $row2['exp_id']; ?>">
													<button type='submit' name='delete_exp' class='close' onclick="return confirm('Are you sure you want to delete?')" aria-label='Close'>
													  <span aria-hidden="true">&times;</span>
													</button>
												</form>
											</td>
										</tr> 
								<?php

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
											<td>
											</td>
										</tr>";
							}
							else{
									echo "
										<tr>
											<td colspan='2' width='100000px' align='center'>No record</td>
										</tr>";
							}
							
							mysqli_close($con);
							
						?>
						
										<tr>
											<td class="table-success" colspan="2" onclick="industrial();" align="center">Add record</td>
										</tr>
										
										<tr id="industrial" style="display:none;">
											<td colspan='2'>
												
												<form action="experience.php" method="post"  class="bg-white">
													<br>
													
												  <div class="row form-group">
													  <label><h3>Industrial Experience</h3></label> 
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Name of Organization</label> 
													  <input type="text" name="organization" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Designation</label> 
													  <input type="text" name="designation" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Scale</label> 
													  <input type="text" name="scale" class="form-control" required>
													</div>
												  </div>
												  
												  <div class="row form-group">
													<div class="col-md-8">
													  <label class="text-black">Job Profile</label> 
													  <input type="text" name="job_profile" class="form-control" required>
													</div>
												  </div>
												  

												  <div class="row form-group">
													<div class="col-md-4">
													  <label class="text-black">Date From</label> 
													  <input type="date" name="d_from" max="3000-12-31" min="1000-01-01" style="width: 200px; " class="form-control">
													</div>
													<div class="col-md-4">
													  <label class="text-black">Date To</label> 
													  <input type="date" name="d_to" max="3000-12-31" min="1000-01-01" style="width: 200px; " class="form-control">
													</div>
												  </div>
											
													<br>
													<input type="hidden" name="type" value="Industrial">
													
												  <div class="row form-group">
													<div class="col-md-12">
													  <center><input type="submit" name="submit" value="Add" class="btn btn-success py-2 px-4 text-white"></center>
													</div>
												  </div>

												</form>
											
											</td>
										</tr>	

						</tbody>
					</table>
				</div>
				
			</div>
			

			
			<br><br>
			
			<center>
				<button onclick=" window.location.href='academic.php';" class="btn btn-primary py-2 px-4 text-white">Back</button>
				<button onclick="next();" class="btn btn-primary py-2 px-4 text-white">Next</button>
			</center>
			<br><br><br>

		</div>
	  </div>
    </div>
	
	
<style>
.pen-5{
		padding:50px;
}

@media (max-width: 460px) {
	.pen-5{
		padding:10px;
	}
}
</style>
	
	<script>
	function teaching(){
		if(document.getElementById('teaching').style.display != 'none'){
			  document.getElementById('teaching').style.display = 'none';
		  }
		  else{
			   document.getElementById('teaching').style.display = 'table-row';
		  }
	}
	function industrial(){
		if(document.getElementById('industrial').style.display != 'none'){
			  document.getElementById('industrial').style.display = 'none';
		  }
		  else{
			   document.getElementById('industrial').style.display = 'table-row';
		  }
	}
	function next(){
		if( <?php echo $total_row + $total_row2; ?>>0){
			  window.location.href="subject.php";
		  }
		  else{
			  alert('Please insert your Employment History!');
		  }
	}
	
	</script>
    
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