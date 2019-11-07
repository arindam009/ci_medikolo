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
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">                              

                                <div class="col-lg-8">
                                <h3>Product Information</h3><br />
                                <div class="form-group">
                                    <label for="inputslidercaption">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" id="" placeholder="Enter Product Name">
                                </div>						

                                <div class="form-group">
                                    <label for="inputslidercaption">Short Description</label>
                                    <textarea name="product_short_description"  class="form-control" id="" placeholder="Enter Description"></textarea>
                                </div>                              
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="product_description"  class="form-control editor_big" id="" placeholder="Enter Description"></textarea>

                                </div>       
                                 <div class="form-group">
                                     <label for="inputslidercaption">Product Type</label>
                                     <select name="product_type" class="form-control" id="product_type">
                                         <option value="simple">Simple product</option>
                                         
                                     </select>
                                 </div>    
                                  <h3>Product Data</h3>
        <hr/>
        <div id="simple">
        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left sideways">
            <li id="generalli" class="active"><a href="#general" data-toggle="tab">General</a></li>
            <li id="inventoryli"><a href="#inventory" data-toggle="tab">Inventory</a></li>
            <li id="shippingli"><a href="#shipping" data-toggle="tab">Shipping</a></li>
            <li id="linked_productli"><a href="#linked_product" data-toggle="tab">Linked Product</a></li>
            <li id="advancedli"><a href="#advanced" data-toggle="tab">Advanced</a></li>
            <li id="seoli"><a href="#seo" data-toggle="tab">SEO</a></li>
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="general"> 
                <div class="form-group">

                                    <label for="inputslidercaption">Regular Price</label>

                                    <input name="regular_price" type="text" class="form-control" id="" placeholder="Enter Regular price">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Sale Price</label>

                                    <input name="sale_price" type="text" class="form-control" id="" placeholder="Enter Sale price">

                                </div>
                            </div>
            <div class="tab-pane" id="inventory"> 
                                <div class="form-group">

                                    <label for="inputslidercaption">SKU</label>

                                    <input name="sku" type="text" class="form-control" id="" placeholder="Enter Sku">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Stock Quantity</label>

                                    <input name="stock_quantity" type="text" class="form-control" id="" placeholder="Enter Stock Quantity">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Stock Status</label>

                                    <select class="form-control" name="stock_status">
                                        <option value="3">In stock</option>
                                        <option value="2">Out of stock</option>
                                    </select>

                                </div>

            </div>
            <div class="tab-pane" id="shipping">
                <div class="form-group">

                                    <label for="inputslidercaption">Weight(kg)</label>

                                    <input name="weight" type="text" class="form-control" id="" placeholder="Enter Weight">

                                </div>

                                <div class="form-group">

                                    <label for="inputslidercaption">Dimensions(cm)</label>

                                    <input name="length" type="text" class="form-control" id="" placeholder="Length">
                                     <input name="width" type="text" class="form-control" id="" placeholder="Width">
                                      <input name="height" type="text" class="form-control" id="" placeholder="Height">

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption">Shipping Class</label>

                                     <select name="shipping_class"  class="form-control" id="">
                                        <option>--Select Shipping Class--</option>
                                        <?php foreach ($all_shipping_class as $shipping) { ?>
                                           <option value="<?php echo $shipping->id;?>"><?php echo $shipping->class_name;?></option>
                                    <?php    } ?>
                                     </select>

                                </div>
                            </div>
                             <div class="tab-pane" id="linked_product">

                                <div class="form-group">

                                    <label for="inputslidercaption">Related Product</label>

                                    <input name="related_product" type="text" class="form-control" id="" placeholder="">

                                </div>
                            </div>
                             <div class="tab-pane" id="advanced">

                               
                                 <div class="form-group">

                                    <label for="inputslidercaption">Purchase Note</label>

                                     <textarea name="purchase_note" rows="5"    class="form-control" id="inputslidercaption"></textarea>

                                </div>

                            </div>
            
                            <div class="tab-pane" id="seo">
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

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Canonical Tag</label>

                                    <input name="canonical_tag"  value="" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption">Robot Index</label><br />

                                    

                                     Index <input name="robotindex"  value="index" type="radio" >&nbsp;&nbsp;

                                     No Index <input name="robotindex"  value="noindex" type="radio"><br />

                                    Follow <input name="robot_index"  value="follow" type="radio">&nbsp;&nbsp;

                                     No Follow <input name="robot_index"  value="nofollow" type="radio">

                                </div>  

                            </div>
          </div>
        </div>
      </div>                         

                                </div>

                                <div class="col-lg-4">

                                <h3></h3><br /><br /><br />
                                
                                
                                 <label for="inputslidercaption">Product Category</label><br />
                                 <?php echo $datatree;?>   
                              
                                <div class="form-group">



                                    <label for="inputsliderimage">Fetured Image</label>



                                    <input type="file" name="feature_image_src" id="inputsliderimage" accept="image/*" />
                                    <img id="image_upload_preview" src="http://placehold.it/100x100" alt="your image" style="width: 100px; height: 100px" />



                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                <div class="form-group">



                                    <label for="inputsliderimage">Gallery Image</label>



                                    <input type="file" name="gallery_image_src[]" id="inputsliderimage" multiple="" accept="image/*" />



                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                </div>                               

                                <div class="col-lg-12">
                                <div class="form-group">

                                <button type="submit" class="btn btn-info">Submit</button>

                                </div>

                               </div>
                               <div  class="col-sm-6">
       

      </div>

                            </form>



                            </div>







                        </div>



                    </section>







            </div>



        </div>



        <!-- page end-->



        </section>



    </section>
    <script>
    	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputsliderimage").change(function () {
        readURL(this);
    });
    </script>
    <!-- <script>
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
    </script> -->
   <!--  <script>
    	$("#add_attribute").on('click', function() {
    		var att_name=$('#attribute_name').val();
    		var att_value=$('#attribute_value').val();
    		var visible=$('#is_visible:checked').val();
    		var variation=$('#is_variation:checked').val();
    		var pcode="<?php// echo $product_code;?>";
    		$.ajax({
     			method:'POST',
     			url:"<?php //echo base_url(); ?>admin/product/add_attribute",
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
    		var pcode="<?php //echo $product_code;?>";
    		$.ajax({
     			method:'POST',
     			url:"<?php //echo base_url(); ?>admin/product/get_variation",
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
    	
    </script> -->
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

    