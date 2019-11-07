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
                           <h3> Add Coupon <a href="<?php echo base_url();?>admin/coupon/viewcoupon" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Coupon Code</label>
                                    <input name="coupon_code" type="text" value="<?php echo set_value('coupon_code'); ?>" class="form-control" placeholder="Enter Coupon Code">
                                    <?php echo form_error('coupon_code','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Start Date</label>
                                    <input name="start_date" type="text" value="<?php echo set_value('start_date'); ?>" class="form-control" placeholder="Enter Start Date" id="datepick">
                                    <?php echo form_error('start_date','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">End Date</label>
                                    <input name="end_date" type="text" value="<?php echo set_value('end_date'); ?>" class="form-control" placeholder="Enter End Date" id="datepick2">
                                    <?php echo form_error('end_date','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Discount Type</label>
                                    <select name="type" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="F" <?php echo set_select('type','F', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Flat Discount</option>
                                    	<option value="P" <?php echo set_select('type','P', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Percentage(%)</option>                                    	
                                    </select>
                                    <?php echo form_error('type','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Value</label>
                                    <input name="value" type="text" value="<?php echo set_value('value'); ?>" class="form-control" placeholder="Enter Value">
                                    <?php echo form_error('value','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption"> Platform</label>
                                    <select name="platform" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="web" <?php echo set_select('platform','web', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Web</option>
                                    	<option value="app" <?php echo set_select('platform','app', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>APP</option>                                    	
                                    </select>
                                    <?php echo form_error('platform','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Redemption</label>
                                    <select name="redemption" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="one_time" <?php echo set_select('redemption','one_time', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>One Time</option>
                                    	<option value="multiple" <?php echo set_select('redemption','multiple', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Multiple</option>                                    	
                                    </select>
                                    <?php echo form_error('redemption','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">New User Coupon</label>
                                    <select name="new_user_coupon" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="1" <?php echo set_select('new_user_coupon','1', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Yes</option>
                                    	<option value="0" <?php echo set_select('new_user_coupon','0', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>No </option>                                    	
                                    </select>
                                    <?php echo form_error('new_user_coupon','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Min Cart Value</label>
                                    <input name="min_cart_value" value="<?php echo set_value('min_cart_value'); ?>" type="text" class="form-control" placeholder="Enter Min Cart Value">
                                    <?php echo form_error('min_cart_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Max Cart Value</label>
                                    <input name="max_cart_value" value="<?php echo set_value('max_cart_value'); ?>" type="text" class="form-control" placeholder="Enter Max Cart Value">
                                    <?php echo form_error('max_cart_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Max Redemption Value</label>
                                    <input name="max_redemption_value" value="<?php echo set_value('max_redemption_value'); ?>" type="text" class="form-control" placeholder="Enter Max Redemption Value">
                                    <?php echo form_error('max_redemption_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="is_active" class="form-control">
                                    	<option value="1">Yes</option>
                                    	<option value="0">No</option>                                    	
                                    </select>
                                 </div>
                                 
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>