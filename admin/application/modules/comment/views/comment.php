<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Comments Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php $this->session->flashdata('success_msg');?>
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
                                    <!-- <a id="editable-sample_new" class="btn btn-primary" href="<?php //echo base_url()?>admin/blog/add">
                                        Add New <i class="fa fa-plus"></i>
                                    </a> -->
                                    &nbsp;&nbsp;
                                    
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
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                     <th>Type</th>
                                     <th>Rate</th>                                     
                                     <th>Description</th>  
                                    <th>title</th>
                                    <th>Status</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach($allcomment_row as $alldata) { ?>
                                <tr class="">
                                     <td><?php echo $alldata->type; ?></td>
                                    <td><?php echo $alldata->rate; ?></td>
                                    <td><?php echo $alldata->description; ?></td>
                                    <td><?php echo $alldata->title; ?></td>
                                    
                                      
                                    
                                    <td class="center">

                                    <?php  if($alldata->status=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/comment/active/<?php echo $alldata->id;?>" class="btn btn-danger">Inactive </a>
                                     <?php } else if($alldata->status=="1"){?>
                                       <a href="<?php echo base_url();?>admin/comment/inactive/<?php echo $alldata->id;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                   
                                </tr>
								<?php } ?>	
                                
                                </tbody>
                            </table>
                            
                            
                            <br />
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
         