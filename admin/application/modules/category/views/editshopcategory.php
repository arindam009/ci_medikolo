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

                           <h3> Edit Category <a href="<?php echo base_url();?>admin/category/shop" class="btn btn-danger flotright">Back</a></h3>

                        </header>
                         <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><strong>General</strong></a></li>
    <li><a data-toggle="tab" href="#menu1"><strong>SEO Meta</strong></a></li>
  </ul>
                    <?php foreach($category as $single_category) { ?>
                         <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              

								<div class="form-group">

                                   <label for="inputslidercaption">Category Name</label>

                                    <input name="cat_name" type="text" class="form-control" value="<?php echo $single_category->cat_name;?>">

                                </div>
                                <div class="form-group">

                                   <label for="inputslidercaption">Category Slug</label>

                                    <input name="slug" type="text" class="form-control" value="<?php echo $single_category->slug;?>">

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption2">Is Parent</label>
                                    <select class="form-control" name="is_parent" id="is_parent">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if($single_category->is_parent==1){ echo "selected";}?>>Yes</option>
                                        <option value="0" <?php if($single_category->is_parent==0){ echo "selected";}?>>No</option>
                                    </select>

                                </div>
                                <div class="form-group" id="parent_category" <?php if($single_category->is_parent==1){?> style="display: none;<?php }?>">
                                    <label for="inputslidercaption3">Parent Category</label>
                                      <select class="form-control" name="parent_cat">
                                         <option value="">Select Option</option>
                                        <?php foreach ($allcategory as $c) { 
                                            if($c->id==$single_category->parent_cat){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }?>
                                             <option value="<?php echo $c->id;?>" <?php echo $selected;?>><?php echo $c->cat_name;?></option>
                                      <?php  } ?>
                                    </select>


                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption2">Description</label>

                                   <textarea name="description"   class="form-control editor_big" id="inputslidercaption" placeholder="Enter Description"><?php echo $single_category->description;?></textarea>

                                </div>



								 <div class="form-group">

                                    <label for="inputslidercaption">Short Order</label>

                                    <input name="order" type="text" class="form-control" value="<?php echo $single_category->orderid;?>">

                                </div>

                               

                                 <div class="form-group">

                                    <label for="inputslidercaption2">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if($single_category->status==1){echo "selected";}?>>Active</option>
                                        <option value="0" <?php if($single_category->status==0){echo "selected";}?>>Inactive</option>
                                    </select>

                                </div>
                            

                                

                                

                                <div class="form-group">

								<img src="<?php echo base_url()?>uploads/category_image/<?php echo $single_category->cat_img?>" height=100px; width=100px;>

                                    <label for="inputsliderimage">Slide Image</label>

                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />

									<input name="prev_link" type="hidden" value="<?php echo $single_category->cat_img?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">

                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                 </div>
<div id="menu1" class="tab-pane fade">
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="<?php echo $single_category->meta_title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="<?php echo $single_category->meta_keyword;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo $single_category->meta_descrip;?></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="<?php echo $single_category->canonical_tag;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robot_index"  value="index" type="radio" <?php if ($single_category->robot_index == 'index') {echo ' checked ';}?>>&nbsp;&nbsp;
                                     No Index <input name="robot_index"  value="noindex" type="radio" <?php if ($single_category->robot_index == 'noindex') {echo ' checked ';}?>><br />
                                    Follow <input name="follow"  value="follow" type="radio" <?php if ($single_category->follow == 'follow') {echo ' checked ';}?>>&nbsp;&nbsp;
                                     No Follow <input name="follow"  value="nofollow" type="radio" <?php if ($single_category->follow == 'nofollow') {echo ' checked ';}?>>
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