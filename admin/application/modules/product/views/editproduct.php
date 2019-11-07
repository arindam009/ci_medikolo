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
                           <h3> Edit Product <a href="<?php echo base_url();?>admin/product" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">                              

                                <div class="col-lg-8">
                                <h3>Product Information</h3><br />
                                <div class="form-group">
                                    <label for="inputslidercaption">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" id="" placeholder="Enter Product Name" value="<?php echo $product_all->name;?>">
                                </div>						

                                <div class="form-group">
                                    <label for="inputslidercaption">Short Description</label>
                                    <textarea name="product_short_description"  class="form-control" id="" placeholder="Enter Description"><?php echo $product_all->short_description;?></textarea>
                                </div>                              
                                
                                 <div class="form-group">
                                    <label for="inputslidercaption">Description</label>
                                    <textarea name="product_description"  class="form-control editor_big" id="" placeholder="Enter Description"><?php echo $product_all->description;?></textarea>

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

                                    <input name="regular_price" type="text" class="form-control" id="" placeholder="Enter Regular price" value="<?php echo $product_all->regular_price;?>">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Sale Price</label>

                                    <input name="sale_price" type="text" class="form-control" id="" placeholder="Enter Sale price" value="<?php echo $product_all->sale_price;?>">

                                </div>
                            </div>
            <div class="tab-pane" id="inventory"> 
                                <div class="form-group">

                                    <label for="inputslidercaption">SKU</label>

                                    <input name="sku" type="text" class="form-control" id="" placeholder="Enter Sku" value="<?php echo $product_all->sku;?>">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Stock Quantity</label>

                                    <input name="stock_quantity" type="text" class="form-control" id="" placeholder="Enter Stock Quantity" value="<?php echo $product_all->qty;?>">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Stock Status</label>

                                    <select class="form-control" name="stock_status">
                                        <option value="3" <?php if($product_all->status==3){echo "selected";}?>>In stock</option>status==3
                                        <option value="2" <?php if($product_all->status==2){echo "selected";}?>>Out of stock</option>
                                    </select>

                                </div>

            </div>
            <div class="tab-pane" id="shipping">
                <div class="form-group">

                                    <label for="inputslidercaption">Weight(kg)</label>

                                    <input name="weight" type="text" class="form-control" id="" placeholder="Enter Weight" value="<?php echo $product_all->weight;?>">

                                </div>

                                <div class="form-group">

                                    <label for="inputslidercaption">Dimensions(cm)</label>

                                    <input name="length" type="text" class="form-control" id="" placeholder="Length" value="<?php echo $product_all->length;?>">
                                     <input name="width" type="text" class="form-control" id="" placeholder="Width" value="<?php echo $product_all->width;?>">
                                      <input name="height" type="text" class="form-control" id="" placeholder="Height" value="<?php echo $product_all->height;?>">

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption">Shipping Class</label>

                                     <select name="shipping_class"  class="form-control" id="">
                                        <option>--Select Shipping Class--</option>
                                        <?php foreach ($all_shipping_class as $shipping) { 
                                            if($shipping->id==$product_all->shipping_class){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }?>
                                           <option value="<?php echo $shipping->id;?>" <?php echo $selected;?>><?php echo $shipping->class_name;?></option>
                                    <?php    } ?>
                                     </select>

                                </div>
                            </div>
                             <div class="tab-pane" id="linked_product">

                                <div class="form-group">

                                    <label for="inputslidercaption">Related Product</label>

                                    <input name="related_product" type="text" class="form-control" id="" placeholder="" value="<?php echo $product_all->related_product;?>">

                                </div>
                            </div>
                             <div class="tab-pane" id="advanced">

                               
                                 <div class="form-group">

                                    <label for="inputslidercaption">Purchase Note</label>

                                     <textarea name="purchase_note" rows="5"    class="form-control" id="inputslidercaption"><?php echo $product_all->purchase_note;?></textarea>

                                </div>

                            </div>
            
                            <div class="tab-pane" id="seo">
                               <div class="form-group">

                                    <label for="inputslidercaption">Meta Title</label>

                                    <input name="meta_title" type="text" class="form-control" id="inputslidercaption" value="<?php echo $product_all->meta_title;?>">

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Meta Keyword</label>

                                    <input name="meta_keyword" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Meta Keyword" value="<?php echo $product_all->meta_keywords;?>">

                                </div> 
                                <div class="form-group">

                                    <label for="inputslidercaption">Meta Description</label>

                                    <textarea name="meta_descrip" rows="5" class="form-control" id="inputslidercaption" placeholder="Enter Meta Description"><?php echo $product_all->meta_descrip;?></textarea>

                                </div>
                                 <div class="form-group">

                                    <label for="inputslidercaption">Canonical Tag</label>

                                    <input name="canonical_tag"  value="<?php echo $product_all->canonical_tag;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Canonical Tag">

                                </div>
                                <div class="form-group">

                                    <label for="inputslidercaption">Robot Index</label><br />

                                    

                                     Index <input name="robotindex"  value="index" type="radio" <?php if ($product_all->robot_index == 'index') {echo ' checked ';}?>>&nbsp;&nbsp;

                                     No Index <input name="robotindex"  value="noindex" type="radio" <?php if ($product_all->robot_index == 'noindex') {echo ' checked ';}?>><br />

                                    Follow <input name="robot_index"  value="follow" type="radio" <?php if ($product_all->robot_index == 'follow') {echo ' checked ';}?>>&nbsp;&nbsp;

                                     No Follow <input name="robot_index"  value="nofollow" type="radio" <?php if ($product_all->robot_index == 'nofollow') {echo ' checked ';}?>>

                                </div>  

                            </div>
          </div>
        </div>
      </div>                         

                                </div>

                                <div class="col-lg-4">

                                <h3></h3><br /><br /><br />
                                
                                
                                 <label for="inputslidercaption">Product Category</label><br />
                                 <ul>
                                 <?php foreach ($all_categories as $category) {
                                    $checked_category=json_decode($product_all->category);
                                        //print_r($checked_category);die();
                                        if (in_array($category->id, $checked_category))
                                        {
                                        $checked="checked";
                                              }
                                        else
                                          {
                                          $checked="";
                                              }?>
                                   <li><label><input type="checkbox" value="<?php echo $category->id;?>" name="category[]" <?php echo $checked;?>><?php echo $category->cat_name;?></label></li>
                               <?php   }  ?>       
                               </ul>        
                                <div class="form-group">



                                    <label for="inputsliderimage">Fetured Image</label>



                                    <input type="file" name="feature_image_src" id="inputsliderimage" accept="image/*" />

                                     <img id="img" src="<?php echo base_url()?>uploads/product_image/<?php echo $product_all->feature_image?>" height="100" width="100">
                                      <input name="feature_image_prev_link" type="hidden" value="<?php echo $product_all->feature_image?>">



                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>

                                </div>
                                <div class="form-group">



                                    <label for="inputsliderimage">Gallery Image</label>



                                    <input type="file" name="gallery_image_src[]" id="inputsliderimage" multiple="" accept="image/*" />
                                    <?php $i=0; foreach ($product_gallery as $single_image) { $i++; ?>

                                         <fieldset id="rowimg<?php echo $i;?>" class="rowimgt">
            <img src="<?php echo base_url()?>uploads/product_image/<?php echo $single_image->image;?>" width="80" height="80">
            <a href="javascript:void(0)" id="delete<?php echo $i;?>" class="delrow" onclick="deleteRowimg(this.id,<?php echo $single_image->id;?>);" title="Delete image"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
            </fieldset>


                                          <input name="gallery_image_prev_link[]" type="hidden" value="<?php echo $single_image->image;?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                  <?php  } ?>



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
      function deleteRowimg(rowid,id){
      $.ajax({    
      url:'<?php echo base_url();?>admin/product/deleteimage',
      type:'POST',
      data:{
            'id':id
          },
      beforeSend:function(){        
      },
      success:function(data){        
        $("#"+rowid).closest('fieldset').remove();
        var cnt=0;  
        $(".rowimgt").each(function(){
          $(this).attr('id','rowimg'+cnt);
          $('a',this).attr('id','delete'+cnt);
          //$("#row"+cnt+" input").attr('id','row'+cnt);
          cnt=cnt+1;
        }); 
        alert("image has been removed successfully!");
      }
    });   
    
  
}

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

    