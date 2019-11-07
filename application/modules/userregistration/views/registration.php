<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">User Registration</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Medikolo <i class="ion-ios-arrow-forward"></i></a></span> <span>User Registration <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
	
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                    <div class="clearfix"></div>
                    <div class="alert alert-success">
                       <?=$this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 py-5 pr-md-5">
	            <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading"></span>
	            <h2 class="mb-4">User Registration Form</h2>
	            
	          </div>
	          <form action="" class="appointment-form ftco-animate" method="post">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    				<input type="text" class="form-control" name="full_name" placeholder="Enter Full Name*">
		    				</div>
							<?php echo form_error('full_name','<div class="alert alert-danger">','</div>'); ?>
		    			</div>
						<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="email" class="form-control" name="email"  placeholder="Enter Email*">
		    				</div>
							<?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
		    			</div>
						<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="password" class="form-control" name="password" placeholder="Enter Password*">
		    				</div>
							<?php echo form_error('password','<div class="alert alert-danger">','</div>'); ?>
		    			</div>
	    				
		               <div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password*">
		    				</div>
							<?php echo form_error('confirm_password','<div class="alert alert-danger">','</div>'); ?>
		    			</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number*">
		    				</div>
							<?php echo form_error('mobile','<div class="alert alert-danger">','</div>'); ?>
		    			</div>
		    				
	    				
		            
		              <input type="submit" value="Registration" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
					<div class="d-md-flex ml-md-4">
					<p style='color:#fff;'>Already have an account yet? <a class="btn btn-secondary py-3 px-4" href="<?php echo base_url();?>login">Log in.</a></p>
					</div>
    			</div>
				</div>
    			
		          
		          
    </section>