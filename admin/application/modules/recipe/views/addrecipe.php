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

                           <h3> Add Recipe<a href="<?php echo base_url();?>admin/recipe/viewrecipe" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">

                                <h4>Basics</h4>

                                <div class="form-group">

                                    <input name="recipe_name" type="text" value="<?php echo set_value('recipe_name'); ?>" class="form-control" placeholder="Enter Recipe Name">

                                    <?php echo form_error('recipe_name','<div class="error">','</div>'); ?>

                                </div>

                                <div class="col-xs-12">

                                	<div class="col-xs-4">

                                	<div class="form-group">

                                    <select name="preparetion_time" class="form-control">

                                    	<option value="">Select preparation time (minutes)</option>

                                    	<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

										        <?php

										    }

										?>

                                    </select>
									<?php echo form_error('preparetion_time','<div class="error">','</div>'); ?>
                        			</div>
										
                                	</div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">

                                    <select name="cook_time" class="form-control">

                                    	<option value="">Select cook time (minutes)</option>

                                    	<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

										        <?php

										    }

										?>

                                    </select>
                                    <?php echo form_error('cook_time','<div class="error">','</div>'); ?>

                        			</div>

                                </div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">

                                    <select name="serving_people" class="form-control">

                                    	<option value="">Select serving (people)</option>

                                    	<?php

										    for ($i=1; $i<=10; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

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

                                    <select name="dificulty" class="form-control">

                                    	<option value="">Select Difficulty</option>

                                    	<?php foreach($all_difficulty as $dfa){?>

											<option value=<?php echo $dfa->id;?>><?php echo $dfa->name;?></option>

										<?php } ?>

                                    </select>
                                    <?php echo form_error('dificulty','<div class="error">','</div>'); ?>

                        			</div>

                                	</div>

									

                                	<div class="col-xs-4">

                                	<div class="form-group">

                                    <select name="type_of_meal" class="form-control">

                                    	<option value="">Select Meal Course</option>

                                    	<?php foreach($all_meal as $mav){?>

											<option value=<?php echo $mav->id;?>><?php echo $mav->name;?></option>

										<?php } ?>

                                    </select>
                                    <?php echo form_error('type_of_meal','<div class="error">','</div>'); ?>

                        			</div>

                                	</div>

									

								</div>

								

								<div class="form-group">

									<label for="inputslidercaption3"><h4>Recipe categories</h4></label>

									<?php foreach($all_category as $ac){?>

                                    <div class="checker">

                                    	<input type="checkbox" name="category[]" value="<?php echo $ac->id;?>">

										</div>

										

                                    <label for="uniq-label"><?php echo $ac->cat_name;?></label>

                                    <?php } ?>

                                </div>

                                    

                                <div class="form-group">
                                     <label for="inputslidercaption">Recipe Type</label>
                                     <select name="recipe_type" class="form-control">
                                         <option value="normal" selected="">Normal</option>
                                         <option value="recipe of the month">Recipe Of The Month</option>
                                         <option value="recipe of the week">Recipe Of The Week</option>
                                     </select>
                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption3">Description</label>

                                    <textarea name="description"   class="form-control editor_big"  placeholder="Enter Description"><?php echo set_value('description'); ?></textarea>

                                     <?php echo form_error('description','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                	<h4>Instructions</h4> (enter instructions, one step at a time)
                                	<div id="rowInstruction1">
									<div class="col-xs-10">
                                    <input name="inst_name[]" type="text" value="" class="form-control" placeholder="Enter Name" id="instname1"></div><div class="col-xs-2"><a class="remove remove_instruction" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowInstruction(this.id);">-</a></div>

                                    <?php echo form_error('name','<div class="error">','</div>'); ?>

                                    <div class="form-group">
	                                    <h5>Instruction Image</h5>
	                                    <input type="file" name="ins_image[]" id="inputsliderimage1" accept="image/*" />
	                                	</div>
									</div>
									 <div class="f-row full">
									<a class="add add_instruction" href="javascript:void(0);" onclick="addRowInstruction();" style="color: #ff0000;font-weight: bold;">Add a new step</a>
								</div>
								<input type="hidden" name="instructionCount" id="instructionCount" value="1"/>
                                </div>
                               



                                <div class="col-xs-12">

	                                <div class="form-group">

	                                    <label for="inputslidercaption3"><h4>Ingredients</h4></label>

	                                </div>
									<div id="rowIngredients1">
	                                <div class="col-xs-5">

	                                <input name="ing_name[]" type="text" value="" class="form-control" placeholder="Enter Recipe Ingredients" id="ingredient_name1">

	                                </div>

	                                <div class="col-xs-2">

	                                	<input name="ing_quantity[]" type="text" value="<?php echo set_value('quantity'); ?>" class="form-control" placeholder="Quantity" id="quantityIngredients">

	                                </div>

	                                <div class="col-xs-4">

	                                	<select name="ing_unit[]" class="form-control" id="unitIngredients">

                                    	<option value="">Select Ingredient Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?>><?php echo $alu->name;?></option>

										<?php } ?>

                                    	</select>

	                                </div>
									<div class="col-xs-1">
									<a class="remove remove_ingredients" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowIngredients(this.id);">-</a></div>
									</div>
	                                <div class="f-row full">

										<a class="add add_ingredient" href="javascript:void(0);" onclick="addRowIngredients();" style="color: #ff0000;font-weight: bold;">Add an ingredient</a>
										<input type="hidden" name="ingredientscount" id="ingredientscount" value="1"/>

									</div>
								
	                            </div>



								<div class="col-xs-12">

	                                <div class="form-group">

	                                    <label for="inputslidercaption3"><h4>Nutritional elements</h4></label>

	                                </div>
	                                <div id="rowNutritional1">

	                                <div class="col-xs-5">

	                                	<input name="ne_name[]" type="text" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter Nutritional elements" id="nutritional_name1">

	                                </div>

	                                <div class="col-xs-2">

	                                	<input name="ne_quantity[]" type="text" value="<?php echo set_value('quantity'); ?>" class="form-control" placeholder="Quantity" id="quantityNutritional">

	                                </div>

	                                <div class="col-xs-4">

	                                	<select name="ne_unit[]" class="form-control" id="unitNutritional">

                                    	<option value="">Select Nutritional Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?>><?php echo $alu->name;?></option>

										<?php } ?>

                                    	</select>
                                    </div>
                                    <div class="col-xs-1">
									<a class="remove remove_nutritional" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowNutritional(this.id);">-</a></div>
									</div>
	                                <div class="f-row full">

										<a class="add add_Nutritional" href="javascript:void(0);" onclick="addRowNutritional();" style="color: #ff0000;font-weight: bold;">Add a nutritional element</a>
										<input type="hidden" name="nutritionalcount" id="nutritionalcount" value="1"/>
									</div>
									
	                                
								
	                            </div>

	                            

	                            <div class="form-group">

	                            	<h4>Photo</h4>

	                            	<input type="file" name="feature_image" id="inputsliderimage" accept="image/*" />

	                            </div>

	                            <h4>Status</h4>(would you like to further edit this recipe or are you ready to publish it?)

<h5>The administrator of this website has opted to review submissions before publishing. After you hit submit, your recipe will be published as soon as the administrator has reviewed it.</h5>



                                <button type="submit" class="btn btn-info">Submit</button>

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

			.find(':input').each(function(){

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