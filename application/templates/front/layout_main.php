<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Medikolo</title>
    <meta charset="utf-8">
    
    <link rel="shortcut icon" href="<?php echo base_url()?>themes/admin/images/logo_medikolo.jpg" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>themes/admin/images/logo_medikolo.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/style.css">
  </head>
  <body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0" style='width: 100%; justify-content: space-between;'>
    			<div class="col-lg-2 pr-4 align-items-center">
		    		<a class="navbar-brand" href="index.html"><img src="<?php echo base_url()?>themes/front/images/logo-medikolo.png" alt="Medikolo Logo" style='width: 100px'></a>
	    		</div>
	    		<div class="col-lg-10 d-none d-md-block">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
						<div class="container d-flex align-items-center">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="oi oi-menu"></span> Menu
						  </button>
						  <p class="button-custom order-lg-last mb-0"><a href="appointment.html" class="btn btn-secondary py-2 px-3">Make An Appointment</a></p>
						  <div class="collapse navbar-collapse" id="ftco-nav">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active"><a href="<?php echo base_url()?>/home" class="nav-link pl-0">Home</a></li>
								<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
								<li class="nav-item"><a href="doctor.html" class="nav-link">Doctor</a></li>
								<li class="nav-item"><a href="department.html" class="nav-link">Departments</a></li>
								<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
							  <li class="nav-item"><a href="<?php echo base_url()?>userregistration" class="nav-link">Register</a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>/" class="nav-link">Login</a></li>
							</ul>
						  </div>
						</div>
					  </nav>
			    </div>
		    </div>
		  </div>
    </nav>
    <!-- END nav -->
    
    <?php echo $template['body']; ?>
		
    <footer class="ftco-footer ftco-bg-dark ftco-section" style='margin: 0 0; padding: 50px 0;'>
      <div class="container">
			<div class="ftco-footer-widget mb-5">
					<h2 class="ftco-heading-2 logo" style='font-size: 2rem; text-align: center; margin-bottom: 20px;'>Medi<span>kolo</span></h2>
					<p style='text-align: center;'>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				  </div>
        <div class="row mb-5" style='margin: 50px 0 !important; align-items: center;'>
          <div class="col-md">
            <div class="ftco-footer-widget">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget ml-md-4">
              <h2 class="ftco-heading-2" style='margin-bottom: 10px;'>Links</h2>
              <ul class="list-unstyled" style='display: flex; justify-content: space-between;'>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Departments</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
            <div class="ftco-footer-widget ml-md-4">
              <h2 class="ftco-heading-2" style='margin-bottom: 10px;'>Services</h2>
              <ul class="list-unstyled" style='display: flex; justify-content: space-between;'>
                <li><a href="#">Neurolgy</a></li>
                <li><a href="#">Dentist</a></li>
                <li><a href="#">Ophthalmology</a></li>
                <li><a href="#">Cardiology</a></li>
                <li><a href="#">Surgery</a></li>
              </ul>
            </div>
          </div>
		</div>
		<div class="row mb-2" style='justify-content: center;'>
				<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					  </ul>
		</div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p style='margin: 0'>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Medikolo, All rights reserved</a>
  </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url()?>themes/front/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/popper.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/aos.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url()?>themes/front/js/google-map.js"></script>
  <script src="<?php echo base_url()?>themes/front/js/main.js"></script>
    
  </body>
</html>