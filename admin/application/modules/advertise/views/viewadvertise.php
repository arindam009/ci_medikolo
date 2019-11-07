<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Advertisement
                        
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/advertise/addadvertise">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
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
                            
<script type="text/javascript">

function orderser(ordrval,orderid){
  
  var table  = 'tbl_advertisement';
  var ordrvalue = ordrval;
    
     $.ajax({
     method:'POST',
     url:"<?php echo base_url(); ?>"+"admin/order/data_submit",
     data:{orderid:orderid,ordrval:ordrvalue,table:table},
    success:function(data){
      alert('Successfully Ordered');
      window.location.href= '<?php echo base_url(); ?>admin/advertise/viewadvertise';
  
      }
     })
  
  } 
</script>  
						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Oder Id</th>
                                    <th>Page Name</th>
									<th>Placement</th>
									<th>Third Party</th>
									<th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php $i=0;
								foreach($advertise as $advertisement) { $i++;?>
                                <tr class="">
								
								<td><?php echo $i;?></td>
									<td><input name="orderfld[]" id="orderfld[]" type="text" value="<?php echo $advertisement->orderid;?>"  style="width:35px; text-align:center;" onBlur="orderser(this.value,<?php echo $advertisement->id;?>);"/></td>
                                    <td><?php echo $advertisement->title;?></td>
                                    <td><?php echo $advertisement->placement;?></td>
									<td><?php  if($advertisement->is_third_party==0){ echo 'No';}else{ echo 'Yes';}?></td>
									<td class="img_data"><img  src="<?php echo base_url()?>uploads/advertise_image/<?php echo $advertisement->images;?>" height="75" width="100";></td>
										
                                    <td class="center">

                                    <?php  if($advertisement->status==0) { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/advertise/active/<?php echo $advertisement->id;?>" class="btn btn-danger">Inactive </a>
                                     <?php } else if($advertisement->status==1){?>
                                       <a href="<?php echo base_url();?>admin/advertise/inactive/<?php echo $advertisement->id;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/advertise/editadvertise/<?php echo $advertisement->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $advertisement->id;;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                    </td>
                                   
                                </tr>
								<?php } ?>	
                                
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
  function myJsFunc_comdel(dataid,dataimg)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/advertise/delete_advertise/"+dataid+'/'+dataimg;
    }
  }
</script>      