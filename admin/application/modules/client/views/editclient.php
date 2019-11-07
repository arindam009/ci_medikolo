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
                           <h3> Edit Client <a href="<?php echo base_url();?>admin/client" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($single_data as $singledata) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputslidercaption">Title</label>
                                    <input name="title" value="<?php echo $singledata->title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Title">
                                </div>
								
                               
                                <div class="form-group">
								<img src="<?php echo base_url()?>uploads/client_image/<?php  echo $singledata->image_src?>" height=100px; width=100px;>
                                    <label for="inputsliderimage">Slide Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
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