<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
      <div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html" title="Home">Home</a></li>
          <li>Edit My Account</li>
        </ul>
      </nav>
      <!--//breadcrumbs-->
			<!--row-->
			<div class="row">
			<!--content-->
				<section class="content center full-width">
					<div class="modal container">
						 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('error_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?php echo $this->session->flashdata('error_msg');?>
                    </div>
                      <?php } ?>
					    <h2>Create an Account</h2>
                        <p>Registering for this site is easy. Just fill in the fields below, and we'll get a new account set up for you in no time.</p>
						<h3>Account Details</h3>
						<form action="" method="post">
						<div class="f-row">
							<input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Your name (required)" />
							 <?php echo form_error('name', '<div class="error">', '</div>'); ?>
						</div>
						<div class="f-row">
							<input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Your email (required)" />
							<?php echo form_error('email', '<div class="error">', '</div>'); ?>
						</div>
						<div class="f-row">
							<input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Your password (required)" />
							<?php echo form_error('password', '<div class="error">', '</div>'); ?>
						</div>
						<div class="f-row">
							<input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Retype password (required)" />
							<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
						</div>
						<label>Registration Type</label>
						<label for="see-field_1_public">					
							<input type="radio" name="reg_type" value="shop" checked="" />
							<span class="field-visibility-text">Shop</span>
						</label>
						<label for="see-field_1_adminsonly">
								<input type="radio" name="reg_type" value="recipe" />
							<span class="field-visibility-text">Recipe</span>
						</label>
						<label for="see-field_1_loggedin">
								<input type="radio" name="reg_type" value="Blog" />
							<span class="field-visibility-text">Blog</span>
						</label>	
						<br>	
						<br>	
						<input type="hidden" name="_mc4wp_subscribe_buddypress" value="0" /><p class="mc4wp-checkbox mc4wp-checkbox-buddypress"><label><input type="checkbox" name="newsletter" value="1"  /><span>Sign me up for the newsletter!</span></label></p>
						
						<div class="f-row bwrap">
							<input type="submit" name="submit" value="register" />
						</div>
						</form>
						<p>Already have an account yet? <a href="<?php echo base_url();?>login">Log in.</a></p>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>