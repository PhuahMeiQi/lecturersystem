<?php

	session_start();
	
	$display = 'none';

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		$user = $_SESSION['user'];
		
		if($user=="admin")
		{
			$display = 'block';
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

                <li class="ml-xl-3 login active"><a href="editaccount.php"><span class="border-left pl-xl-4"></span>Edit Account</a></li>
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
                <h1>Change Email Or Password</h1>
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

            <div class="p-5 bg-white">
			
			<br>

			<center>	
				<h1><b>Change Email Or Password</b></h1>

			<br><br>

				<button onclick=" window.location.href='c_email.php';" class="btn btn-primary py-2 px-4 text-white" style="width:200px;">Change Email</button><br><br>
				<button onclick=" window.location.href='c_password.php';"  class="btn btn-primary py-2 px-4 text-white" style="width:200px;">Change Password</button><br><br>
				<button id="admin" onclick=" window.location.href='addadmin.php';" class="btn btn-primary py-2 px-4 text-white" style="width:200px;">Add Admin</button><br><br>
			</center>

  
            </div>

          </div>
          
        </div>
      </div>
    </div>
	
	<script>
		document.getElementById('admin').style.display = "<?php echo $display; ?>";
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