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
                             Company Details
                            <a href="<?php echo base_url();?>admin/company/" class="btn btn-danger flotright">Back</a>
                           </h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                               
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Name<span>*</span></label>
                                        <input type="text" name="name" value="<?php echo set_value('name'); ?><?php echo $single_row_data[0]->name;?>" class="form-control">
                                        <?php echo form_error('name','<div class="error">','</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email" value="<?php echo set_value('email'); ?><?php echo $single_row_data[0]->email;?>" class="form-control">
                                        <?php echo form_error('email','<div class="error">','</div>'); ?>
                                    </div>
									<div class="form-group">
                                        <label>Alter Email<span></span></label>
                                        <input type="email" name="alt_email" value="<?php echo set_value('alt_email'); ?><?php echo $single_row_data[0]->alt_email;?>" class="form-control">
                                        <?php echo form_error('alt_email','<div class="error">','</div>'); ?>
                                    </div>
                                    <div class="form-group" id="script">
                                        <label>Description</label>
                                        <textarea name="descrip"   class="form-control editor_big"><?php echo set_value('descrip'); ?><?php echo $single_row_data[0]->descrip;?></textarea>

                                    </div>
									<div class="form-group">
                                        <label>Address<span>*</span></label>
                                        <input type="text" name="address" value="<?php echo set_value('address'); ?><?php echo $single_row_data[0]->address;?>" class="form-control">
                                        <?php echo form_error('address','<div class="error">','</div>'); ?>
                                    </div>
                                   <div class="form-group">
                                        <label>Phone<span>*</span></label>
                                        <input type="text" name="phone" value="<?php echo set_value('phone'); ?><?php echo $single_row_data[0]->phone;?>" class="form-control">
                                        <?php echo form_error('phone','<div class="error">','</div>'); ?>
                                    </div>
                                   <div class="form-group">
                                        <label>Alter Phone<span></span></label>
                                        <input type="text" name="alt_phone" value="<?php echo set_value('alt_phone'); ?><?php echo $single_row_data[0]->alt_phone;?>" class="form-control">
                                        <?php echo form_error('alt_phone','<div class="error">','</div>'); ?>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Logo Image<span>*</span></label>
                                        <input type="file" name="logo" accept="image/*"  />
                                         <?php echo form_error('logo','<div class="error">','</div>'); ?>
                                         
                                         <?php if($single_row_data[0]->logo!=''){?>
                                         <img class="featuredimg" src="<?php echo base_url()?>uploads/company_details/<?=$single_row_data[0]->logo?>">
                                          <input name="prev_link_logo" type="hidden" value="<?=$single_row_data[0]->logo?>">
                                         <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Fav Icon<span>*</span></label>
                                        <input type="file" name="fav_icon"  accept="image/*" />
                                         <?php echo form_error('fav_icon','<div class="error">','</div>'); ?>
                                            <?php if($single_row_data[0]->fav_icon!=''){?>
                                         <img class="featuredimg" src="<?php echo base_url()?>uploads/comapany_details/<?=$single_row_data[0]->fav_icon?>">
                                          <input name="prev_link_banner" type="hidden" value="<?=$single_row_data[0]->fav_icon?>">
                                         <?php }?>
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
  