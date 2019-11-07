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
                           <h3> Edit Advertisement <a href="<?php echo base_url();?>admin/advertise/viewadvertise" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($advertise as $advertisement) { ?>
                            	
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Page</label>
                                    <select name="page_id" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<?php foreach($get_all_pages as $get_pages) { ?>
                                    	<option value=<?php echo $get_pages->id;?> <?php if($advertisement->page_id==$get_pages->id){echo "selected";}?>><?php echo $get_pages->title;?></option>
                                    	<?php } ?>
                                    </select>
                                    
                                    
                                    <?php echo form_error('page_id','<div class="error">','</div>'); ?>
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption3">Placement Position</label>
                                    <select name="placement" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<option value="top" <?php echo set_select('placement' , 'top', ( !empty($data) && $data == "input" ? TRUE : FALSE ));?> <?php if($advertisement->placement==top){echo "selected";}?>> Top</option>
                                    	
                                    	<option value="bottom" <?php echo set_select('placement' , 'bottom', ( !empty($data) && $data == "input" ? TRUE : FALSE ));?> <?php if($advertisement->placement==bottom){echo "selected";}?>>Bottom</option>
                                    	
                                    	<option value="left" <?php echo set_select('placement','left', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?> <?php if($advertisement->placement==left){echo "selected";}?>>Left</option>
                                    	
                                    	<option value="right" <?php echo set_select('placement','right', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?> <?php if($advertisement->placement==right){echo "selected";}?>>Right</option>
                                    </select>
                                    
                                     <?php echo form_error('placement','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption3">Third Party</label>
                                    <select name="is_third_party" class="form-control" id="is_third_party">
                                    	<option value="1" <?php echo set_select('is_third_party',  '1'); ?> <?php if($advertisement->is_third_party==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php echo set_select('is_third_party',  '0'); ?> <?php if($advertisement->is_third_party==0){echo "selected";}?>>No</option>                                    	
                                    </select>
                                     <?php echo form_error('is_third_party','<div class="error">','</div>'); ?>
                                </div>
                               <?php if($advertisement->is_third_party!=0){?>
								<div class="form-group" id="ad_code">
                                    <label for="inputslidercaption">Advertisement code</label>
                                    <textarea name="ad_code"   class="form-control editor_big"  placeholder="Enter Advertisement code"><?php echo $advertisement->ad_code; ?></textarea>
                                     <?php echo form_error('ad_code','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group" id="script">
                                    <label for="inputslidercaption3">Script</label>
                                    <textarea name="script"   class="form-control editor_big"  placeholder="Enter Script"><?php echo $advertisement->script; ?></textarea>
                                    
                                     <?php echo form_error('script','<div class="error">','</div>'); ?>
                                </div>
                                <?php } else { ?>
                                <div style="display: none;" id="codeform">
                                <div class="form-group" id="ad_code">
                                    <label for="inputslidercaption">Advertisement code</label>
                                    <textarea name="ad_code"   class="form-control editor_big"  placeholder="Enter Advertisement code"><?php echo $advertisement->ad_code; ?></textarea>
                                     <?php echo form_error('ad_code','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group" id="script">
                                    <label for="inputslidercaption3">Script</label>
                                    <textarea name="script"   class="form-control editor_big"  placeholder="Enter Script"><?php echo $advertisement->script; ?></textarea>
                                    
                                     <?php echo form_error('script','<div class="error">','</div>'); ?>
                                </div>
                                </div>
                                <?php } ?>
                                
                                <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/advertise_image/<?=$advertisement->images?>" height=100px; width=100px;>
                                    <label for="inputslidercaption">Feature Image</label>
                                     <input type="file" name="images" accept="image/*" />
                                     <input name="prev_link" type="hidden" value="<?=$advertisement->images?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
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
    <script type="text/javascript">

    $("#is_third_party").on('change', function() {  
        if(this.value==0){
            $("#codeform").hide();
            
        }else{
            $("#codeform").show();
           
        }
    })
        



	</script>