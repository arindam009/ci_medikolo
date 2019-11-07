
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
                             Doctors
                            <a href="<?php echo base_url();?>admin/doctors/" class="btn btn-danger flotright">Back</a>
                           </h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                               
                                <div class="col-lg-8">
								
								<div class="form-group">
									<label for="exampleFormControlSelect2">Department<span>*</span></label>
									<select class="form-control" id="" name="dept_id">
									  <option>---Select Department---</option>
									  <?php foreach($dept_all as $dept){ ?>
									  <option value="<?php echo $dept->id;?>" <?php if($dept->id==$single_row_data[0]->dept_id){ echo "selected"; }?> ><?php echo $dept->title;?></option>
									  <?php  } ?>
									  </select>
									  <?php echo form_error('dept_id','<div class="error">','</div>'); ?>
									</div>
								
								
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
                                        <label>Address<span>*</span></label>
                                        <input type="text" name="address" value="<?php echo set_value('address'); ?><?php echo $single_row_data[0]->address;?>" class="form-control">
                                        <?php echo form_error('address','<div class="error">','</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>City<span>*</span></label>
                                        <input type="text" name="city" value="<?php echo set_value('city'); ?><?php echo $single_row_data[0]->city;?>" class="form-control">
                                        <?php echo form_error('city','<div class="error">','</div>'); ?>
                                    </div>

                                
                                
								<div class="form-group">
                                        <label>Pincode<span>*</span></label>
                                        <input type="text" name="pincode" value="<?php echo set_value('pincode'); ?><?php echo $single_row_data[0]->pincode;?>" class="form-control">
                                        <?php echo form_error('pincode','<div class="error">','</div>'); ?>
                                    </div>

                               
								<div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" value="<?php echo set_value('website'); ?><?php echo $single_row_data[0]->website;?>" class="form-control">
                                        <?php echo form_error('website','<div class="error">','</div>'); ?>
                                    </div>
								<div class="form-group">
                                        <label>State<span>*</span></label>
                                        <input type="text" name="state" value="<?php echo set_value('state'); ?><?php echo $single_row_data[0]->state;?>" class="form-control">
                                        <?php echo form_error('state','<div class="error">','</div>'); ?>
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
                                        <label>Image<span>*</span></label>
                                        <input type="file" name="img" accept="image/*"  />
                                         <?php echo form_error('img','<div class="error">','</div>'); ?>
                                         
                                         <?php if($single_row_data[0]->img!=''){?>
                                         <img class="featuredimg" src="<?php echo base_url()?>uploads/doctors/<?=$single_row_data[0]->img?>">
                                          <input name="prev_link_logo" type="hidden" value="<?=$single_row_data[0]->img?>">
                                         <?php } ?>
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
  