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

                           <h3> Add Category <a href="<?php echo base_url();?>admin/category/recipe" class="btn btn-danger flotright">Back</a></h3>

                        </header>
                        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><strong>General</strong></a></li>
    <li><a data-toggle="tab" href="#menu1"><strong>SEO Meta</strong></a></li>
  </ul>
                      <form role="form" method="POST" action="" enctype="multipart/form-data">

                        <div class="panel-body">

                           <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                <div class="form-group">
                                    <label for="inputslidercaption">Category Name *</label>
                                    <input name="cat_name" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Category Name" value="<?php echo set_value('cat_name'); ?>">
                                     <?php echo form_error('cat_name', '<div class="error">', '</div>'); ?>
                                </div>
                                 <div class="form-group">
                                 <label for="inputslidercaption">Category Icon</label>

                                    <input name="cat_icon" type="text" class="form-control" placeholder="Enter Category Icon" value="<?php echo set_value('cat_icon'); ?>">
                                     <?php echo form_error('cat_icon', '<div class="error">', '</div>'); ?>

                                </div>

								<div class="form-group">

                                    <label for="inputslidercaption2">Is Parent</label>
                                    <select class="form-control" name="is_parent" id="is_parent">
                                        
                                        <option value="1" <?php echo set_select('is_parent',  '1'); ?>>Yes</option>
                                        <option value="0" <?php echo set_select('is_parent',  '0'); ?>>No</option>
                                    </select>
                                     <?php echo form_error('is_parent', '<div class="error">', '</div>'); ?>

                                </div>

								<div class="form-group" id="parent_category">
                                    <label for="inputslidercaption3">Parent Category</label>
                                      <select class="form-control" name="parent_cat">
                                         <option value="">Select Option</option>
                                        <?php foreach ($category as $c) { ?>
                                             <option value="<?php echo $c->id;?>" <?php echo set_select('cat_type',  $c->id); ?>><?php echo $c->cat_name;?></option>
                                      <?php  } ?>
                                    </select>


                                </div>
                                

                                <div class="form-group">

                                    <label for="inputslidercaption2">Description</label>

                                   <textarea name="description"   class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo set_value('description'); ?></textarea>

                                </div>
                               

                                <div class="form-group">

                                    <label for="inputsliderimage">Category Icon</label>

                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />

                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption2">Status</label>
                                    <select class="form-control" name="status">
                                        
                                        <option <?php echo set_select('status',  '1'); ?> value="1">Active</option>
                                        <option <?php echo set_select('status',  '0'); ?> value="0">Inactive</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>

                                </div>
                              </div>
                               <div id="menu1" class="tab-pane fade">
                               <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="<?php echo set_value('meta_title'); ?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="<?php echo set_value('meta_keyword'); ?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo set_value('meta_descrip'); ?></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="<?php echo set_value('canonical_tag');?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robot_index"  value="index" type="radio" >&nbsp;&nbsp;
                                     No Index <input name="robot_index"  value="noindex" type="radio"><br />
                                    Follow <input name="follow"  value="follow" type="radio">&nbsp;&nbsp;
                                     No Follow <input name="follow"  value="nofollow" type="radio">
                                </div>  

 </div>
                                    </div>
                            
                            

                        </div>
                         <div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        </form>
                    </section>



            </div>

        </div>

        <!-- page end-->

        </section>

    </section>
     <script type="text/javascript">

    $("#is_parent").on('change', function() {  
        if(this.value==1){
            $("#parent_category").hide();
        }else{
            $("#parent_category").show();
        }
    })
        



</script>