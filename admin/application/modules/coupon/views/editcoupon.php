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
                           <h3> Edit Coupon <a href="<?php echo base_url();?>admin/coupon/viewcoupon" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($coupon as $c) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Coupon Code</label>
                                    <input name="coupon_code" type="text" class="form-control" value="<?php echo $c->coupon_code; ?>">
                                    <?php echo form_error('coupon_code','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Start Date</label>
                                    <input name="start_date" type="text" class="form-control" id="datepick" value="<?php echo $c->start_date; ?>">
                                    <?php echo form_error('start_date','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">End Date</label>
                                    <input name="end_date" type="text" class="form-control" id="datepick2" value="<?php echo $c->end_date; ?>">
                                    <?php echo form_error('end_date','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Discount Type</label>
                                    <select name="type" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="F" <?php if($c->type==F){echo "selected";}?>>Flat Discount</option>
                                    	<option value="P" <?php if($c->type==P){echo "selected";}?>>Percentage(%)</option>                                    	
                                    </select>
                                    <?php echo form_error('type','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Value</label>
                                    <input name="value" type="text" class="form-control" value="<?php echo $c->value; ?>">
                                    <?php echo form_error('value','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption"> Platform</label>
                                    
                                    <select name="platform" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="web" <?php if($c->platform==web){echo "selected";}?>>Web</option>
                                    	<option value="app" <?php if($c->platform==app){echo "selected";}?>>APP</option>                              	
                                    </select>
                                    <?php echo form_error('platform','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Redemption</label>
                                    
                                    <select name="redemption" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="one_time" <?php if($c->redemption==one_time){echo "selected";}?>>One Time</option>
                                    	<option value="multiple" <?php if($c->redemption==multiple){echo "selected";}?>>Multiple</option>                                   	
                                    </select>
                                    <?php echo form_error('redemption','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">New User Coupon</label>
                                    
                                    <select name="new_user_coupon" class="form-control">
                                    	<option value="">select Option</option>
                                    	<option value="1" <?php if($c->new_user_coupon==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($c->new_user_coupon==0){echo "selected";}?>>No </option>
                                    </select>
                                    <?php echo form_error('new_user_coupon','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Min Cart Value</label>
                                    <input name="min_cart_value" type="text" class="form-control" value="<?php echo $c->min_cart_value; ?>">
                                    <?php echo form_error('min_cart_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Max Cart Value</label>
                                    <input name="max_cart_value" type="text" class="form-control" value="<?php echo $c->max_cart_value; ?>">
                                    <?php echo form_error('max_cart_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Max Redemption Value</label>
                                    <input name="max_redemption_value" type="text" class="form-control" value="<?php echo $c->max_redemption_value; ?>">
                                    <?php echo form_error('max_redemption_value','<div class="error">','</div>'); ?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="is_active" class="form-control">
                                    	
                                    	<option value="1" <?php if($c->is_active==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($c->is_active==0){echo "selected";}?>>No</option>                                    	
                                    </select>
                                 </div>
                                 
                                
                                <button type="submit" class="btn btn-info">Submit</button>
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