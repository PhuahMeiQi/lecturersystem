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
		
		$product_image = 'user'.$_SESSION['id'].'_p';
		$product_image_tmp = $_FILES['image']['tmp_name'];
		
		include('dbconnect.php');
		$sql = "UPDATE user SET 
				
				name='".$_POST['name']."',
				gender='".$_POST['gender']."',
				date_of_birth='".$_POST['date_of_birth']."',
				ic='".$_POST['ic']."',
				marital='".$_POST['marital']."',
				race='".$_POST['race']."',
				nationality='".$_POST['nationality']."',
				domicile='".$_POST['domicile']."',
				qualification='".$_POST['qualification']."',
				passing_year='".$_POST['passing_year']."',
				pec='".$_POST['pec']."',
				subject='".$_POST['subject']."',
				postal_address='".$_POST['postal_address']."',
				permanent_address='".$_POST['permanent_address']."',
				mobile='".$_POST['mobile_no']."',
				phone='".$_POST['phone_no']."',
				image='".$product_image."'
				
				WHERE user_id='".$_SESSION['id']."'";
		$query = mysqli_query($con,$sql);
		
		if($query){
			mysqli_close($con);
			move_uploaded_file($product_image_tmp,"images/$product_image");
			echo "<script>window.open('academic.php','_self')</script>";
		}
		
	}
	
	
	include('dbconnect.php');
	$sql2 = "SELECT * FROM user WHERE user_id = ".$_SESSION['id'];
	$query2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
	
	mysqli_close($con);
	
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
			<center><h1><b>Personal Information</b></h1></center>
			<br>
			<br>
		
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

			<form action="uhome.php" method="post" enctype="multipart/form-data" class="pen-5 bg-white">

			 <div class="row form-group">
                <div class="col-md-12">
					<label class="text-black">Profile Picture</label> 
				</div>
				<div class="col-md-12">
					<img id="output_image" 
					
						<?php if($row2['image'] == ''){ 
								echo"src='images/image.jpg'"; 
							}else{
								echo"src='images/".$row2['image']."'" ; 
							}
							
						?>  
						
					style="max-width:225px; max-height:300px;" /><br>
					
					<span class="btn btn-success btn-file text-white" style="width:225px">
					Upload <input type="file" name="image" accept="image/*" onchange="preview_image(event)"  class="form-control" <?php if($row2['image'] == ''){ echo"required"; } ?> >
					</span>
				</div>
              </div>
			  
			  <br>
			 
              <div class="row form-group">
                <div class="col-md-8">
                  <label class="text-black">Name</label> 
                  <input type="text" name="name" value="<?php echo $row2['name']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
			  
                <div class="col-md-6">
                  <label class="text-black">Gender</label> 
				  <select class="form-control" name='gender' style='width: 200px;' required>
					<option value=''>Select Gender</option>
					<option value='Male' <?php if($row2['gender'] == 'Male'){ echo"selected"; } ?>>Male</option>
					<option value='Female' <?php if($row2['gender'] == 'Female'){ echo"selected"; } ?>>Female</option>
				  </select>
                </div>
				
				<div class="col-md-6">
                  <label class="text-black">Date Of Birth</label> 
                  <input type="date" name="date_of_birth" value="<?php echo $row2['date_of_birth']; ?>" style="width: 200px; " class="form-control">
                </div>
				
              </div>
		

			  <div class="row form-group">
			  
                <div class="col-md-6">
                  <label class="text-black">Marital Status</label> 
				   <select class="form-control" name='marital' style='width: 200px;' required>
					<option value=''>Select Marital</option>
					<option value='Single' <?php if($row2['marital'] == 'Single'){ echo"selected"; } ?>>Single</option>
					<option value='Married' <?php if($row2['marital'] == 'Married'){ echo"selected"; } ?>>Married</option>
				  </select>
                </div>
				<div class="col-md-6">
                  <label class="text-black">Race</label> 
                  <input type="text" name="race" value="<?php echo $row2['race']; ?>" class="form-control" required>
                </div>
				
              </div>
			  
			<style>
				input[type=number]::-webkit-inner-spin-button, 
				input[type=number]::-webkit-outer-spin-button { 
				  -webkit-appearance: none; 
				  margin: 0; 
				}
			</style>
			
			  <div class="row form-group">
                <div class="col-md-8">
                  <label class="text-black">CNIC No</label> 
                  <input type="number" name="ic" value="<?php echo $row2['ic']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
			     <div class="col-md-6">
                  <label class="text-black">Nationality</label> 
                  <input type="text" name="nationality" value="<?php echo $row2['nationality']; ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black">Domicile</label> 
                  <input type="text" name="domicile" value="<?php echo $row2['domicile']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-8">
                  <label class="text-black">Highest Qualification</label> 
                  <input type="text" name="qualification" value="<?php echo $row2['qualification']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black">Passing Year</label> 
                  <input type="number" name="passing_year" value="<?php echo $row2['passing_year']; ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black">PEC Reg. No.</label> 
                  <input type="text" name="pec" value="<?php echo $row2['pec']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-8">
                  <label class="text-black">NTS-GAT ( Subject )</label> 
                  <input type="text" name="subject" value="<?php echo $row2['subject']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black">Present/ Postal Address</label> 
                  <input type="text" name="postal_address" value="<?php echo $row2['postal_address']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black">Permanent Address</label> 
                  <input type="text" name="permanent_address" value="<?php echo $row2['permanent_address']; ?>" class="form-control" required>
                </div>
              </div>
			  
			  <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black">Mobile No.</label> 
                  <input type="number" name="mobile_no" value="<?php echo $row2['mobile']; ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black">Phone No.( Residence )</label> 
                  <input type="number" name="phone_no" value="<?php echo $row2['phone']; ?>" class="form-control">
                </div>
              </div>

				<br>
              <div class="row form-group">
                <div class="col-md-12">
                  <center><input type="submit" name="submit" value="Next" class="btn btn-primary py-2 px-4 text-white"></center>
                </div>
              </div>

  
            </form>
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