<?php
	session_start();
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		$user = $_SESSION['user'];
		
		if($user=="users")
		{
			header('location:uhome.php');
		}
	}
	else
	{
		header('location:index.php');
	}
	
	if(isset($_POST['submit'])){
		$_GET['type']="Search";
	}
	
	if(!isset($_GET['type'])){
		$_GET['type']="";
	}
	if(!isset($_POST['search'])){
		$_POST['search']="";
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
                <h1 class="" data-aos="fade-up">List</h1>
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
			<center><h1><b><?php echo $_GET['type']; ?> List</b></h1></center>
			
			<div class="pen-5">
			
				<div class="row justify-content-end">
				
					<form action="list.php" method="post" class="bg-white">
						<div class="input-group">
						  <input type="text" class="form-control" name="search" placeholder="Search">
						  <div class="input-group-append">
							<input type="submit" name="submit" value="Search" class="btn btn-secondary">
						  </div>
						</div>
					</form>
					
				</div>
				
				<br>
			
				<div class='row'>
					<table class='table table-hover'>
						<thead>
							<tr class='table-active'>
								<th><center>Profile<center></th>
							</tr>
						</thead>
						<tbody>
						<?php
						
						include('dbconnect.php');
						
						if($_GET['type']== 'Approved'){
							$sql = "SELECT * FROM status WHERE (status1 OR status2 OR status3 OR status4='Approved') AND status1 OR status2 OR status3 OR status4 != '' ";
						}
						else if($_GET['type']== 'Rejected'){
							$sql = "SELECT * FROM status WHERE status1='Rejected' AND status2='Rejected' AND status3='Rejected' AND status4='Rejected'";
						}
						else if($_GET['type']== 'Waiting'){
							$sql = "SELECT * FROM status WHERE status1='' OR status2='' OR status3='' OR status4=''";
						}
						else{
							$sql = "SELECT * FROM status s, user u WHERE s.user_id = u.user_id AND (u.name LIKE '%".$_POST['search']."%' OR u.ic LIKE '%".$_POST['search']."%')";
						}
						
						$query = mysqli_query($con,$sql);
						$total_row = mysqli_num_rows($query);
						
						if($_POST['search']==''){
							$total_row=0;
						}
						
						if($total_row!=0){
												
							$i=0;
							
							$max_page = intval($total_row / 10);
							$remainder = $total_row % 10;
											
							if($remainder!=0){
								$max_page += 1;
							}
							
							while($row3 = mysqli_fetch_array($query,MYSQLI_ASSOC)){
								
								$i++;
								
								$sql1 = "SELECT * FROM user WHERE user_id = ".$row3['user_id'];
								$query1 = mysqli_query($con,$sql1);
								while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC)){
									
									?>
									
									<tr onclick="window.location='status.php?id=<?php echo $row1['user_id']; ?>'" id="<?php echo "row_".$i; ?>">
									
									<?php
									
									echo "
										<td>
										
											<div class='row'>
												<div class='col-md-4'>
													<img src='images/".$row1['image']."' class='smallimg' />
												</div>
												<div class='col-lg-8'>
													<div class='row'>
													<div class='col-lg-12'>
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Name</b>
														</div>
														<div class='col-xl-8'>
															".$row1['name']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Gender</b>
														</div>
														<div class='col-xl-8'>
															".$row1['gender']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Date Of Birth</b>
														</div>
														<div class='col-xl-8'>
															".$row1['date_of_birth']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Marital</b>
														</div>
														<div class='col-xl-8'>
															".$row1['marital']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Race</b>
														</div>
														<div class='col-xl-8'>
															".$row1['race']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Nationality</b>
														</div>
														<div class='col-xl-8'>
															".$row1['nationality']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>Highest Qualification</b>
														</div>
														<div class='col-xl-8'>
															".$row1['qualification']."
														</div>
													  </div>
													  
													  <div class='row no-gutters'>
														<div class='col-md-4'>
															<b>NTS-GAT ( Subject )</b>
														</div>
														<div class='col-xl-8'>
															".$row1['subject']."
														</div>
													  </div>
													</div>
													
													<div class='col-lg-12'>
														
														<table class='table'>
														<thead>
														<tr>
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
													
													</div>
													</div>
												  
												</div>
											</div>

										</td>
									</tr>";
								}	
							}
						}
						else{
							echo "
							<tr>
								<td width='100000px' align='center'>No record</td>
							</tr>";
						}
						
						mysqli_close($con);
						
						?>
						
						
						</tbody>
					</table>
				</div>
				
				<br><br>
				<?php
				if($total_row!=0){
				?>
				<div class="row justify-content-center">
				
					<button id="btn1" onclick="prev()" type="button" class="btn btn-outline-secondary">Prev</button>
					<button id="btn2" onclick="prev2()" type="button" class="btn btn-outline-secondary"></button>
					<button id="btn3" onclick="prev()" type="button" class="btn btn-outline-secondary"></button>
					<button id="btn4" type="button" class="btn btn-secondary"></button>
					<button id="btn5" onclick="next()" type="button" class="btn btn-outline-secondary"></button>
					<button id="btn6" onclick="next2()" type="button" class="btn btn-outline-secondary"></button>
					<button id="btn7" onclick="next()" type="button" class="btn btn-outline-secondary">Next</button>
				</div>
				<?php
				} 
				?>
				
			</div>

			<br><br>
			<center>
				<button onclick=" window.location.href='dhome.php';" class="btn btn-primary py-2 px-4 text-white">Back</button>
			</center>
			<br><br><br>

		</div>
	  </div>
    </div>
	
	<script>
	var x = 1;
	var y = 0;
	
	reload();
	show(0);
	
	function prev(){
		topFunction();
		x = x-1;
		reload();
		reset();
		y = y-10;
		show(y);
	}
	
	function next(){
		topFunction();
		x = x+1;
		reload();
		reset();
		y = y+10;
		show(y);
	}
	
	function prev2(){
		topFunction();
		x = x-2;
		reload();
		reset();
		y = y-20;
		show(y);
	}
	
	function next2(){
		topFunction();
		x = x+2;
		reload();
		reset();
		y = y+20;
		show(y);
	}
	
	function reload(){
		
		if(x<3){
			document.getElementById('btn2').style.display = 'none';
		}else{
			document.getElementById('btn2').style.display = 'block';
		}
		
		
		if(x<2){
			document.getElementById('btn1').style.display = 'none';
			document.getElementById('btn3').style.display = 'none';
		}else{
			document.getElementById('btn1').style.display = 'block';
			document.getElementById('btn3').style.display = 'block';
		}
		
		if(x><?php echo $max_page; ?>-1){
			document.getElementById('btn5').style.display = 'none';
			document.getElementById('btn7').style.display = 'none';
		}else{
			document.getElementById('btn5').style.display = 'block';
			document.getElementById('btn7').style.display = 'block';
		}
		
		if(x><?php echo $max_page; ?>-2){
			document.getElementById('btn6').style.display = 'none';
		}else{
			document.getElementById('btn6').style.display = 'block';
		}
		
		
		document.getElementById("btn2").innerHTML = x-2;
		document.getElementById("btn3").innerHTML = x-1;
		document.getElementById("btn4").innerHTML = x;
		document.getElementById("btn5").innerHTML = x+1;
		document.getElementById("btn6").innerHTML = x+2;
	}
	
	function reset(){
		for (var i = 1; i < <?php echo $total_row+1; ?>; i++) {
			document.getElementById('row_' + i).style.display = 'none';
		}
	}
	
	function show(a){
		for (var i = 1; i < 11; i++) {
			document.getElementById('row_' + (a+i)).style.display = 'table-row';
		}
	}
	
	function topFunction() {
	  document.body.scrollTop = 300;
	  document.documentElement.scrollTop = 300;
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