<style>
    .tabs-left {
  border-bottom: none;
  border-right: 1px solid #ddd;
}

.tabs-left>li {
  float: none;
 margin:0px;
  
}

.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
  background:#f90;
  border:none;
  border-radius:0px;
  margin:0px;
}
.nav-tabs>li>a:hover {
    /* margin-right: 2px; */
    line-height: 1.42857143;
    border: 1px solid transparent;
    /* border-radius: 4px 4px 0 0; */
}
.tabs-left>li.active>a::after{content: "";
    position: absolute;
    top: 10px;
    right: -10px;
    border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  
  border-left: 10px solid #f90;
    display: block;
    width: 0;}

</style>
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
                           <h3> Add Product <a href="<?php echo base_url();?>admin/product" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><strong>General</strong></a></li>
    <li><a data-toggle="tab" href="#menu1"><strong>SEO Meta</strong></a></li>
  </ul>
   <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                        	 <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">          

                                <div class="col-lg-8">
                                <h3>Product Information</h3><br />
                                <div class="form-group">
                                    <label for="inputslidercaption">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" id="" placeholder="Enter Product Name">
                                </div>						

                                <div class="form-group">
                                    <label for="inputslidercaption">Short Description</label>
                                    <textarea name="product_description"  class="form-control" id="" placeholder="Enter Description"></textarea>
                                </div>                              
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="course_duration_desc"  class="form-control editor_big" id="" placeholder="Enter Description"></textarea>

                                </div>   
                                 <div class="form-group">
                                    <label for="inputslidercaption">Regular Price</label>
                                    <input type="text" name="regular_price" class="form-control">

                                </div>   
                                <div class="form-group">
                                    <label for="inputslidercaption">Sale Price</label>
                                    <input type="text" name="sale_price" class="form-control">

                                </div>  
                                <div class="form-group">
                                    <label for="inputslidercaption">Product SKU</label>
                                    <input type="text" name="sku" class="form-control">

                                </div> 
                                <div class="form-group">
                                    <label for="inputslidercaption">Weight</label>
                                    <input type="text" name="weight" class="form-control">

                                </div>   
                                 <div class="form-group">
                                    <label for="inputslidercaption">Length</label>
                                    <input type="text" name="length" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Width</label>
                                    <input type="text" name="width" class="form-control">

                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Height</label>
                                    <input type="text" name="height" class="form-control">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Shipping Class</label>

                                     <select name="shipping_class"  class="form-control" id="">
                                        <option>--Select Shipping Class--</option>
                                        <?php foreach ($all_shipping_class as $shipping) { ?>
                                           <option value="$shipping->id"><?php echo $shipping->class_name;?></option>
                                    <?php    } ?>
                                     </select>

                                </div>
                                 <div class="form-group">
                                 	 <label for="inputslidercaption">Purchase Note</label>
                                 	<textarea name="purchase_note"  class="form-control" id=""></textarea>
                                 </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Stock Status</label>

                                    <select class="form-control" name="stock_status">
                                        <option value="3">In stock</option>
                                        <option value="2">Out of stock</option>
                                    </select>

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption">Tax Group</label>

                                    <select class="form-control" name="stock_status">
                                        <option>--Select Tax Group--</option>
                                        <?php foreach ($all_tax_group as $tax) { ?>
                                           <option value="$tax->id"><?php echo $tax->group_name;?></option>
                                    <?php    } ?>
                                    </select>

                                </div>

                                
                                </div> 

              

                                <div class="col-lg-4">

                                <h3></h3><br /><br /><br />
                                
                                
                                 <label for="inputslidercaption">Product Category</label><br />
                                 <ul>
                                 <?php foreach ($all_categories as $category) {?>
                                   <li><label><input type="checkbox" name="">shubhra5</label></li>
                               <?php   }  ?>       
                               </ul>        
                              
                                <div class="form-group">



                                    <label for="inputsliderimage">Fetured Image</label>



                                    <input type="file" name="feature_image_src" id="inputsliderimage" accept="image/*" />



                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                <div class="form-group">



                                    <label for="inputsliderimage">Gallery Image</label>



                                    <input type="file" name="gallery_image_src[]" id="inputsliderimage" multiple="" accept="image/*" />



                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                </div>    
                                   </div>
                             <div id="menu1" class="tab-pane fade">   
                             	 <div class="form-group">
                                    <label for="inputslidercaption">Meta Title</label>
                                    <input name="meta_title"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Title">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Meta Keyword</label>
                                    <input name="meta_keyword"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Meta Description</label>
                                    <textarea name="meta_descrip" rows="5"    class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"></textarea>
                                    <?php echo form_error('meta_descrip', '<div class="error">', '</div>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Canonical Tag</label>
                                    <input name="canonical_tag"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Robot Index</label><br />
                                    
                                     Index <input name="robot_index"  value="index" type="radio" >&nbsp;&nbsp;
                                     No Index <input name="robot_index"  value="noindex" type="radio"><br />
                                    Follow <input name="follow"  value="follow" type="radio">&nbsp;&nbsp;
                                     No Follow <input name="follow"  value="nofollow" type="radio">
                                </div>  

                                   </div>

                             </div>                      

                                 </div>
                         <div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        </form>

                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <script>
      $("#product_type").on('change', function() {
         if(this.value=='simple'){
          $("#simple").show();
           $("#variable").hide();
           $('#variable').find('input, textarea, button, select').prop('disabled',true);
            $('#simple').find('input, textarea, button, select').prop('disabled',false);
         
         }else if(this.value=='variable'){
         $("#variable").show();
           $("#simple").hide();
            $('#variable').find('input, textarea, button, select').prop('disabled',false);
             $('#simple').find('input, textarea, button, select').prop('disabled',true);

         }
      })  
    </script>
    <script>
    	$("#add_attribute").on('click', function() {
    		var att_name=$('#attribute_name').val();
    		var att_value=$('#attribute_value').val();
    		var visible=$('#is_visible:checked').val();
    		var variation=$('#is_variation:checked').val();
    		var pcode="<?php echo $product_code;?>";
    		$.ajax({
     			method:'POST',
     			url:"<?php echo base_url(); ?>admin/product/add_attribute",
     			data:{'pcode':pcode,
     					'att_name':att_name,
     					'att_value':att_value,
     					'is_visible':visible,
     					'is_variation':variation,
     					},
    			success:function(data){
    				if(data == "success"){
    					 $('#attribute_name').val('');
     			 $('#attribute_value').val('');
     			 $("#is_visible"). prop("checked", false);
     			 $("#is_variation"). prop("checked", false);
     			 alert("Attribute successfully added");
    				}else{
    					alert("some error occured. Please try gain");
    				}
     			
     		
  
      }
     })
    	});
    	$("#variation_variable_li").on('click', function() {
    		var pcode="<?php echo $product_code;?>";
    		$.ajax({
     			method:'POST',
     			url:"<?php echo base_url(); ?>admin/product/get_variation",
     			data:{'pcode':pcode,
     					},
    			success:function(data){
    				if(data == "success"){
    					 $('#attribute_name').val('');
     			 $('#attribute_value').val('');
     			 $("#is_visible"). prop("checked", false);
     			 $("#is_variation"). prop("checked", false);
     			 alert("Attribute successfully added");
    				}else{
    					alert("some error occured. Please try gain");
    				}
     			
     		
  
      }
     })
    	})
    	
    </script>
   <!--  <script>
       $("#product_type").on('change', function() {  
         if(this.value=='simple'){
             $("#variation").hide();
             $("#variationli").hide();
             $("#general").show();
             $("#generalli").show();
              $("#general").addClass("active");
             $("#generalli").addClass("active");
             $("#inventory").removeClass("active");
             $("#inventoryli").removeClass("active");
         }else if(this.value=='variable'){ 
            $("#general").hide();
             $("#generalli").hide();
             $("#variation").show();
             $("#variationli").show();
              $("#general").removeClass("active");
             $("#generalli").removeClass("active");
             $("#inventory").addClass("active");
             $("#inventoryli").addClass("active");
             
         }
    })
        

    </script> -->

    