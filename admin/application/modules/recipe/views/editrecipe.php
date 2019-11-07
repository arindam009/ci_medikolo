<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
         <?php echo validation_errors(); ?>
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit Recipe <a href="<?php echo base_url();?>admin/recipe/viewrecipe" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($recipe_all as $rcp) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                
                                <h4>Basics</h4>

                                <div class="form-group">
                                	<label>Recipe Name</label>

                                    <input name="recipe_name" type="text" class="form-control" placeholder="Enter Recipe Name" value="<?php echo $rcp->recipe_name; ?>">

                                    <?php echo form_error('recipe_name','<div class="error">','</div>'); ?>

                                </div>
                                
                                <div class="col-xs-12">

                                	<div class="col-xs-4">

                                	<div class="form-group">
                                		<label>Preparetion Time</label>

                                    <select name="preparetion_time" class="form-control">

                                    	<option value="">Select preparation time (minutes)</option>

                                    	<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>
										        <option value="<?php echo $i;?>"<?php if($i==$rcp->preparetion_time){echo "selected";}?>><?php echo $i;?></option>

										        <?php

										    }

										?>

                                    </select>
									<?php echo form_error('preparetion_time','<div class="error">','</div>'); ?>
                        			</div>
										
                                	</div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">
                                		<label>Cook Time</label>

                                    <select name="cook_time" class="form-control">

                                    	<option value="">Select cook time (minutes)</option>

                                    	<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"<?php if($i==$rcp->cook_time){echo "selected";}?>><?php echo $i;?></option>

										        <?php

										    }

										?>

                                    </select>
                                    <?php echo form_error('cook_time','<div class="error">','</div>'); ?>

                        			</div>

                                </div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">
                                		<label>Serving People</label>

                                    <select name="serving_people" class="form-control">

                                    	<option value="">Select serving (people)</option>

                                    	<?php

										    for ($i=1; $i<=10; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"<?php if($i==$rcp->serving_people){echo "selected";}?>><?php echo $i;?></option>

										        <?php

										    }

										?>

                                    </select>
                                    <?php echo form_error('serving_people','<div class="error">','</div>'); ?>

                        			</div>

                                </div>

									

								</div>

								<div class="col-xs-12">

									<div class="col-xs-4">

                                	<div class="form-group">
                                		<label>Difficulty </label>

                                    <select name="dificulty" class="form-control">

                                    	<option value="">Select Difficulty</option>

                                    	<?php foreach($all_difficulty as $dfa){?>

											<option value=<?php echo $dfa->id;?> <?php if($rcp->dificulty==$dfa->id){echo "selected";}?>><?php echo $dfa->name;?></option>

										<?php } ?>

                                    </select>
                                    <?php echo form_error('dificulty','<div class="error">','</div>'); ?>

                        			</div>

                                	</div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">
                                		<label>Meal Course </label>

                                    <select name="type_of_meal" class="form-control">

                                    	<option value="">Select Meal Course</option>

                                    	<?php foreach($all_meal as $mav){?>

											<option value=<?php echo $mav->id;?> <?php if($rcp->type_of_meal==$mav->id){echo "selected";}?>><?php echo $mav->name;?></option>

										<?php } ?>

                                    </select>
                                    <?php echo form_error('type_of_meal','<div class="error">','</div>'); ?>

                        			</div>

                                	</div>

									

								</div>



								<div class="form-group">

									<label for="inputslidercaption3"><h4>Recipe categories</h4></label>

									<?php foreach($all_category as $ac){
										$checked_category=json_decode($rcp->category);
										//print_r($checked_category);die();
										if (in_array($ac->id, $checked_category))
										{
										$checked="checked";
											  }
										else
										  {
										  $checked="";
											  }?>


                                    <div class="checker">

                                    	<input type="checkbox" name="category[]" value="<?php echo $ac->id;?>" <?php echo $checked;?>>

										</div>

										

                                    <label for="uniq-label"><?php echo $ac->cat_name;?></label>

                                    <?php } ?>

                                </div>
                                
                                
                                <div class="form-group">
                                     <label for="inputslidercaption">Recipe Type</label>
                                     <select name="recipe_type" class="form-control">
                                      <option value="normal" <?php if($rcp->recipe_type=="Normal"){echo "selected";}?>>Normal</option>
                                         <option value="articale of the month" <?php if($rcp->recipe_type=="recipe of the month"){echo "selected";}?>>Recipe Of The Month</option>
                                         <option value="articale of the week" <?php if($rcp->recipe_type=="recipe of the week"){echo "selected";}?>>Recipe Of The Week</option>
                                     </select>
                                </div>
                                
                                <div class="form-group">

                                    <label for="inputslidercaption3">Description</label>

                                    <textarea name="description" class="form-control editor_big"  placeholder="Enter Description"><?php echo $rcp->description; ?></textarea>

                                     <?php echo form_error('description','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                	<h4>Instructions</h4> (enter instructions, one step at a time)
                                	<?php $inscount=1;
                                	 foreach($instruction as $ins){?>
                                	<div id="rowInstruction<?php echo $inscount;?>">
									<div class="col-xs-10">
                                    <input name="inst_name[]" type="text" value="<?php echo $ins->name;?>" class="form-control" placeholder="Enter Name" id="instname<?php echo $inscount;?>"></div><div class="col-xs-2"><a class="remove remove_instruction" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow<?php echo $inscount;?>" href="javascript:void(0);" onclick="removeRowInstruction(this.id);">-</a></div>

                                    <?php echo form_error('name','<div class="error">','</div>'); ?>

                                    <div class="form-group">
	                                    <h5>Instruction Image</h5>
	                                    <input type="file" name="ins_image[]" id="inputsliderimage<?php echo $inscount;?>" accept="image/*" />
	                                    <?php if($ins->images!=''){?>
											  <img id="img<?php echo $inscount;?>" src="<?php echo base_url()?>uploads/recipe_image/instruction/<?php echo $ins->images?>" height="100" width="100">
											     <input name="prev_link[]" type="hidden" value="<?php echo $ins->images?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
										<?php } ?>
	                          
	                      
	                                	</div>
									</div>
									<?php $inscount++; } ?>
									 <div class="f-row full">
									<a class="add add_instruction" href="javascript:void(0);" onclick="addRowInstruction();" style="color: #ff0000;font-weight: bold;">Add a new step</a>
								</div>
					<input type="hidden" name="instructionCount" id="instructionCount" value="<?php echo ($inscount-1);?>"/>
                                </div>
                               



                                <div class="col-xs-12">

	                                <div class="form-group">

	                                    <label for="inputslidercaption3"><h4>Ingredients</h4></label>

	                                </div>
	                                <?php $ingredientscount=1;
	                                foreach($ingredients as $res_ingredients){?>
									<div id="rowIngredients<?php echo $ingredientscount;?>">
	                                <div class="col-xs-5">

	                                <input name="ing_name[]" type="text" value="<?php echo $res_ingredients->name;?>" class="form-control" placeholder="Enter Recipe Ingredients" id="ingredient_name<?php echo $ingredientscount;?>" >

	                                </div>

	                                <div class="col-xs-2">

	                                	<input name="ing_quantity[]" type="text" value="<?php echo $res_ingredients->quantity;?>" class="form-control" placeholder="Quantity" id="quantityIngredients">

	                                </div>

	                                <div class="col-xs-4">

	                                	<select name="ing_unit[]" class="form-control" id="unitIngredients">

                                    	<option value="">Select Ingredient Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?> <?php if($res_ingredients->unit==$alu->id){echo "selected";}?>><?php echo $alu->name;?></option>

										<?php } ?>

                                    	</select>

	                                </div>
									<div class="col-xs-1">
									<a class="remove remove_ingredients" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow<?php echo $ingredientscount;?>" href="javascript:void(0);" onclick="removeRowIngredients(this.id);">-</a></div>
									</div>
									<?php $ingredientscount++; } ?>
									
	                                <div class="f-row full">

										<a class="add add_ingredient" href="javascript:void(0);" onclick="addRowIngredients();" style="color: #ff0000;font-weight: bold;">Add an ingredient</a>
										<input type="hidden" name="ingredientscount" id="ingredientscount" value="<?php echo ($ingredientscount-1);?>"/>

									</div>
								
	                            </div>



								<div class="col-xs-12">

	                                <div class="form-group">

	                                    <label for="inputslidercaption3"><h4>Nutritional elements</h4></label>

	                                </div>
	                                <?php $antcount=1;
	                                foreach($nutrition_element as $ant) {?>
	                                <div id="rowNutritional<?php echo $antcount;?>">

	                                <div class="col-xs-5">

	                                	<input name="ne_name[]" type="text" value="<?php echo $ant->name; ?>" class="form-control" placeholder="Enter Nutritional elements" id="nutritional_name<?php echo $antcount;?>">

	                                </div>

	                                <div class="col-xs-2">

	                                	<input name="ne_quantity[]" type="text" value="<?php echo $ant->quantity; ?>" class="form-control" placeholder="Quantity" id="quantityNutritiona<?php echo $antcount;?>">

	                                </div>

	                                <div class="col-xs-4">

	                                	<select name="ne_unit[]" class="form-control" id="unitNutritiona<?php echo $antcount;?>">

                                    	<option value="">Select Nutritional Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?> <?php if($ant->unit==$alu->id){echo "selected";}?>><?php echo $alu->name;?></option>

										<?php } ?>

                                    	</select>
                                    </div>
                                    <div class="col-xs-1">
									<a class="remove remove_nutritional" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow<?php echo $antcount;?>" href="javascript:void(0);" onclick="removeRowNutritional(this.id);">-</a></div>
									</div>
									<?php $antcount++; } ?>
	                                <div class="f-row full">

										<a class="add add_Nutritional" href="javascript:void(0);" onclick="addRowNutritional();" style="color: #ff0000;font-weight: bold;">Add a nutritional element</a>
										<input type="hidden" name="nutritionalcount" id="nutritionalcount" value="<?php echo ($antcount-1);?>"/>
									</div>
								</div>

	                            

	                            <div class="form-group">

	                            	<h4>Photo</h4>

	                            	<input type="file" name="feature_image" id="inputsliderimage" accept="image/*" />
	                            	<img src="<?php echo base_url()?>uploads/recipe_image/<?php echo $rcp-> feature_image?>" height="100" width="100">
	                            	 <input name="feature_image_prev_link" type="hidden" value="<?php echo $rcp->feature_image?>">

	                            </div>

	                            <h4>Status</h4>(would you like to further edit this recipe or are you ready to publish it?)

<h5>The administrator of this website has opted to review submissions before publishing. After you hit submit, your recipe will be published as soon as the administrator has reviewed it.</h5>



                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
								<?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
   <script>
function addRowInstruction() {

 	var lcount=jQuery("#instructionCount").val();	

	//alert(lcount);

	var name=$("#instname"+lcount).val();

	

	if(name=='NaN' || name=='' || name==null){

		alert("Please enter recipe instructuction before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowInstruction"+lcount).clone()

			.attr("id","rowInstruction"+newCount)

			.find(':input,img').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowInstruction"+lcount);

		

		jQuery("#rowInstruction"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowInstruction"+newCount).find('input:text').val('');

		
		jQuery("#instname"+newCount).focus();

		jQuery("#instname"+newCount).val('');

		jQuery("#img"+newCount).remove();

		jQuery("#inputsliderimage"+newCount).val('');
		

		jQuery("#instructionCount").val(newCount);

	}
}

function removeRowInstruction(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowInstruction"+lastId).remove();

		

		var lcount=jQuery("#instructionCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#instructionCount").val(newCount);

		var i=1;

		

	}

	

}

function addRowIngredients() {

 	var lcount=jQuery("#ingredientscount").val();	

	//alert(lcount);

	var ingredient_name=$("#ingredient_name"+lcount).val();

	

	if(ingredient_name=='NaN' || ingredient_name=='' || ingredient_name==null){

		alert("Please enter recipe ingredient before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowIngredients"+lcount).clone()

			.attr("id","rowIngredients"+newCount)

			.find(':input').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowIngredients"+lcount);

		

		jQuery("#rowIngredients"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowIngredients"+newCount).find('input:text').val('');

		
		jQuery("#name"+newCount).focus();

		jQuery("#name"+newCount).val('');
		jQuery("#quantityIngredients"+newCount).val('');
		jQuery("#unitIngredients"+newCount).val('');
		

		jQuery("#ingredientscount").val(newCount);

	}
}

function removeRowIngredients(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowIngredients"+lastId).remove();

		

		var lcount=jQuery("#ingredientsCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#ingredientsCount").val(newCount);

		var i=1;

		

	}

	

}


function addRowNutritional() {

 	var lcount=jQuery("#nutritionalcount").val();	

	//alert(lcount);

	var nutritional_name=$("#nutritional_name"+lcount).val();

	

	if(nutritional_name=='NaN' || nutritional_name=='' || nutritional_name==null){

		alert("Please enter recipe nutritional before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowNutritional"+lcount).clone()

			.attr("id","rowNutritional"+newCount)

			.find(':input').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowNutritional"+lcount);

		

		jQuery("#rowNutritional"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowNutritional"+newCount).find('input:text').val('');

		
		jQuery("#name"+newCount).focus();

		jQuery("#name"+newCount).val('');
		jQuery("#quantityNutritional"+newCount).val('');
		jQuery("#unitNutritional"+newCount).val('');
		

		jQuery("#nutritionalcount").val(newCount);

	}
}

function removeRowNutritional(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowNutritional"+lastId).remove();

		

		var lcount=jQuery("#nutritionalCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#nutritionalCount").val(newCount);

		var i=1;

		

	}

	

}
</script>