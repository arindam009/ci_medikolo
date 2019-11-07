<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li><a href="<?php echo base_url()?>users" title="Profile">Profile</a></li>
				</ul>
			</nav>
			
			<!--//breadcrumbs-->
			<!--content-->
			<section class="content">
				<!--row-->
				<div class="row">
				    <header class="s-title">
					  <h1><?php echo $member_single_data->full_name;?></h1>
				    </header>
				    <div class="full-width profile-wrap">
				    	<img src="<?php echo base_url()?>themes/front/images/bg/body.jpg" class="pro-cover"/>
				    	<div class="pro-img">
				    		<img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$member_single_data->profile_photo?>" alt="" />
				    	</div>
				    	<div class="white-bg">
				    		<p><strong>@<?php echo $member_single_data->full_name;?></strong><br> Since : <?php echo date("d", strtotime($member_single_data->created_on));?>-<?php echo date("M", strtotime($member_single_data->created_on));?> - <?php echo date("Y", strtotime($member_single_data->created_on));?></p>
				    	</div>
				    </div>

					<!--//profile left part-->
					
					<div class="three-fourth">
						<nav class="tabs">
							<ul>
							    <li class="active"><a href="#profile" title="Profile">Profile</a></li>
								<li><a href="#recipes" title="My recipes">My Recipes <span><?php echo $recipe_data->post_count;?></span></a></li>
								<li><a href="#articles" title="Article">Article <span><?php echo $blog_data->post_count;?></span></a></li>
							</ul>
						</nav>
						
						<!--Profile-->
						<div class="tab-content" id="profile">
						<a href="<?php echo base_url();?>user/edit/<?php echo $member_single_data->profile_url;?>" title="My Profile">Update Profile</a>
							<div class="row">
								<dl class="basic two-third">
									<dt>Name</dt>
									<dd><?php echo $member_single_data->full_name ; ?></dd>
									<dt>Profile Bio</dt>
									<dd><?php echo $member_single_data->profile_bio ?></dd>
									
									<dt>Recipes submitted</dt>
									<dd><?php echo $recipe_data->post_count;?></dd>
									<dt>Posts submitted</dt>
									<dd><?php echo $blog_data->post_count;?></dd>
								</dl>
								
							</div>
						</div>
						<!--//Profile-->
					
						<!--my recipes-->
						<div class="tab-content" id="recipes">
						<a href="<?php echo base_url();?>submitrecipe" title="My recipes">Submit My Recipes</a>
						
							<div class="entries row">
								<!--item-->
								<?php
								//print_r($recipe_total_data);
								foreach($recipe_total_data as $result_recipe) {
								if($result_recipe->recipe_name!=''){
									
								 ?>
								<div class="entry one-third">
									<figure>
										<img src="<?php echo base_url()?>uploads/recipe_image/<?=$result_recipe->feature_image?>" alt="" />
										<figcaption><a href="<?php echo base_url()?>submitrecipe/edit/<?php echo $result_recipe->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>Edit Recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>recipe/<?php echo $result_recipe->slug;?>"><?php echo string_limit_words(strip_tags($result_recipe->recipe_name),10);?></a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty">
												<?php if($result_recipe->diff_name=='easy') { ?>
												<i class="ico i-easy"></i>
												<?php } elseif($result_recipe->diff_name=='hard') { ?>
												<i class="ico i-hard"></i>
												<?php } elseif($result_recipe->diff_name=='moderate'){?>
												<i class="ico i-medium"></i>
												<?php } ?>
												<a href="<?php echo base_url()?>recipe/<?php echo $result_recipe->slug;?>"><?php echo $result_recipe->diff_name;?>
												</a>
												</div>
												<?php if($result_recipe->is_approved==1) { echo "Approved"; }else { echo "Not Approved";}?>
												<div class="comments"><i class="fa fa-comment"></i><a href="<?php echo base_url()?>recipe/<?php echo $result_recipe->slug;?>#comments">
													<?php 
													$CI =& get_instance();
													$CI->load->model('Users_model');
													$result_data = $CI->Users_model->count_comments($result_recipe->recipe_code);
													echo  $result_data->total;
													
													?>	
												</a></div>
											</div>
										</div>
									</div>
								</div>
								<?php  }} ?>
								<!--item-->
							</div>
						</div>
						<!--//my recipes-->
						
						<!--my Activity-->
						<div class="tab-content" id="articles">
						
							<a href="<?php echo base_url();?>submitblog/" title="My recipes">Submit My Article</a>
						
							<!--entries-->
							<div class="entries row">
								<!--item-->
								<?php foreach($blog_total_data as $res_blog)
								/*echo "<pre>";print_r ($res_blog); die("here");*/ { ?>
								<div class="entry one-third">
									<figure>
										<img src="<?php echo base_url()?>uploads/blog_image/<?=$res_blog->feature_image?>" alt="" />
										<figcaption><a href="<?php echo base_url()?>submitblog/edit/<?php echo $res_blog->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>Edit post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>"><?php echo $res_blog->blog_name;?></a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">
											<?php echo date("d M Y", strtotime($res_blog->post_on)); ?>
											
												
											</a></div>
											<?php if($res_blog->is_approved==1) { echo "Approved"; }else { echo "Not Approved";}?>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">
													<?php 
													$CI =& get_instance();
													$CI->load->model('Users_model');
													$result_data = $CI->Users_model->count_comments($res_blog->blog_code);
													echo  $result_data->total;
													
													?>	
												</a></div>
											</div>
										</div>
										<div class="excerpt">
											<p><?php echo string_limit_words(strip_tags($res_blog->blog_description),50);?></p>
										</div>
									</div>
								</div>
								<?php } ?>
								<!--item-->
								
								
							</div>
							<!--//entries-->
						</div>
						<!--//my Activity-->
						<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-2.png" alt=""/></div>
					</div>
					
					<!--right sidebar-->
				<aside class="sidebar one-fourth">
				    <div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="" />
					</div>
						
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-5.png" alt="" />
					</div>
	
				</aside>
				
				</div>
				<!--//row-->
			</section>
			<!--//content-->
			
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->