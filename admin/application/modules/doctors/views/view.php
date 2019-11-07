
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Doctors 
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
                                   
                                </div>
                                <div class="btn-group pull-right">
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/doctors/add">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                  <!--   <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            
<script type="text/javascript">

function orderser(ordrval,orderid){
  
  var table  = 'tbl_doctors';
  var ordrvalue = ordrval;
     $.ajax({
     method:'POST',
     url:"<?php echo base_url(); ?>"+"admin/order/data_submit",
     data:{orderid:orderid,ordrval:ordrvalue,table:table},
    success:function(data){
      alert('Successfully Ordered');
      window.location.href= '<?php echo base_url(); ?>admin/doctors';
  
      }
     })
  
  } 
</script>  
						
            <div class="space15"></div>
       <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                   <thead>
                      <tr>
                        <th>SL No.</th>
                        <th>Oder</th>
                        <th>Name</th>
						<th>Department</th>
						<th>Email</th>
						<th>Address</th>
						<th>City</th>
						<th>Pincode</th>
						<th>State</th>
						<th>Phone</th>
						<th>Alter Phone</th>
      					<th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
								<?php $i=0;
                
								foreach($data_all as $res_data) { $i++;?>
                                <tr class="">
								
								<td><?php echo $i;?></td>
									<td><input name="orderfld[]" id="orderfld[]" type="text" value="<?php echo $res_data->orderid;?>"  style="width:35px; text-align:center;" onBlur="orderser(this.value,<?php echo $res_data->id;?>);"/></td>
                                      <td><?php echo $res_data->name;?></td>
                                      <td>
									  <?php  
									    foreach($dept_all as $dept){ 
									  
									      if($res_data->dept_id==$dept->id)
										  {
											 echo $dept->title; 
										  }
										}
									  ?>
									  </td>
									  <td><?php echo $res_data->email;?></td>
									  <td><?php echo $res_data->address;?></td>
									  <td><?php echo $res_data->city;?></td>
									  <td><?php echo $res_data->pincode;?></td>
									  <td><?php echo $res_data->state;?></td>
									  <td><?php echo $res_data->phone;?></td>
									  <td><?php echo $res_data->alt_phone;?></td>
									  
									  
									  <td class="img_data list_img_box">
									  <?php if($res_data->img==true){ ?>
                                        <img  src="<?php echo base_url()?>uploads/doctors/<?php echo $res_data->img;?>">
									  <?php } else{ ?>
									  <?php echo "No Image";?>
									  <?php } ?>
                                      </td>
								
								
										
                                    <td class="center">

                                    <?php  if($res_data->status==0) { ?>
                                    
                                   <a href="<?php echo base_url();?>admin/doctors/active/<?php echo $res_data->id;?>" class="btn btn-danger">Inactive 
                                   </a>
                                    <?php } else if($res_data->status==1){?>
                                       <a href="<?php echo base_url();?>admin/doctors/inactive/<?php echo $res_data->id;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/doctors/edit/<?php echo $res_data->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $res_data->id;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
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
  function myJsFunc_comdel(dataid)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/doctors/delete_data/"+dataid;
    }
  }
</script>      