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
                           <h3> Edit Blog <a href="<?php echo base_url();?>admin/blog" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><strong>General</strong></a></li>
    <li><a data-toggle="tab" href="#menu1"><strong>SEO Meta</strong></a></li>
  </ul>
                        <?php foreach($single_data as $singledata) { ?>
                             <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                          <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
							
                               
                                
                                   <div class="form-group">
                                    <label for="inputslidercaption">Blog Category</label>
                                    <select class="form-control" name="blog_category">
                                        <option>Select Category</option>
                                        <?php foreach($category as $c) { ?>
                                 <option value="<?php echo $c->id;?>" <?php if($c->id==$singledata->blog_category){echo "selected";}?>><?php echo $c->cat_name;?></option>
                                       <?php } ?>
                                       
                                    </select>
                                </div>
								  <div class="form-group">
                                    <label for="blog_name">Blog Name</label>
                                    <input name="blog_name" value="<?php echo $singledata->blog_name;?>" type="text" class="form-control" placeholder="Enter Blog Name">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input name="slug" value="<?php echo $singledata->slug;?>" type="text" class="form-control" placeholder="Enter Blog Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Order</label>
                                    <input name="order" value="<?php echo $singledata->orderid;?>" type="text" class="form-control" placeholder="Enter Short order">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Blog Description</label>
                                   <textarea name="blog_description" class="form-control editor_big"><?php echo $singledata->blog_description;?></textarea>
                                </div>
                                 <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/blog_image/<?=$singledata->feature_image?>" height=100px; width=100px;>
                                    <label for="inputslidercaption">Feature Image</label>
                                     <input type="file" name="image_src" accept="image/*" />
                                     <input name="prev_link" type="hidden" value="<?=$singledata->feature_image?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                     <label for="inputslidercaption">Is feature Blog</label>
                                     <select name="is_feature_blog" class="form-control">
                        <option value="1" <?php if($singledata->is_feature_blog==1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($singledata->is_feature_blog==0){echo "selected";}?>>No</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                     <label for="inputslidercaption">Blog Type</label>
                                     <select name="blog_type" class="form-control">
                                      <option value="normal" <?php if($singledata->blog_type=="Normal"){echo "selected";}?>>Normal</option>
                                         <option value="articale of the month" <?php if($singledata->blog_type=="articale of the month"){echo "selected";}?>>Articale Of The Month</option>
                                         <option value="articale of the week" <?php if($singledata->blog_type=="articale of the week"){echo "selected";}?>>Articale Of The Week</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                     <label for="inputslidercaption">Status</label>
                                     <select name="status" class="form-control">
                                         <option value="1" <?php if($singledata->status==1){echo "selected";}?>>Active</option>
                                         <option value="0" <?php if($singledata->status==0){echo "selected";}?>>Inactive</option>
                                     </select>
                                </div>
                                 </div>
                                 <div id="menu1" class="tab-pane fade">
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="<?php echo $singledata->meta_title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="<?php echo $singledata->meta_keyword;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo $singledata->meta_descrip;?></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="<?php echo $singledata->canonical_tag;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robot_index"  value="index" type="radio" <?php if ($singledata->robot_index == 'index') {echo ' checked ';}?>>&nbsp;&nbsp;
                                     No Index <input name="robot_index"  value="noindex" type="radio" <?php if ($singledata->robot_index == 'noindex') {echo ' checked ';}?>><br />
                                    Follow <input name="follow"  value="follow" type="radio" <?php if ($singledata->follow == 'follow') {echo ' checked ';}?>>&nbsp;&nbsp;
                                     No Follow <input name="follow"  value="nofollow" type="radio" <?php if ($singledata->follow == 'nofollow') {echo ' checked ';}?>>
                                </div>  
                                 </div>
                                    </div>
                            
                            

                        </div>
                        <div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>

                            </form>
                        <?php } ?>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    <script type="text/javascript" language="javascript">
    function  change_city_type(currval){
	 alert(currval);
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