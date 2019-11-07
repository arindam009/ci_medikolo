<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Recipe
                        
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/recipe/addrecipe">
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
	
	var table  = 'tbl_recipe';
	var ordrvalue = ordrval;
		
		 $.ajax({
		 method:'POST',
		 url:"<?php echo base_url(); ?>"+"admin/order/data_submit",
		 data:{orderid:orderid,ordrval:ordrvalue,table:table},
		success:function(data){
			alert('Successfully Ordered');
			window.location.href= '<?php echo base_url(); ?>admin/recipe/viewrecipe';
	
			}
		 })
	
	}			
		



</script>						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Order</th>
                                    <th>Name</th>
									<th>Code</th>
									<th>Difuculty</th>
									<th>Recipe Type</th> 
									<th>Image</th>
									<th>Approved</th>
									<th>Feature</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php

                                                         
                                 $i=0;
								foreach($recipe_all as $result_recipie) {
								 $i++;
								 ?>
                                <tr class="">
								
								<td><?php echo $i;?></td>
								  <td><input name="orderfld[]" id="orderfld[]" type="text" value="<?php echo $result_recipie->orderid;?>"  style="width:35px; text-align:center;" onBlur="orderser(this.value,<?php echo $result_recipie->id;?>);"/></td>
                                    <td>Name:&nbsp;<?php echo $result_recipie->recipe_name;?><br>
                                    	Created On:&nbsp;<?php echo $result_recipie->created_on;?><br>
                                    	Approve On:&nbsp;<?php echo $result_recipie->approve_on;?>
                                    </td>
                                    <td><?php echo $result_recipie->recipe_code;?></td>
									<td><?php echo $result_recipie->dificulty_name;?></td>
									<td class="center">

                                    <?php  if($result_recipie->recipe_type=="recipe of the month") { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/recipe/week/<?php echo $result_recipie->id;?>" class="btn btn-danger">Month</a>
                                     <?php } else if($result_recipie->recipe_type=="recipe of the week"){?>
                                       <a href="<?php echo base_url();?>admin/recipe/month/<?php echo $result_recipie->id;?>" class="btn btn-success">Week</a>
                                     <?php }else{ ?>
                                     <a href="<?php echo base_url();?>admin/recipe/month/<?php echo $result_recipie->id;?>" class="btn btn-danger">Normal</a>
                                     <?php } ?>
                                       
                                    </td>
									<td class="img_data"><img  src="<?php echo base_url()?>uploads/recipe_image/<?php echo $result_recipie->feature_image?>" height=100px;width=100px;></td>	
									<td class="center">

                                    <?php  if($result_recipie->is_approved=="0") { ?>
                                    <a href="<?php echo base_url();?>admin/recipe/approve/<?php echo $result_recipie->id;?>" class="btn btn-danger">Not Approved</a>
                                     <?php } else if($result_recipie->is_approved=="1"){?>
                                       <a href="<?php echo base_url();?>admin/recipe/reject/<?php echo $result_recipie->id;?>" class="btn btn-success">Approved </a>
                                     <?php } ?>
                                       
                                    </td>
                                    
                                    <td class="center">

                                    <?php  if($result_recipie->is_featured=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/recipe/featured/<?php echo $result_recipie->id;?>" class="btn btn-danger">Normal</a>
                                     <?php } else if($result_recipie->is_featured=="1"){?>
                                       <a href="<?php echo base_url();?>admin/recipe/normal/<?php echo $result_recipie->id;?>" class="btn btn-success">Featured </a>
                                     <?php } ?>
                                       
                                    </td>
                                    
                                   <td class="center">
                                   
                                    <?php  if($result_recipie->status=="0") { ?>
                                    <a href="<?php echo base_url();?>admin/recipe/active/<?php echo $result_recipie->id;?>" class="btn btn-danger">Inactive</a>
                                     <?php } else if($result_recipie->status=="1"){?>
                                       <a href="<?php echo base_url();?>admin/recipe/inactive/<?php echo $result_recipie->id;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                    
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/recipe/editrecipe/<?php echo $result_recipie->recipe_code;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $result_recipie->id;;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
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
    window.location.href = "<?php echo base_url()?>admin/recipe/delete_recipe/"+dataid+'/'+dataimg;
    }
  }
</script>      