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
                    <section class="panel">
                        <header class="panel-heading">
                           <h3>
                            <?php if($current_data==0){?> Add <?php } else {?> Edit <?php } ?>
                             Quantity Rules 
                            <a href="<?php echo base_url();?>admin/quantityrules/" class="btn btn-danger flotright">Back</a>
                           </h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                               
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Title<span>*</span></label>
                                        <input type="text" name="title" value="<?php echo set_value('title'); ?><?php echo $single_row_data[0]->title;?>" class="form-control">
                                        <?php echo form_error('title','<div class="error">','</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Minimum<span>*</span></label>
                                        <input type="text" name="min_value" value="<?php echo set_value('min_value'); ?><?php echo $single_row_data[0]->min_value ;?>" class="form-control">
                                        <?php echo form_error('min_value','<div class="error">','</div>'); ?>
                                    </div>

                                   <div class="form-group">
                                        <label>Maximum<span>*</span></label>
                                        <input type="text" name="max_value" value="<?php echo set_value('max_value'); ?><?php echo $single_row_data[0]->max_value;?>" class="form-control">
                                        <?php echo form_error('max_value','<div class="error">','</div>'); ?>
                                    </div>

                                 <div class="form-group">
                                        <label>Out Of Stock Minimum<span>*</span></label>
                                        <input type="text" name="stock_min_value" value="<?php echo set_value('stock_min_value'); ?><?php echo $single_row_data[0]->stock_min_value;?>" class="form-control">
                                        <?php echo form_error('stock_min_value','<div class="error">','</div>'); ?>
                                    </div>

                                   <div class="form-group">
                                        <label>Out Of Stock Maximum</label>
                                        <input type="text" name="stock_max_value" value="<?php echo set_value('stock_max_value'); ?><?php echo $single_row_data[0]->stock_max_value;?>" class="form-control">
                                        <?php echo form_error('stock_max_value','<div class="error">','</div>'); ?>
                                    </div>  

                                     <div class="form-group">
                                        <label>Step Value<span>*</span></label>
                                        <input type="text" name="step_value" value="<?php echo set_value('step_value'); ?><?php echo $single_row_data[0]->step_value;?>" class="form-control">
                                        <?php echo form_error('step_value','<div class="error">','</div>'); ?>
                                    </div>  

                                </div>
                                <div class="col-lg-4">
                                    
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
  