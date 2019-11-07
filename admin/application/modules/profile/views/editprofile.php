<section id="main-content">

        <section class="wrapper">

        <!-- page start-->



        <div class="row">

           <div class="col-lg-12">

		    <?php if($this->session->flashdata('err_msg')!="") { ?>

						 <div class="clearfix"></div>

<div class="alert alert-danger">

  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>

</div>

  <?php } ?>

                    <section class="panel">

                        <header class="panel-heading">

                           <h3> Edit Profile <a href="<?php echo base_url();?>admin/profile" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

							<?php foreach($single_data as $singledata) { ?>

                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                <div class="col-lg-6">
                                <h3>Profile</h3>
                                <div class="form-group">
                                    <label for="inputslidercaption">Full Name</label>
                                    <input name="f_name" value="<?php echo $singledata->f_name;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Full Name">
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Email</label>
                                    <input name="email" value="<?php echo $singledata->email;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Email">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Mobile Number</label>
                                    <input name="mobile_primary" value="<?php echo $singledata->mobile_primary;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Phone Number">
                                </div>
                                
                                <div class="form-group">

                                <button type="submit" class="btn btn-info">Update Profile</button>
                              </div>
								
  
								
                               </div>
                               </div>
                               
                                </form>
                                
                                
                                                   
                              
                              

                                
                           

							<?php } ?>

                            </div>



                        </div>

                    </section>



            </div>

        </div>

        <!-- page end-->

        </section>

    </section>