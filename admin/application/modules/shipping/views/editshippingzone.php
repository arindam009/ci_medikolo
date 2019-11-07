<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
           <?php echo validation_errors(); ?>
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit Shipping Zones <a href="<?php echo base_url();?>admin/shipping/viewshippingzone" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($shippingzone as $sz) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Shipping Class </label>
                                    <select name="class_id" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<?php foreach($all_shipping_class as $asc){?>
											<option value=<?php echo $asc->id;?> <?php if($sz->class_id==$asc->id){echo "selected";}?>><?php echo $asc->class_name;?></option>
										<?php }?>
                                    </select>
                                    <?php echo form_error('class_id','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Zone Name</label>
                                    <input name="zone_name" type="text" value="<?php echo $sz->zone_name; ?>" class="form-control" placeholder="Enter Zone Name">
                                    <?php echo form_error('zone_name','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Zone Region</label>
                                    <input name="zone_region" type="text" value="<?php echo $sz->zone_region; ?>" class="form-control" placeholder="Enter Zone Region">
                                    <?php echo form_error('zone_region','<div class="error">','</div>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="inputslidercaption">Pincode</label>
                                    <input name="pincode" type="text" value="<?php echo $sz->pincode; ?>" class="form-control" placeholder="Enter Pincode">
                                    <?php echo form_error('pincode','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Shipping Method</label>
                                    <select name="shipping_method" class="form-control">
                                    	<option value="">Select Option</option>
                                    	    <?php foreach($all_method_class as $amc){?>
											<option value=<?php echo $amc->id;?> <?php if($sz->shipping_method==$amc->id){echo "selected";}?>><?php echo $amc->method_title;?></option>
										<?php }?>                          	
                                    </select>
                                    <?php echo form_error('shipping_method','<div class="error">','</div>'); ?>
                                </div>
                                
                                                             
                                <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="is_active" class="form-control">
                                    	
                                    	<option value="1" <?php if($sz->is_active==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($sz->is_active==0){echo "selected";}?>>No</option>                                    	
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