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
                             Testimonials
                            <a href="<?php echo base_url();?>admin/testimonials/" class="btn btn-danger flotright">Back</a>
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

                                    <div class="form-group" id="script">
                                        <label>Description</label>
                                        <textarea name="descrip"   class="form-control editor_big"><?php echo set_value('descrip'); ?><?php echo $single_row_data[0]->descrip;?></textarea>

                                    </div>

                                

                                </div>
                                <div class="col-lg-4">
                                    
                                    
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
  