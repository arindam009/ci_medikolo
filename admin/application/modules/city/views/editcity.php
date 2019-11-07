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
                           <h3> Edit city <a href="<?php echo base_url();?>admin/city" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($single_data as $singledata) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                
                                   <div class="form-group">
                                    <label for="inputslidercaption">City Name</label>
                                    <input name="city_name" type="text" class="form-control" value="<?php echo $singledata->city_name;?>" id="inputslidercaption" placeholder="Enter City Name">
                                </div>
								  <div class="form-group">
                                    <label for="inputslidercaption">Area Name</label>
                                    <input name="area_name" type="text" class="form-control" value="<?php echo $singledata->area_name;?>"  id="inputslidercaption" placeholder="Enter Area Name">
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