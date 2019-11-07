<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Feedback Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-contact">
                      <strong>Feedback </strong> <?=$this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Feedback!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                 
                                </div>
                                <div class="btn-group pull-right">
                                   <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>-->
                                </div>
                            </div>
						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Course Name</th>
                                     <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Query Type</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								$i=1;
								foreach($alldata_row as $alldata) { ?>
                                <tr class="">
								
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $alldata->name ; ?></td>
                                    <td><?php echo $alldata->email ; ?></td>
                                     <td><?php echo $alldata->course_name ; ?></td>
                                      <td><?php echo $alldata->rating ; ?></td>
                                    <td><?php echo $alldata->comment; ?></td>
                                    <td>
                                    <?php if($alldata->stat==3){ ?>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>admin/feedback/approve_data/<?php echo $alldata->comment_id;?>">Disapprove </a>
                                    <?php } else { ?>
                                     <a class="btn btn-success" href="<?php echo base_url();?>admin/feedback/dis_approve_data/<?php echo $alldata->comment_id;?>">Approved</a>
                                     <?php } ?>
                                    </td>
                                
                                    <td>
                                 
                                    <a class="delete_data" onclick="myJsFunc_comdel(<?php echo $alldata->comment_id;?>);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                    </td>
                                   
                                </tr>
								<?php $i++; } ?>	
                                
                                </tbody>
                            </table>
                            
                            
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    
<script type="text/javascript">
  function myJsFunc_comdel(dataid)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/feedback/delete_data/"+dataid;
    }
  }
</script>      