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
                           <h3> Edit Difficulty <a href="<?php echo base_url();?>admin/recipe/viewdifficulty" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($difficulty as $d) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                 <label for="inputslidercaption">Difficulty Name</label>
                                    <input name="name" type="text" value="<?php echo $d->name; ?>" class="form-control" placeholder="Enter Difficulty Name">
                                    <?php echo form_error('name','<div class="error">','</div>'); ?>
                                    
                                </div>
                                <div class="form-group">
                                 <label for="inputslidercaption">Difficulty Slug</label>
                                    <input name="slug" type="text" value="<?php echo $d->slug; ?>" class="form-control" >
                                    <?php echo form_error('name','<div class="error">','</div>'); ?>
                                    
                                </div>
								<div class="form-group">
								<label for="inputslidercaption3">description</label>
                                    <textarea name="description" class="form-control editor_big"  placeholder="Enter Description"><?php echo $d->description; ?></textarea>
                                     <?php echo form_error('description','<div class="error">','</div>'); ?>
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="status" class="form-control">
                                    	<option value="1" <?php if($d->status==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($d->status==0){echo "selected";}?>>No</option>                                    	
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