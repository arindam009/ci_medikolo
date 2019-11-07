<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
      <div class="ads1"><img src="img/ads-1.png" alt=""/></div>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="index.html" title="Home">Home</a></li>
          <li>Reset Password</li>
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
						<h3>Reset Password</h3>
						<form action="<?php echo base_url();?>resetpassword/setpassword" method="post">
						<div class="f-row">
							<input type="password" name="new_password" value="" placeholder="Enter New Password (required)" />
							<?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
						</div>
						<div class="f-row">
							<input type="password" name="confirm_password" value="" placeholder="Confirm Password(required)" />
							<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
						</div>
						<input type="hidden" name="cust_id" value="<?php echo $_SESSION['cust_id'];?>">
						<div class="f-row bwrap">
							<input type="submit" name="submit" value="Submit" />
						</div>
						</form>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>