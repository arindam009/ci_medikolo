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

                           <h3> Edit Courses <a href="<?php echo base_url();?>admin/courses" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

							<?php foreach($single_data as $singledata) { ?>

                                <form role="form" method="POST" action="" enctype="multipart/form-data">


                                    <div class="col-lg-8">
                                <h3>Course Information</h3><br />

                                <div class="form-group">
                                    <label for="inputslidercaption">Course Name</label>
                                    <input name="course_name" value="<?php echo $singledata->course_name;?>" type="text" class="form-control" id="" placeholder="Enter Course Name">
                                </div>
                                
                                   <div class="form-group">
                                    <label for="inputslidercaption">Course Slug</label>
                                    <input name="course_slug" value="<?php echo $singledata->course_slug;?>" type="text" class="form-control" id="" placeholder="Enter Course Slug">
                                </div>

								
                                <div class="form-group">
                                    <label for="inputslidercaption">Course Description</label>
                                    <textarea name="course_description"  class="form-control editor_big" id="" placeholder="Enter Description"><?php echo $singledata->course_description;?></textarea>
                                </div>
                               
                                 <div class="form-group">
                                    <label for="inputslidercaption">Course Duration</label>
                                    <input name="course_duration" value="<?php echo $singledata->course_duration;?>" type="text" class="form-control" id="" placeholder="Enter Course Duration">
                                </div>

                                 <div class="form-group">
                                    <label for="inputslidercaption">Course Duration Description</label>
                                    <textarea name="course_duration_desc"  class="form-control editor_big" id="" placeholder="Enter Description"><?php echo $singledata->course_duration_desc;?></textarea>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Course Fees</label>
                                    <input name="course_fees" value="<?php echo $singledata->course_fees;?>" type="text" class="form-control" id="" placeholder="Enter Course Fees">
                                </div>
                                
                                   <div class="form-group">
                                    <label for="inputslidercaption">Course Type <?php echo $singledata->course_type;?></label>
                                    <select name="course_type"  class="form-control" id="">
                                   
                                    <?php if($singledata->course_type == 'online'){?>
                                    <option value="online" selected="selected">Online</option>
                                    <?php } else if($singledata->course_type == 'classroom'){?>
                                    <option value="classroom" selected="selected">Class Room</option>
                                    <?php } else if($singledata->course_type == 'both'){?>
                                     <option value="both" selected="selected">Both</option>
                                    <?php } ?>
                                    <option value="online">Online</option>
                                    <option value="both">Both</option>
                                    <option value="classroom">Class Room</option>
                                    
                                    </select>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Upcoming Batch</label>
                                    <select name="is_upcoming"  class="form-control" id="" onchange="upcoming_batch(this.value);">
                                     <?php if($singledata->is_upcoming == 'yes'){?>
                                     <option value="yes" selected="selected">Yes</option>
                                     <?php } else if($singledata->is_upcoming == 'no'){?>
                                      <option value="no" selected="selected">No</option>
                                      <?php } ?>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                               
                                <div class="form-group" id="batchtime" <?php if($singledata->is_upcoming != 'yes'){?> style="display:none;" <?php } ?>>
                                  <?php if($singledata->is_upcoming == 'yes'){?>
                                 <?php foreach($batch_all_data as $batchalldata){?>
                                 <div class="form-group">
                                 <label for="inputslidercaption">Batch Date Time</label>
                                 <input name="batch_time_all[]" type="text" class="form-control" value="<?php echo $batchalldata->batch_time_all ;?>"  placeholder="Enter Batch Time"></div>
                                 <?php } ?>
                                 <?php } ?>
                                  <div id="field_batchtime">
                                    <div id="field_batchtime0">
                                      
                                    </div>
                               </div>
                                <label for="inputslidercaption">Batch Date Time</label><br />
                                <button id="add_batchtime" name="add-more" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Add</button>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Is Latest</label>
                                    <select name="is_latest"  class="form-control" id="">
                                     <?php if($singledata->is_latest == 'yes'){?>
                                     <option value="yes" selected="selected">Yes</option>
                                     <?php } else if($singledata->is_latest == 'no'){?>
                                      <option value="no" selected="selected">No</option>
                                      <?php } ?>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                
                                
                                
                                
                                <div class="form-group">

								<img src="<?php echo base_url()?>uploads/courses_image/<?php  echo $singledata->image_src?>" height=100px; width=100px;><br />

                                    <label for="inputsliderimage">Course Image</label><br />

                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />

                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>

                                </div>
                                <div class="col-lg-4">
                                <h3>Select(You may like it)</h3><br />
                                <?php foreach($alldata_row as $alldata){
									
									$relatedprd = explode(',',$singledata->related_courses);
									
									?>
                                
                                <div class="checkbox">
                                      <label><input name="like_chk[]" value="<?php echo $alldata->id;?>" type="checkbox"
									  <?php foreach($relatedprd as $sngrtdata){
										  if($alldata->id==$sngrtdata)
										  {
										  ?>
                                      checked="checked"
                                      <?php } } ?>
                                      ><?php echo $alldata->course_name;?></label>
                                    </div>
                                <?php } ?>
                                </div>
                                
                              
                                    
                                  

                               
                              <div class="col-lg-12">
                              <h3>SEO MODULE</h3>
                              
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
                                    Index <input name="robotindex"  value="index" type="radio" <?php if($singledata->robotindex=='index'){?> checked="checked" <?php } ?>  >&nbsp;&nbsp;
                                     No Index <input name="robotindex"  value="noindex" type="radio"  <?php if($singledata->robotindex=='noindex'){?> checked="checked" <?php } ?> ><br />
                                    Follow <input name="robot_index"  value="follow" type="radio" <?php if($singledata->robot_index=='follow'){?> checked="checked" <?php } ?>  >&nbsp;&nbsp;
                                     No Follow <input name="robot_index"  value="nofollow" type="radio"  <?php if($singledata->robot_index=='nofollow'){?> checked="checked" <?php } ?> >
                                </div>			
                              
                              <div class="form-group">
                              
                                  <button type="submit" class="btn btn-info">Submit</button>
                                  </div>
                               </div>
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