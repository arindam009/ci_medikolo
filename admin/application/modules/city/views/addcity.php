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
                           <h3> Add city / Area<a href="<?php echo base_url();?>admin/city" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                   
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">City Name</label>
                                    <input name="city_name" type="text" class="form-control" id="inputslidercaption" placeholder="Enter City Name">
                                </div>
								  <div class="form-group">
                                    <label for="inputslidercaption">Area Name</label>
                                    <input name="area_name" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Area Name">
                                </div>
								
                               
                               
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                        
                        
                        <div class="panel-body">
                         <h3> OR CSV UPLOAD</h3>
                            <div>
                                <form role="form" name="csvupld" method="POST" action="<?php echo site_url();?>admin/city/csvupload" enctype="multipart/form-data">
                                   
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Upload CSV</label>
                                     <input type="file" class="form-control" name="csvfile" id="csvfile"  align="center"/>
                                 <br />
<br />
                              <img src="<?php echo site_url();?>/themes/admin/images/csvsample.png" />
                                </div>
								
								
                               
                               
                                
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
    