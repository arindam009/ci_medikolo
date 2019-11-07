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
					<li>Edit Blog</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Edit Blog</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_recipe container">
					<?php echo validation_errors(); ?>
					<?php foreach($single_data as $singledata) { ?>
						<form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">

                                <h4>Basics</h4>

                                <div class="form-group">

                                    <input name="blog_name" type="text" value="<?php echo $singledata->blog_name; ?>" class="form-control" placeholder="Enter Blog Name">

                                    <?php echo form_error('blog_name','<div class="error">','</div>'); ?>

                                </div>
									
								<div class="form-group">
                                    <label for="inputslidercaption">Blog Category</label>
                                    <select class="form-control" name="blog_category">
                                        <option>Select Category</option>
                                        <?php foreach($all_category as $ac) { ?>
                                 <option value="<?php echo $ac->id;?>" <?php if($ac->id==$singledata->blog_category){echo "selected";}?>><?php echo $ac->cat_name;?></option>
                                       <?php } ?>
                                       
                                    </select>
                                </div>
                                

                                <div class="form-group">
                                    <label for="inputslidercaption">Blog Description</label>
                                   <textarea name="blog_description" class="form-control editor_big"><?php echo $singledata->blog_description;?></textarea>
                                </div>
                                 <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/blog_image/<?=$singledata->feature_image?>" height=100px; width=100px;>
                                    <label for="inputslidercaption">Feature Image</label>
                                     <input type="file" name="image_src" accept="image/*" />
                                     <input name="prev_link" type="hidden" value="<?=$singledata->feature_image?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>

	                            <h4>Status</h4>(would you like to further edit this recipe or are you ready to publish it?)

<h5>The administrator of this website has opted to review submissions before publishing. After you hit submit, your recipe will be published as soon as the administrator has reviewed it.</h5>



                                <button type="submit" class="btn btn-info">Submit</button>

                            </form>
					<?php } ?>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	

