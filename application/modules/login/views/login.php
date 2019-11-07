<!--main-->
  <main class="main" role="main">
    <!--wrap-->
    <div class="wrap clearfix">
      <!--breadcrumbs-->
      <div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
      <nav class="breadcrumbs">
        <ul>
          <li><a href="<?php echo base_url();?>/home" title="Home">Home</a></li>
          <li>Login</li>
        </ul>
      </nav>
      <!--//breadcrumbs-->
      <!--row-->
      <div class="row">
      <!--content-->
        <section class="content center full-width">
          <div class="modal container">
            <?php if($this->session->flashdata('error_login')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?php echo $this->session->flashdata('error_login');?>
                    </div>
                      <?php } ?>
                       <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
            <h3>Login</h3>
            <form action="" method="post">
            <div class="f-row">
              <input type="text" name="username" placeholder="Your username" />
              <?php echo form_error('username', '<div class="error">', '</div>'); ?>
            </div>
            <div class="f-row">
              <input type="password" name="password" placeholder="Your password" />
              <?php echo form_error('password', '<div class="error">', '</div>'); ?>
            </div>
            
            <div class="f-row">
              <input type="checkbox" />
              <label>Remember me next time</label>
            </div>
            
            <div class="f-row bwrap">
              <input type="submit" name="login" value="login" />
            </div>
            </form>
          <!--  <p><a href="<?php //echo base_url();?>resetpassword">Forgotten password?</a></p>-->
            <p>Dont have an account yet? <a href="<?php echo base_url();?>user-registration">Sign up.</a></p>
          </div>
        </section>
        <!--//content-->
      </div>
      <!--//row-->
    </div>
    <!--//wrap-->
  </main>
  <!--//main-->