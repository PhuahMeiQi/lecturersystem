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
				$sql1 = "SELECT * FROM status WHERE user_id='".$_SESSION['id']."'";
				$query1 = mysqli_query($con,$sql1);
				$total_row = mysqli_num_rows($query1);
				
				if($total_row!=0){
					$sql = "UPDATE status SET 
								subject1='".$_POST['subject1']."',
								status1='',
								subject2='".$_POST['subject2']."',
								status2='',
								subject3='".$_POST['subject3']."',
								status3='',
								subject4='".$_POST['subject4']."',
								status4='',
								date=NOW()
							WHERE user_id='".$_SESSION['id']."'";
							
					$query = mysqli_query($con,$sql);
					
					if($query){
						mysqli_close($con);
						echo "<script>window.open('result.php','_self')</script>";
					}
				}
				else{
					$sql = "INSERT INTO status VALUES  ('".$_SESSION['id']."',
														'".$_POST['subject1']."',
														'',
														'".$_POST['subject2']."',
														'',
														'".$_POST['subject3']."',
														'',
														'".$_POST['subject4']."',
														'',
														NOW())";
					$query = mysqli_query($con,$sql);
					
					if($query){
						mysqli_close($con);
						echo "<script>window.open('result.php','_self')</script>";
					}
				}
	}

	
	include('dbconnect.php');
	$sql2 = "SELECT * FROM status WHERE user_id = ".$_SESSION['id'];
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

    <div class="site-section bg-light">
      <div class="container">
        
        <div class="overlap-category mb-s">
		
			<br>
			<br>
			<center><h1><b>Choose a subject to teach</b></h1></center>
			<br>
			<br>
			
			<form action="subject.php" method="post" class="pen-5 bg-white">
			
			<?php
			
			for($i = 1; $i <= 4; $i++)
			{
				echo '<div class="row form-group">
						<div class="col-md-12">
							<label class="text-black">Subject '.$i.'</label> 
							<select class="form-control" name="subject'.$i.'" required>
							<option value="">Select Subject</option>';

				
				include('dbconnect.php');
				$sql1 = "SELECT * FROM subject ORDER BY sub_id";
				$query1 = mysqli_query($con,$sql1);
				$total_row = mysqli_num_rows($query1);
				
				if($total_row!=0){
					while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC)){
						
						$subject = $row1['sub_id']." - ".$row1['subject'];
						echo "<option value='".$subject."'"; if($row2['subject'.$i] == $subject ){ echo"selected"; } echo"  >".$subject."</option>";
			  
					}
				}
				mysqli_close($con);
				
					echo "</select>
						</div>		
					  </div>";
			}
				
			?>

				<br>
				
              <div class="row form-group">
                <div class="col-md-12">
                  <center>
					<a href="experience.php" class="btn btn-primary py-2 px-4 text-white">Back</a>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary py-2 px-4 text-white">
					</center>
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