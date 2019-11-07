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
				    	<img src="images/bg/body.jpg" class="pro-cover"/>
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
								<li><a href="#recipes" title="My recipes">My recipes <span>3</span></a></li>
								<li><a href="#articles" title="Article">Article <span>5</span></a></li>
							</ul>
						</nav>
						
						<!--Profile-->
						<?php foreach ($member_single_data as $res_data) { ?>
						<div class="tab-content" id="profile">
							<div class="row">
								<dl class="basic two-third">
									<dt>Name</dt>
									<dd><?php echo $res_data->full_name ; ?></dd>
									<dt>Favorite cusine</dt>
									<dd>Thai, Mexican</dd>
									<dt>Favorite appliances</dt>
									<dd>Blender, sharp knife</dd>
									<dt>Favorite spices</dt>
									<dd>Chilli, Oregano, Basil</dd>
									<dt>Recipes submitted</dt>
									<dd>9</dd>
									<dt>Posts submitted</dt>
									<dd>9</dd>
								</dl>
								
							</div>
						</div>
						<?php } ?>
						<!--//Profile-->
					
						<!--my recipes-->
						<div class="tab-content" id="recipes">
							<div class="entries row">
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img6.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Thai fried rice with fruit and vegetables</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img5.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Spicy Morroccan prawns with cherry tomatoes</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img8.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Super easy blueberry cheesecake</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
							</div>
						</div>
						<!--//my recipes-->
						
						<!--my Activity-->
						<div class="tab-content" id="articles">
							<!--entries-->
							<div class="entries row">
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img12.jpg" alt="" />
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">Barbeque party</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
										<div class="excerpt">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img11.jpg" alt="" />
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">How to make sushi</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
										<div class="excerpt">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img10.jpg" alt="" />
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">Make your own bread</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
										<div class="excerpt">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
										</div>
									</div>
								</div>
								<!--item-->
							</div>
							<!--//entries-->
						</div>
						<!--//my Activity-->
						<div class="ads1"><img src="img/ads-2.png" alt=""/></div>
					</div>
					
					<!--right sidebar-->
				<aside class="sidebar one-fourth">
				    <div class="widget">
						<img src="img/ads-3.png" alt="" />
					</div>
						
					<div class="widget">
						<img src="img/ads-5.png" alt="" />
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