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
                           <h3> Edit Shipping Method <a href="<?php echo base_url();?>admin/shipping/viewshippingmethod" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            <?php foreach($shippingmethod as $sm) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Shipping Class </label>
                                    
                                    <select name="shipping_class_id" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<?php foreach($all_shipping_class as $asc){?>
                                    	
											<option value=<?php echo $asc->id;?> <?php if($sm->shipping_class_id==$asc->id){echo "selected";}?>><?php echo $asc->class_name;?></option>
										<?php }?>
                                    </select>
                                    <?php echo form_error('shipping_class_id','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Method Title</label>
                                    <input name="method_title" type="text" value="<?php echo $sm->method_title; ?>" class="form-control" placeholder="Enter Method Title">
                                    <?php echo form_error('method_title','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Shipping Charge</label>
                                    <input name="shipping_charge" type="text" value="<?php echo $sm->shipping_charge; ?>" class="form-control" placeholder="Enter Shipping Charge">
                                    <?php echo form_error('shipping_charge','<div class="error">','</div>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="inputslidercaption">Shipping Cost</label>
                                    <input name="shipping_cost" type="text" value="<?php echo $sm->shipping_cost; ?>" class="form-control" placeholder="Enter Shipping Cost">
                                    <?php echo form_error('shipping_cost','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Calculation Type</label>
                                    <select name="calculation_type" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<option value="pw" <?php echo set_select('calculation_type','pw', ( !empty($data) && $data == "input" ? TRUE : FALSE ));  ?> <?php if($sm->calculation_type==pw){echo "selected";}?>>Product Wise</option>
                                    	<option value="cw" <?php echo set_select('calculation_type','cw', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?> <?php if($sm->calculation_type==cw){echo "selected";}?>>Cart Wise </option>                          	
                                    </select>
                                    <?php echo form_error('calculation_type','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Free Shipping Enabled</label>
                                    <select name="free_shipping_enabled" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<option value="1" <?php echo set_select('free_shipping_enabled','1', ( !empty($data) && $data == "input" ? TRUE : FALSE ));  ?> <?php if($sm->free_shipping_enabled==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php echo set_select('free_shipping_enabled','0', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?> <?php if($sm->free_shipping_enabled==0){echo "selected";}?>>No </option>                          	
                                    </select>
                                    <?php echo form_error('free_shipping_enabled','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Minimum Order Amount</label>
                                    <input name="minimum_order_amount" type="text" value="<?php echo $sm->minimum_order_amount; ?>" class="form-control" placeholder="Enter Minimum Order Amount">
                                    <?php echo form_error('minimum_order_amount','<div class="error">','</div>'); ?>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
							<?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end &nbsp;<?php echo $asc->class_name; ?>-->
        </section>
    </section>