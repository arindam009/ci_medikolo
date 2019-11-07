<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Category
                        
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/category/addblogcategory">
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
	
	var table  = 'tbl_category';
	var ordrvalue = ordrval;
		
		 $.ajax({
		 method:'POST',
		 url:"<?php echo base_url(); ?>"+"admin/order/data_submit",
		 data:{orderid:orderid,ordrval:ordrvalue,table:table},
		success:function(data){
			alert('Successfully Ordered');
			window.location.href= '<?php echo base_url(); ?>admin/category/blog';
	
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
                                    <th>Category Name</th>
									                  <th>Parent Category</th>
								                  	<th>Category Icon</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php  $i=0;
                                foreach($category as $single_category) { $i++;?>
                                <tr class="">
								<?php  if($single_category->status=="1") { $stat="Active";} else {$stat="Inactive";} ?>
                                 <td><?php echo $i?></td>
                                  <td><input name="orderfld[]" id="orderfld[]" type="text" value="<?php echo $single_category->orderid;?>"  style="width:35px; text-align:center;" onBlur="orderser(this.value,<?php echo $single_category->id;?>);"/></td>
                                    <td><?php echo $single_category->cat_name?></td>
                                    <td><?php foreach ($category as $parent) {
                                       if($parent->id==$single_category->parent_cat){
                                        echo $parent->cat_name;
                                       }
                                    } ?></td>
									<td class="caticon"><?php echo $single_category->cat_icon?></td> 
                                    <td class="img_data"><img  src="<?php echo base_url()?>uploads/category_image/<?php echo $single_category->cat_img?>" height=100px;width=100px;></td>
                                    <td class="center">

                                    <?php  if($single_category->status=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/category/active/<?php echo $single_category->id;?>" class="btn btn-danger">Inactive </a>
                                     <?php } else if($single_category->status=="1"){?>
                                       <a href="<?php echo base_url();?>admin/category/inactive/<?php echo $single_category->id;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/category/editblog/<?php echo $single_category->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel(<?php echo $single_category->id;?>,'<?php echo base64_encode($single_category->cat_icon);?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
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
    window.location.href = "<?php echo base_url()?>admin/category/delete_blog/"+dataid+'/'+dataimg;
    }
  }
</script>      