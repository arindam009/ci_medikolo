<section id="main-content">



        <section class="wrapper">



        <!-- page start-->







        <div class="row">



            <div class="col-sm-12">



                <section class="panel">



                    <header class="panel-heading">



                        <h3>Product



                        



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



                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/product/add">



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

    

    var table  = 'courses_mng';

    var ordrvalue = ordrval;

        

         $.ajax({

         method:'POST',

         url:"<?php echo base_url(); ?>"+"admin/order/data_submit",

         data:{orderid:orderid,ordrval:ordrvalue,table:table},

        success:function(data){

            alert('Successfully Ordered');

            window.location.href= '<?php echo base_url(); ?>admin/courses';

    

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

                                    <th>Course Name</th>

                                    <th>Course Slug</th>

                                    <th>Deuration</th>

                                    <th>Fees</th>

                                    <th>Image</th>



                                    <th>Sequence Home</th>



                                    <th>Action</th>



                                    



                                </tr>



                                </thead>



                                <tbody>



                                <?php 



                                $i=1;



                                foreach($alldata_row as $alldata) { ?>



                                <tr class="">



                                



                                    <td><?php echo $i;?></td>

                                     <td><input name="orderfld[]" id="orderfld[]" type="text" value="<?php echo $alldata->orderid;?>"  style="width:35px; text-align:center;" onBlur="orderser(this.value,<?php echo $alldata->id;?>);"/></td>



                                    <td><?php echo $alldata->course_name;?></td>

                                    <td><?php echo $alldata->course_slug;?></td>

                                     <td><?php echo $alldata->course_duration;?></td>

                                      <td><?php echo $alldata-> course_fees;?></td>



                                    <td class="img_data"><img  src="<?php echo base_url()?>uploads/courses_image/<?php echo $alldata->image_src;?>" height=100px;width=100px;></td>



                                    <td class="center">



                                    <?php  if($alldata->status=="0") { ?>

                                    

                                    <a href="<?php base_url();?>courses/featuredstatus/<?php echo $alldata->id;?>" class="btn btn-danger">Normal </a>

                                     <?php } else if($alldata->status=="1"){?>

                                       <a href="<?php base_url();?>courses/inactivestatus/<?php echo $alldata->id;?>" class="btn btn-success">Featured </a>

                                     <?php } ?>

                                       

                                    </td>



                                    <td>



                                    <a class="edit_data" href="<?php echo base_url();?>admin/courses/editcourses/<?php echo $alldata->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 



                                    <a class="delete_data" onclick="myJsFunc_comdel(<?php echo $alldata->id;?>,'<?php echo base64_encode($alldata->image_src);?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>



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



  function myJsFunc_comdel(dataid,dataimg)



  {



    if (confirm("Are you sure that you want to delete the data?"))



    {



    window.location.href = "<?php echo base_url()?>admin/courses/delete_data/"+dataid+'/'+dataimg;



    }



  }



</script>      