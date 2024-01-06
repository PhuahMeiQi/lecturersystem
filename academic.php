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
		
		
		$product_image_tmp = $_FILES['image']['tmp_name'];
		
		include('dbconnect.php');
		$sql = "INSERT INTO academic (user_id, certificate, f_session, t_session, year_award, subject, university, country, marks, t_marks, cgpa, image)
								VALUES ('".$_SESSION['id']."',
										'".$_POST['certificate']."',
										'".$_POST['f_session']."',
										'".$_POST['t_session']."',
										'".$_POST['year_award']."',
										'".$_POST['subject']."',
										'".$_POST['university']."',
										'".$_POST['country']."',
										'".$_POST['marks']."',
										'".$_POST['t_marks']."',
										'".$_POST['cgpa']."',
										'')";
		$query = mysqli_query($con,$sql);
					
		if($query){
			$last_id = mysqli_insert_id($con);
			$product_image = 'user'.$_SESSION['id'].'_a'.$last_id ;
			
			$sql2 = "UPDATE academic SET image='".$product_image."' WHERE acd_id='".$last_id."' ";
			$query2 = mysqli_query($con,$sql2);
			
			if($query2){
				mysqli_close($con);
				move_uploaded_file($product_image_tmp,"images/$product_image");
			}
		}

	}
	
	if(isset($_POST['delete_acd'])){
		
		include('dbconnect.php');
		
		$sql = "DELETE FROM academic WHERE acd_id='".$_POST['acd_id']."'";
		$query = mysqli_query($con,$sql);
			
		if($query){
			unlink("images/".$_POST['image']);
			mysqli_close($con);
			echo "<script>window.open('academic.php','_self')</script>";
			
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
			<center><h1><b>Academic Background</b></h1></center>
			<br>
			<br>
			
			<div class="pen-5">
				<div class='row'>
					<table class='table table-hover'>
						<thead>
							<tr class='table-active'>
								<th colspan='2'><center>Academic<center></th>
							</tr>
						</thead>
						<tbody>
						<?php
						
						include('dbconnect.php');
						$sql1 = "SELECT * FROM academic WHERE user_id = ".$_SESSION['id']." ORDER BY year_award DESC";
						$query1 = mysqli_query($con,$sql1);
						$total_row = mysqli_num_rows($query1);

					if($total_row!=0){
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
									
									</td>";
									?>	
									<td>
										<form action="academic.php" method="post">
											<input type="hidden" name="acd_id" value="<?php echo $row1['acd_id']; ?>">
											<input type="hidden" name="image" value="<?php echo $row1['image']; ?>">
											<button type='submit' name='delete_acd' class='close' onclick="return confirm('Are you sure you want to delete?')" aria-label='Close'>
											  <span aria-hidden="true">&times;</span>
											</button>
										</form>
									</td>
								</tr> 
					<?php
					
						}
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
							  <td class="table-success" colspan="2" onclick="add();" align="center">Add record</td>
							</tr>
							
							<tr  id="add" style="display:none;">
							  <td colspan="2">
									
								<form action="academic.php" method="post" enctype="multipart/form-data" class="bg-white">
											
								  <div class="row form-group">
									  <label><h3>Academic Background</h3></label> 
								  </div>
									<div class="col-md-12">
										<label class="text-black">Certificate Picture</label> 
									</div>
								  <div class="row form-group">
									<div class="col-md-12">
										<img id="output_image" src="images/image2.jpg" class="smallimg" /><br>
										<span class="btn btn-success btn-file text-white inputbtn">
										Upload <input type="file" name="image" accept="image/*" onchange="preview_image(event)"  class="form-control" required>
										</span>
									</div>
								   </div>
								  
								  <br>

								  <div class="row form-group">
									<div class="col-md-8">
									  <label class="text-black">Degree/ Certificate held</label> 
									  <input type="text" name="certificate" class="form-control" required>
									</div>
								  </div>
								  
								  <div class="row form-group">
									<div class="col-md-4">
									  <label class="text-black">From Session</label> 
									  <input type="text" name="f_session" class="form-control" required>
									</div>
									<div class="col-md-4">
									  <label class="text-black">To Session</label> 
									  <input type="text" name="t_session" class="form-control" required>
									</div>
									<div class="col-md-4">
									  <label class="text-black">Year of Award</label> 
									  <input type="number" name="year_award" class="form-control" required>
									</div>
								  </div>
								  
								  <div class="row form-group">
									<div class="col-md-8">
									  <label class="text-black">Field/ Subject</label> 
									  <input type="text" name="subject" class="form-control" required>
									</div>
								  </div>
								  
								  <div class="row form-group">
									<div class="col-md-8">
									  <label class="text-black">University/ Institute/ Board</label> 
									  <input type="text" name="university" class="form-control" required>
									</div>
									<div class="col-md-4">
									  <label class="text-black">Institution Country</label> 
									  <input type="text" name="country" class="form-control" required>
									</div>
								  </div>
								  
								  <div class="row form-group">
									<div class="col-md-4">
									  <label class="text-black">Marks Obtained</label> 
									  <input type="number" step="0.01" name="marks" class="form-control" required>
									</div>
									<div class="col-md-4">
									  <label class="text-black">Total Marks</label> 
									  <input type="number" step="0.01" name="t_marks" class="form-control" required>
									</div>
									<div class="col-md-4">
									  <label class="text-black">Grade/ Division/ CGPA</label> 
									  <input type="number" step="0.01" name="cgpa" class="form-control" required>
									</div>
								  </div>

							
									<br><br>
									
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
				
				

			
			

<style>
.smallimg{
	max-width:300px; 
	max-height:425px;
}
.inputbtn{
	width:300px;
}

.pen-5{
		padding:50px;
}

@media (max-width: 460px) {
	.smallimg{
		max-width:200px; 
		max-height:283px;
	}
	.inputbtn{
		width:200px;
	}
	.pen-5{
		padding:10px;
	}
}
</style>

<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	  margin: 0; 
	}
</style>

<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<style>
body
{
 width:100%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
 background-color:#0B3861;
}
#wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;
 width:995px;
}
#output_image
{
 max-width:300px;
}

.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>

			
			<br><br>
			<center>
				<button onclick=" window.location.href='uhome.php';" class="btn btn-primary py-2 px-4 text-white">Back</button>
				<button onclick="next();" class="btn btn-primary py-2 px-4 text-white">Next</button>
			</center>
			<br><br><br>

		</div>
	  </div>
    </div>
	
	<script>
	function add(){
		if(document.getElementById('add').style.display != 'none'){
			  document.getElementById('add').style.display = 'none';
		  }
		  else{
			   document.getElementById('add').style.display = 'table-row';
		  }
	}
	
	function next(){
		if( <?php echo $total_row; ?>>0){
			  window.location.href="experience.php";
		  }
		  else{
			  alert('Please insert your Academic Background!');
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