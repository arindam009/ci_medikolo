
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
         
            <?php if(!empty(validation_errors())) { ?>
                         <div class="clearfix"></div>
                        <div class="alert alert-danger border_red">
                          <strong>Danger!</strong>   Please fillup your form data!!
                        </div>
            <?php } ?>

            <?php $current_data  = count($single_row_data);?>
			   <?php //echo "<pre>";?>
			   <?php //print_r($single_row_data);die;?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3>
                            <?php if($current_data==0){?> Add <?php } else {?> Edit <?php } ?>
                             Customers
                            <a href="<?php echo base_url();?>admin/customers/" class="btn btn-danger flotright">Back</a>
                           </h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action=""  autocomplete="off">
                               
                                <div class="col-lg-8">
								<div class="form-group">
                                        <label>Full Name<span>*</span></label>
                                        <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?><?php echo $single_row_data[0]->full_name;?>" class="form-control">
                                        <?php echo form_error('name','<div class="error">','</div>'); ?>
                                    </div>
								
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email" value="<?php echo set_value('email'); ?><?php echo $single_row_data[0]->email;?>" class="form-control">
                                        <?php echo form_error('email','<div class="error">','</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Passsword<span>*</span></label>
                                        <input type="password" name="password" value="<?php echo set_value('password'); ?><?php echo $single_row_data[0]->password;?>" class="form-control">
                                        <?php echo form_error('password','<div class="error">','</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password<span>*</span></label>
                                        <input type="password" name="confirm_password" value="" class="form-control">
                                        <?php echo form_error('confirm_password','<div class="error">','</div>'); ?>
                                    </div>

                                
                                
								<div class="form-group">
                                        <label>Mobile<span>*</span></label>
                                        <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?><?php echo $single_row_data[0]->pincode;?>" class="form-control">
                                        <?php echo form_error('mobile','<div class="error">','</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                     <label for="inputslidercaption">Status</label>
                                     <select name="status" class="form-control">
                                         <option value="1" <?php if($single_row_data[0]->status==1){echo "selected";}?>>Active</option>
                                         <option value="0" <?php if($single_row_data[0]->status==0){echo "selected";}?>>Inactive</option>
                                     </select>
                                </div>
                               </div>
                                <div class="col-lg-12">
                                <button type="submit" class="btn btn-info">Submit</button>
                               </div>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
  