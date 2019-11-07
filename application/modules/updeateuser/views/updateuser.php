<div class="panel-body" style="display: block;">
<?php if($this->session->flashdata('success_msg')!="") { ?>
<div class="clearfix"></div>
<div class="alert alert-success">
<strong></strong> <?=$this->session->flashdata('success_msg');?>
</div>
<?php }elseif($this->session->flashdata('err_msg')!=""){ ?>
<div class="alert alert-danger">
<strong></strong> <?=$this->session->flashdata('err_msg');?>
</div>
<?php } ?>
</div>
<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>Submit a Blog</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new Blog</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_recipe container">
					<?php echo validation_errors(); ?>
						<form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">

                                <h4>Basics</h4>

                                <div class="form-group">

                                    <input name="blog_name" type="text" value="<?php echo set_value('blog_name'); ?>" class="form-control" placeholder="Enter Blog Name">

                                    <?php echo form_error('blog_name','<div class="error">','</div>'); ?>

                                </div>
								
								<section>
								<h2>Blog categories</h2>
									
									
									<select name="blog_category">
										<option value="">Select Ctaegory</option>
										<?php foreach($all_category as $ac) { ?>
										<option value="<?php echo $ac->id;?>"><?php echo $ac->cat_name;?></option>
										<?php } ?>
									</select>
									
								</section>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption3">Description</label>

                                    <textarea name="blog_description"   class="form-control editor_big"  placeholder="Enter Description"><?php echo set_value('blog_description'); ?></textarea>

                                     <?php echo form_error('blog_description','<div class="error">','</div>'); ?>

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
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	

