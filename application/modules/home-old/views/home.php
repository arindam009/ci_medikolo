	<!--main-->
	<main class="main" role="main">
		<!--intro-->
		<div class="intro">
			<figure class="bg"><img src="<?php echo base_url()?>themes/front/img/bg3.jpg" alt="" /></figure>
			
			<!--wrap-->
			<div class="wrap clearfix">
				<!--row-->
				<div class="row">
					<article class="three-fourth text banner-box">
					<br>
						<h1>Welcome to Mirchi Chef</h1>
						<p>Mirchi Chef is the platform to list your recipes FREE.</p>
						<p>By joining us you will join a foodie community and where you will get to list your recipes and food ideas with hundreds of other like-minded members like you. You will also get a chance to win awesome prizes, make new friends and share delicious recipes.</p>
						<a href="<?php echo base_url()?>user-registration" class="button white more medium">Join our community <i class="fa fa-chevron-right"></i></a>
						<p>Already a member? Click <a href="<?php echo base_url()?>login">here</a> to login.</p>
					</article>
					
					<!--search recipes widget-->
					<div class="one-fourth">
						<div class="widget container">
							<div class="textwrap">
								<h3>Refine search results</h3>
								<p>All you need to do is enter an ingredient, a dish or a keyword.</p>
								<p>You can also select a specific category from the dropdown.</p>
								<p>There's sure to be something tempting for you to try.</p> 
								<p>Enjoy!</p>
							</div>
							<form action="find_recipe.html">
								<div class="f-row">
									<input type="text" placeholder="Enter your search term" />
								</div>
								<div class="f-row">
									<select>
										<option>Select a category</option>
										<option>Apetizers</option>
										<option>Cocktails</option>
										<option>Deserts</option>
										<option>Main courses</option>
										<option>Snacks</option>
										<option>Soups</option>
									</select>
								</div>
								<div class="f-row">
									<select>
										<option>Select meal course</option>
										<option>Breakfast</option>
										<option>Desert</option>
										<option>Dinner</option>
										<option>Lunch</option>
										<option>Snack</option>
									</select>
								</div>
								<div class="f-row">
									<select>
										<option>Select difficulty</option>
										<option>easy</option>
										<option>hard</option>
										<option>moderate</option>
									</select>
								</div>
								<div class="f-row bwrap">
									<input type="submit" value="Start Exploring!" />
								</div>
							</form>
						</div>
					</div>
					<!--//search recipes widget-->
				</div>
				<!--//row-->
			</div>
			<!--//wrap-->
		</div>
		<!--//intro-->
		
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
				<section class="content full-width">
					<div class="icons dynamic-numbers">
						<header class="s-title">
							<div class="ribbon large"><div><h2>Post your recipes free of cost | Recipe Listings Site | MirchiChef.com in </h2></div></div>
						</header>
						
						<!--row-->
						<div class="row">
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_chef-hat"></i>
									<span class="title dynamic-number" data-dnumber="1730">0</span>
									<span class="subtitle">members</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_pan"></i>
									<span class="title dynamic-number" data-dnumber="1250">0</span>
									<span class="subtitle">recipes</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_image"></i>
									<span class="title dynamic-number" data-dnumber="5300">0</span>
									<span class="subtitle">photos</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_pencil"></i>
									<span class="title dynamic-number" data-dnumber="2300">0</span>
									<span class="subtitle">forum posts</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_chat-bubbles"></i>
									<span class="title dynamic-number" data-dnumber="7400">0</span>
									<span class="subtitle">comments</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="icon icon-themeenergy_stars"></i>
									<span class="title dynamic-number" data-dnumber="1700">0</span>
									<span class="subtitle">articles</span>
								</div>
							</div>
							<!--//item-->
						
							<div class="cta">
								<a href="<?php echo base_url()?>login" class="button big">Join us!</a>
							</div>
						</div>
						<!--//row-->
					</div>
				</section>
				<!--//content-->
			
				<!--content-->
				<section class="content three-fourth">
					<!--cwrap-->
					<div class="cwrap">
						<!--entries-->
						<div class="entries row">
							<!--featured recipe-->
							<div class="featured two-third">
								<header class="s-title">
									<!--<h2 class="ribbon"></h2>-->
									<div class="ribbon bright recpi"><div><h2>Recipe of the Week</h2></div></div>
								</header>
								<?php foreach($get_recipe_week_data as $get_week) { ?>
								<article class="entry">
									<figure>
										<img src="<?php echo base_url()?>uploads/recipe_image/<?=$get_week->feature_image?>" height="430" width="570" alt="" />
										<figcaption><a href="<?php echo base_url()?>recipe/<?php echo $get_week->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>recipe/<?php echo $get_week->slug;?>"><?php echo $get_week->recipe_name;?></a></h2>
										<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
											<div class="comments"><i class="fa fa-comment"></i>
											<a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>#comments">
											<?php 
											$CI =& get_instance();
											$CI->load->model('Home_model');
											$result_data = $CI->Home_model->count_comments($get_week->recipe_code);
											echo  $result_data->total;
											
											?>
											</a></div>
										</div>
									</div>
										<p><?php echo $get_week->description;?></p>
										<div class="actions">
											<div>
												<a href="<?php echo base_url()?>recipe/<?php echo $get_week->slug;?>" class="button">See the full recipe</a>
												<!--<div class="more"><a href="recipes2.html">See past recipes of the day</a></div>-->
											</div>
										</div>
										
									</div>
								</article>
								<?php } ?>
							</div>
							<!--//featured recipe-->
							
							<!--featured member-->
							<div class="featured one-third">
								<header class="s-title">
									<!--<h2 class="ribbon star"></h2>-->
									<div class="ribbon bright recpi"><div><h2>Featured Profile</h2></div></div>
								</header>
								<article class="entry">
									<figure>
										<img src="<?php echo base_url()?>themes/front/images/avatar1.jpg" alt="" />
										<figcaption><a href="<?php echo base_url()?>users"><i class="icon icon-themeenergy_eye2"></i> <span>View member</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>users">Kimberly C.</a></h2>
										<blockquote><i class="fa fa-quote-left"></i>Traditional dishes and fine bakery products accompanied by beautiful photographs to bend around and attract the tryout! Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</blockquote>
										<div class="actions">
											<div>
												<a href="<?php echo base_url()?>users" class="button">View Profile</a>
												<!--<div class="more"><a href="#">See past featured members</a></div>-->
											</div>
										</div>
									</div>
								</article>
							</div>
							<!--//featured member-->
						</div>
						<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads.png" alt=""/></div>
						<div class="entries row">
							<!--featured recipe-->
							<div class="featured two-third">
								<header class="s-title">
									<!--<h2 class="ribbon"></h2>-->
									<div class="ribbon bright recpi"><div><h2>Recipe of the Month</h2></div></div>
								</header>
								<?php foreach($get_recipe_week_month as $get_month) { ?>
								<article class="entry">
									<figure>
										<img src="<?php echo base_url()?>uploads/recipe_image/<?=$get_month->feature_image?>" height="430" width="570"  alt="" />
										<figcaption><a href="<?php echo base_url()?>recipe/<?php echo $get_month->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>recipe/<?php echo $get_month->slug;?>"><?php echo $get_month->recipe_name;?></a></h2>
										<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
											<div class="comments"><i class="fa fa-comment"></i>
											<a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>#comments">
											<?php 
											$CI =& get_instance();
											$CI->load->model('Home_model');
											$result_data = $CI->Home_model->count_comments($get_month->recipe_code);
											echo  $result_data->total;
											
											?>
											</a></div>
										</div>
									</div>
										<p><?php echo $get_month->description;?></p>
										<div class="actions">
											<div>
												<a href="<?php echo base_url()?>recipe/<?php echo $get_month->slug;?>" class="button">See the full recipe</a>
												<!--<div class="more"><a href="recipes2.html">See past recipes of the day</a></div>-->
											</div>
										</div>
										
									</div>
								</article>
								<?php } ?>
							</div>
							<!--//featured recipe-->
							
							<!--featured member-->
							<div class="featured one-third">
								<header class="s-title">
									<!--<h2 class="ribbon star"></h2>-->
									<div class="ribbon bright recpi"><div><h2>Featured Blog</h2></div></div>
								</header>
								<?php foreach($featured_blog_data as $fb){ ?>
									
								<article class="entry">
									<figure>
										<img src="<?php echo base_url()?>uploads/blog_image/<?=$fb->feature_image?>" height="270px" width="270px" alt="" />
										<figcaption><a href="<?php echo base_url()?>blog/<?php echo $fb->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View Blog</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="<?php echo base_url()?>blog/<?php echo $fb->slug;?>"><?php echo $fb->blog_name;?></a></h2>
										<blockquote><i class="fa fa-quote-left"></i><?php echo $fb->blog_description;?>.</blockquote>
										<div class="actions">
											<div>
												<a href="<?php echo base_url()?>blog/featured" class="button">View Featured Blog</a>
												<!--<div class="more"><a href="#">See past featured members</a></div>-->
											</div>
										</div>
									</div>
								</article>
								<?php } ?>
							</div>
							<!--//featured member-->
						</div>
						
						<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads.png" alt=""/></div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<div class="ribbon bright"><div><h2>Latest Recipes</h2></div></div>
						</header>
						
						<!--entries-->
						<div class="entries row">
							<!--item-->
							<?php foreach ($latest_recipe_data as $res_latest_rcp) { ?>
							<div class="entry one-third">
								<figure>
									<img src="<?php echo base_url()?>uploads/recipe_image/<?=$res_latest_rcp->feature_image?>" height="205px" width="270px" alt="" />
									<figcaption><a href="<?php echo base_url()?>recipe/<?php echo $res_latest_rcp->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View Recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="<?php echo base_url()?>recipe/<?php echo $res_latest_rcp->slug;?>"><?php echo $res_latest_rcp->	recipe_name;?></a></h2>
									<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
											<div class="comments"><i class="fa fa-comment"></i>
											<a href="recipe.html#comments">
											<?php 
											$CI =& get_instance();
											$CI->load->model('Home_model');
											$result_data = $CI->Home_model->count_comments($res_latest_rcp->recipe_code);
											echo  $result_data->total;
											
											?>
											</a></div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<!--item-->
							<div class="quicklinks">
								<a href="<?php echo base_url()?>recipe/" class="button">More recipes</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
					
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<div class="ribbon bright"><div><h2>Featured Recipe</h2></div></div>
						</header>
						
						<!--entries-->
						<div class="entries row">
							<!--item-->
							<?php foreach($featured_recipe_data as $res_rcp_fet) { ?>
							<div class="entry one-third">
								<figure>
									<img src="<?php echo base_url()?>uploads/recipe_image/<?=$res_rcp_fet->feature_image?>" height="205px" width="270px" alt="" />
									<figcaption><a href="<?php echo base_url()?>recipe/<?php echo $res_rcp_fet->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="<?php echo base_url()?>recipe/<?php echo $res_rcp_fet->slug;?>"><?php echo $res_rcp_fet->recipe_name;?></a></h2> 
									<div class="actions">
										<div>
											<div class="likes">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">
											<?php 
											$CI =& get_instance();
											$CI->load->model('Home_model');
											$result_data = $CI->Home_model->count_comments($res_rcp_fet->recipe_code);
											echo  $result_data->total;
											
											?>
											</a></div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<!--item-->
							<div class="quicklinks">
								<a href="<?php echo base_url()?>recipe/featured" class="button">More recipes</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<div class="ribbon bright"><div><h2>Featured Products</h2></div></div>
						</header>
						
						<!--entries-->
						<div class="entries row">
							<!--item-->
							<div class="entry one-third">
								<figure>
								<img src="<?php echo base_url()?>themes/front/images/img6.jpg" alt="" />
								<figcaption><a href="cart.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
							</figure>
							<div class="container shop-title">
								<h2><a href="cart.html"><center>Thai fried rice with fruit and vegetables</center></a></h2>                                 <center><span class="linethrough" style="text-decoration: line-through;"><i class="fa fa-inr"></i> 400</span><span class="price"><i class="fa fa-inr"></i> 400</span></center>
								<div class="actions">
									<div class="quicklinks shop">
								<a href="shop-details" class="button">SHOP</a>
							</div>
								</div>
								<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(5.0)</div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
										</div>
									</div>
							</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
								<img src="<?php echo base_url()?>themes/front/images/img6.jpg" alt="" />
								<figcaption><a href="cart.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
							</figure>
							<div class="container shop-title">
								<h2><a href="cart.html"><center>Thai fried rice with fruit and vegetables</center></a></h2>                                 <center><span class="linethrough" style="text-decoration: line-through;"><i class="fa fa-inr"></i> 400</span><span class="price"><i class="fa fa-inr"></i> 400</span></center>
								<div class="actions">
									<div class="quicklinks shop">
								<a href="shop-details" class="button">SHOP</a>
							</div>
								</div>
								<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(5.0)</div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
										</div>
									</div>
							</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
								<img src="<?php echo base_url()?>themes/front/images/img6.jpg" alt="" />
								<figcaption><a href="cart.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
							</figure>
							<div class="container shop-title">
								<h2><a href="cart.html"><center>Thai fried rice with fruit and vegetables</center></a></h2>                                 <center><span class="linethrough" style="text-decoration: line-through;"><i class="fa fa-inr"></i> 400</span><span class="price"><i class="fa fa-inr"></i> 400</span></center>
								<div class="actions">
									<div class="quicklinks shop">
								<a href="shop-details" class="button">SHOP</a>
							</div>
								</div>
								<div class="actions">
										<div>
											<div class="likes"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(5.0)</div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
										</div>
									</div>
							</div>
							</div>
							<!--item-->
							
							
							
							<div class="quicklinks">
								<a href="#" class="button">More Products</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<div class="ribbon bright"><div><h2>Latest posts</h2></div></div>
						</header>
						<!--entries-->
						
						<div class="entries row">
						<?php foreach($blog_data as $res_blog)
						{
							?>
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="<?php echo base_url()?>uploads/blog_image/<?=$res_blog->feature_image?>" height="205px" width="270px" alt="" />
									<figcaption><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>"><?php echo $res_blog->blog_name;?></a></h2> 
									<div class="actions">
										<div>
											<div class="date"><i class="fa fa-calendar"></i><a href="javascript:void(0)"><?php echo $res_blog->post_on;?></a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>">
											<?php 
											$CI =& get_instance();
											$CI->load->model('Home_model');
											$result_data = $CI->Home_model->count_comments($res_blog->blog_code);
											echo  $result_data->total;
											
											?>	
											</a></div>
										</div>
									</div>
									<div class="excerpt">
										<p><?php echo $res_blog->blog_description;?></p>
									</div>
								</div>
							</div>
							<!--item-->
							<?php } ?>
							
							<div class="quicklinks">
								<a href="<?php echo base_url()?>blog/" class="button">More posts</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
						<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-2.png" alt=""/></div>
					</div>
					<!--//cwrap-->
				</section>
				<!--//content-->
				
			
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
				    <div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="" />
					</div>
					<div class="widget">
						<h3>Recipe Categories</h3>
						<ul class="boxed">
						<?php 
						$i=0;
						foreach($recipe_category_data as $res_cat) { $i++;
						if($i%2==0){
							$class="light";
						}else{
							$class="dark";
						}
						 ?>
							<li class="<?php echo $class;?>"><a href="<?php echo base_url()?>recipe/category/<?php echo $res_cat->slug;?>" title="<?php echo $res_cat->cat_name;?>"><i class="icon icon-themeenergy_pasta"></i> <span><?php echo $res_cat->cat_name;?></span></a></li>
							<?php } ?>
							
						</ul>
					</div>
						
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-5.png" alt="" />
					</div>
						
					<div class="widget members">
						<h3>Our members</h3>
						<div id="members-list-options" class="item-options">
						  <a href="#" class="selected">Newest</a>
						  <a href="#">Popular</a>
						</div>
						<ul class="boxed">
						<?php foreach ($new_member_data as $nmem_data) { ?>
							<li>
							<div class="avatar">
							<a href="<?php echo base_url()?>users/<?php echo $nmem_data->profile_url;?>"><img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$nmem_data->profile_photo?>" alt="" /><span><?php echo $nmem_data->full_name;?></span></a>
							</div></li>
							<?php } ?>
						</ul>
					</div>
						
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-4.png" alt="" />
					</div>
				</aside>
			</div>
			<!--//right sidebar-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	<!--call to action-->
	<section class="cta">
		<div class="wrap clearfix">
			<a href="<?php echo base_url()?>user-registration" class="button big white right">Join US</a>
			<h2>Already convinced? Join us by registering right now.</h2>
		</div>
	</section>
	<!--//call to action-->