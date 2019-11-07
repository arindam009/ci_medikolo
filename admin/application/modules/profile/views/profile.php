<section id="main-content">

        <section class="wrapper">

        <!-- page start-->



        <div class="row">

            <div class="col-sm-12">
			 <?php if($this->session->flashdata('succ_msg')!="") { ?>

						 <div class="clearfix"></div>

<div class="alert alert-success">

  <strong>success!</strong> <?=$this->session->flashdata('succ_msg');?>

</div>

  <?php } ?>

                <section class="panel">

                    <header class="panel-heading">

                        <h3>Profile Management

                        

                        <span class="tools pull-right">

                            <a href="javascript:;" class="fa fa-chevron-down"></a>

                            <a href="javascript:;" class="fa fa-times"></a>

                         </span></h3>

                       

                    </header>

                    <div class="panel-body" style="display: block;">

					 <?php if($this->session->flashdata('success_msg')!="") { ?>

                                             <div class="clearfix"></div>

                    <div class="alert alert-success">

                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>

                    </div>

                      <?php } ?>

                      

                       <?php if($this->session->flashdata('err_msg')!="") { ?>

                                             <div class="clearfix"></div>

                    <div class="alert alert-danger">

                      <strong>Success!</strong> <?=$this->session->flashdata('err_msg');?>

                    </div>

                      <?php } ?>

                        <div class="adv-table editable-table ">

                            <div class="clearfix">

                                <div class="btn-group">

                                    &nbsp;

                                </div>

                                <div class="btn-group pull-right">

                                  &nbsp;

                                </div>

                            </div>

						

                            <div class="space15"></div>
                           <?php foreach($alldata_row as $resdata){?>
                            
                           <div class="col-lg-6">
                            <h3>Profile Management</h3>

                           <div class="form-group">
                           <label>Full Name:</label><br />
                           <?php echo $resdata->f_name; ?>
                           </div>
                            <div class="form-group">
                           <label>Email:</label><br />
                           <?php echo $resdata->email; ?>
                           </div>
                              <div class="form-group">
                           <label>Mobile Number:</label><br />
                            <?php echo $resdata->mobile_primary; ?>
                           </div>
                            
                             
                           </div>
                           
                           
                         
                           
                           
                           <?php } ?> 
                         
                          <div class="col-lg-12">
                          <a href="<?php echo base_url();?>admin/profile/editprofile/1" class="btn btn-success">Edit Profile</a>&nbsp;&nbsp;
                          
                          <a href="<?php echo base_url();?>admin/profile/editpassword/1" class="btn btn-success">Edit Password</a>
                          </div>                           
 
                        </div>

                    </div>

                </section>

            </div>

        </div>

        <!-- page end-->

        </section>

    </section>

    

    

<script type="text/javascript">

  function myJsFunc_comdel(dataid,dataimg)

  {

    if (confirm("Are you sure that you want to delete the data?"))

    {

    window.location.href = "<?php echo base_url()?>admin/client/delete_data/"+dataid+'/'+dataimg;

    }

  }

</script>      