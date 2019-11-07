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
						<form action="" method="post">
						<div class="f-row">
							<input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Your email (required)" />
							<?php echo form_error('email', '<div class="error">', '</div>'); ?>
						</div>
						
						<div class="f-row bwrap">
							<input type="submit" name="submit" value="register" />
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