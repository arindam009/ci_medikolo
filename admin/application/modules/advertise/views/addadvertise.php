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
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Add Advertise<a href="<?php echo base_url();?>admin/advertise/viewadvertise" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Page</label>
                                    <select name="page_id" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<?php foreach($get_all_pages as $get_pages) { ?>
                                    	<option value=<?php echo $get_pages->id;?>><?php echo $get_pages->title;?></option>
                                    	<?php } ?>
                                    </select>
                                    
                                    
                                    <?php echo form_error('page_id','<div class="error">','</div>'); ?>
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption3">Placement Position</label>
                                    <select name="placement" class="form-control">
                                    	<option value="">Select Option</option>
                                    	<option value="top" <?php echo set_select('placement' , 'top', ( !empty($data) && $data == "input" ? TRUE : FALSE ));?>> Top</option>
                                    	<option value="bottom" <?php echo set_select('placement' , 'bottom', ( !empty($data) && $data == "input" ? TRUE : FALSE ));?>>Bottom</option>
                                    	<option value="left" <?php echo set_select('placement','left', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Left</option>
                                    	<option value="right" <?php echo set_select('placement','right', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Right</option>
                                    </select>
                                    
                                     <?php echo form_error('placement','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption3">Third Party</label>
                                    <select name="is_third_party" class="form-control" id="is_third_party">
                                    	<option value="1" <?php echo set_select('is_third_party',  '1'); ?>>Yes</option>
                                    	<option value="0" <?php echo set_select('is_third_party',  '0'); ?>>No</option>                                    	
                                    </select>
                                     <?php echo form_error('is_third_party','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group" id="ad_code">
                                    <label for="inputslidercaption">Advertisement code</label>
                                    <textarea name="ad_code"   class="form-control editor_big"  placeholder="Enter Advertisement code"><?php echo set_value('ad_code'); ?></textarea>
                                </div>

								<div class="form-group" id="script">
                                    <label for="inputslidercaption3">Script</label>
                                    <textarea name="script"   class="form-control editor_big"  placeholder="Enter script code"><?php echo set_value('script'); ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption3">Images</label>
                                    <input type="file" name="images" id="inputsliderimage" accept="image/*" />
                                     <?php echo form_error('description','<div class="error">','</div>'); ?>
                                </div>
                                <!--<div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="status" class="form-control">
                                    	<option value="1">Yes</option>
                                    	<option value="0">No</option>                                    	
                                    </select>
                                   
                                    
                        
                                </div>-->
                                
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
    <script type="text/javascript">

    $("#is_third_party").on('change', function() {  
        if(this.value==0){
            $("#ad_code").hide();
            $("#script").hide();
        }else{
            $("#ad_code").show();
            $("#script").show();
        }
    })
        



</script>