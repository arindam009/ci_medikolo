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

                           <h3> Add Course <a href="<?php echo base_url();?>admin/courses" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                
                                <div class="col-lg-8">
                                <h3>Course Information</h3><br />

                                <div class="form-group">
                                    <label for="inputslidercaption">Course Name</label>
                                    <input name="course_name" type="text" class="form-control" id="" placeholder="Enter Course Name">
                                </div>
                               <div class="form-group">
                                    <label for="inputslidercaption">Course Slug</label>
                                    <input name="course_slug" type="text" class="form-control" id="" placeholder="Enter Course Slug">
                                </div>
								
                                <div class="form-group">
                                    <label for="inputslidercaption">Course Description</label>
                                    <textarea name="course_description"  class="form-control editor_big" id="" placeholder="Enter Description"></textarea>
                                </div>
                               
                                 <div class="form-group">
                                    <label for="inputslidercaption">Course Duration</label>
                                    <input name="course_duration" type="text" class="form-control" id="" placeholder="Enter Course Duration">
                                </div>

                                 <div class="form-group">
                                    <label for="inputslidercaption">Course Duration Description</label>
                                    <textarea name="course_duration_desc"  class="form-control editor_big" id="" placeholder="Enter Description"></textarea>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Course Fees</label>
                                    <input name="course_fees" type="text" class="form-control" id="" placeholder="Enter Course Fees">
                                </div>
                                
                                   <div class="form-group">
                                    <label for="inputslidercaption">Course Type</label>
                                    <select name="course_type"  class="form-control" id="">
                                    <option value="">--Select Course Type--</option>
                                    <option value="online">Online</option>
                                    <option value="classroom">Class Room</option>
                                    <option value="both">Both</option>
                                    </select>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="inputslidercaption">Upcoming Batch</label>
                                    <select name="is_upcoming"  class="form-control" id="" onchange="upcoming_batch(this.value);">
                                    <option value="">--Select Upcoming Batch--</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group" id="batchtime" style="display:none;">
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
                                    <option value="">--Select Is Latest--</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                
                                
                                
                                
                                <div class="form-group">

                                    <label for="inputsliderimage">Image</label>

                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />

                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>

                                </div>
                                <div class="col-lg-4">
                                <h3>Select(You may like it)</h3><br />
                                <?php foreach($alldata_row as $alldata){?>
                                
                                <div class="checkbox">
                                      <label><input name="like_chk[]" value="<?php echo $alldata->id;?>" type="checkbox"><?php echo $alldata->course_name;?></label>
                                    </div>
                                <?php } ?>
                                </div>
                                
                                <div class="col-lg-12">
                                
                                        <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                  
                                  <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
								
                                   <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"></textarea>
                                </div>
                               
                                  <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                	
                                    
                                    <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robotindex"  value="index" type="radio" >&nbsp;&nbsp;
                                     No Index <input name="robotindex"  value="noindex" type="radio"><br />
                                    Follow <input name="robot_index"  value="follow" type="radio">&nbsp;&nbsp;
                                     No Follow <input name="robot_index"  value="nofollow" type="radio">
                                </div>			
                                
                                
                                <div class="form-group">
                                <button type="submit" class="btn btn-info">Submit</button>
                                </div>
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