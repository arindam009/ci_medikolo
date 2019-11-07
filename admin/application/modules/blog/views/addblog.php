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

                           <h3> Add Blog <a href="<?php echo base_url();?>admin/blog" class="btn btn-danger flotright">Back</a></h3>
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
                                    <label for="inputslidercaption">Blog Category *</label>
                                    <select class="form-control" name="blog_category">
                                        <option>Select Category</option>
                                        <?php foreach($category as $c) { ?>
                                 <option value="<?php echo $c->id;?>"><?php echo $c->cat_name;?></option>
                                       <?php } ?>
                                       
                                    </select>
                                     <?php echo form_error('blog_category', '<div class="error">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="blog_name">Blog Name  *</label>
                                    <input name="blog_name" value="<?php echo set_value('blog_name');?>" type="text" class="form-control" placeholder="Enter Blog Name">
                                    <?php echo form_error('blog_name', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Blog Description  *</label>
                                   <textarea name="blog_description" class="form-control editor_big"><?php echo set_value('blog_description');?></textarea>
                                   <?php echo form_error('blog_description', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Feature Image</label>
                                     <input type="file" name="image_src" accept="image/*" />
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                     <label for="inputslidercaption">Is feature Blog</label>
                                     <select name="is_feature_blog" class="form-control">                                  	
                                         <option value="1" <?php echo set_select('is_feature_blog ',  '1'); ?>>Yes</option>
                                        <option value="0" <?php echo set_select('is_feature_blog ',  '0'); ?>>No</option>
                                         
                                     </select>
                                </div>
                                 <div class="form-group">
                                     <label for="inputslidercaption">Blog Type</label>
                                     <select name="blog_type" class="form-control">
                                         <option value="normal" selected="">Normal</option>
                                         <option value="articale of the month">Article Of The Month</option>
                                         <option value="articale of the week">Article Of The Week</option>
                                     </select>
                                </div>
                                 <div class="form-group">
                                     <label for="inputslidercaption">Status</label>
                                     <select name="status" class="form-control">
                                        
                                          <option value="1" <?php echo set_select('status  ',  '1'); ?>>Active</option>
                                        <option value="0" <?php echo set_select('status ',  '0'); ?>>Inactive</option>
                                     </select>
                                </div>
                               
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="<?php echo set_value('meta_title');?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="<?php echo set_value('meta_keyword');?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo set_value('meta_descrip ');?></textarea>
                                    <?php echo form_error('meta_descrip', '<div class="error">', '</div>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="<?php echo set_value('canonical_tag ');?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
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
    
    <script type="text/javascript" language="javascript">
    function  change_city_type(currval){
	 
	 if(currval=='image')
	 {
		 $('#imgbx').show();
		 $('#youtubebx').hide();
	 }
	 else
	 {
		 $('#imgbx').hide();
		 $('#youtubebx').show();
	 }
	
	}
    
    
    </script>
    