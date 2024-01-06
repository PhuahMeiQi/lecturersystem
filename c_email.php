<?php

session_start();

	$error = "";

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		$user = $_SESSION['user'];
		
		if($user=="admin")
		{
			if(isset($_POST['c_email'])){
				
				$old_email = base64_encode($_POST['old_email']);
				
				if( $old_email == $_SESSION['email']){
					
					$id = base64_encode($_POST['email1']);
			
					include('dbconnect.php');
					$sql = "SELECT * FROM dean where email='$id'";
					$query = mysqli_query($con,$sql);
					$run = mysqli_fetch_array($query,MYSQLI_NUM);
					
					if($run){
						$error = "This email already be used"; 
					}
					else{
						$sql2 = "SELECT * FROM user where email='$id'";
						$query2 = mysqli_query($con,$sql2);
						$run2 = mysqli_fetch_array($query2,MYSQLI_NUM);
						if($run2){
							$error = "This email already be used"; 
						}
						else{
							
							if($_POST['email1']==$_POST['email2']){
								
								$sql3 = "UPDATE dean SET email='".$id."' WHERE email='".$_SESSION['email']."'";
								
								$query3 = mysqli_query($con,$sql3);
								
								if($query3){
									mysqli_close($con);
									echo "<script>window.open('logout.php','_self')</script>";
								}
							}
							else{
								$error = "Your email are no same"; 
							}
						}
					}
					mysqli_close($con);
				}
				else{
					$error = "Wrong email"; 
				}
			}
		}
		else{
			if(isset($_POST['c_email'])){

				include('dbconnect.php');
				$sql5 = "SELECT * FROM user where user_id=".$_SESSION['id'];
				$query5 = mysqli_query($con,$sql5);
				$run5 = mysqli_fetch_array($query5,MYSQLI_ASSOC);
				
				$old_email = base64_encode($_POST['old_email']);
				
				if($run5){
					if( $old_email ==$run5['email']){
						
						$id = base64_encode($_POST['email1']);
				
						$sql = "SELECT * FROM dean where email='$id'";
						$query = mysqli_query($con,$sql);
						$run = mysqli_fetch_array($query,MYSQLI_NUM);
						
						if($run){
							$error = "This email already be used"; 
						}
						else{
							$sql2 = "SELECT * FROM user where email='$id'";
							$query2 = mysqli_query($con,$sql2);
							$run2 = mysqli_fetch_array($query2,MYSQLI_NUM);
							if($run2){
								$error = "This email already be used"; 
							}
							else{
								
								if($_POST['email1']==$_POST['email2']){
									
									$sql3 = "UPDATE user SET email='".$id."' WHERE user_id='".$_SESSION['id']."'";
									
									$query3 = mysqli_query($con,$sql3);
									
									if($query3){
										mysqli_close($con);
										echo "<script>window.open('logout.php','_self')</script>";
									}
								}
								else{
									$error = "Your email are no same"; 
								}
							}
						}
						
					}
					else{
						$error = "Wrong email"; 
					}
				}
				mysqli_close($con);

			}
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

  
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Change Email</h1>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5"  data-aos="fade">

            <form action="c_email.php" method="post" class="p-5 bg-white">

				<br>
				<center><h1><b>Change Email</b></h1></center>
				<br>
				
			   <div class="row form-group">
				<label style="color : red;" id="error"></label>
			   </div>
				
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" id="email">Current Email</label> 
                  <input type="email" id="email" name="old_email" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">New Email</label> 
                  <input type="email" id="email" name="email1" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Re-type Email</label> 
                  <input type="email" id="email" name="email2" class="form-control" required>
                </div>
              </div>
			  <br>

              <div class="row form-group">
                <div class="col-md-12">
                  <center>
				  <a href="editaccount.php" class="btn btn-primary py-2 px-4 text-white">Back</a>
				  <input type="submit" name="c_email" value="Change Email" class="btn btn-primary py-2 px-4 text-white">
				  </center>
                </div>
              </div>

  
            </form>

          </div>
          
        </div>
      </div>
    </div>
	
	<script>
		document.getElementById("error").innerHTML = "<?php echo $error; ?>";
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