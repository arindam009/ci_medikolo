<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>About us</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>About us</h1>
				</header>
				<!--content-->
				<section class="content three-fourth">
					<!--one-half-->
					<section class="container">
						<p>Hello Foodies! The concept of Mirchi Chef has evolved from the trending habits of both male & female cooking food at home. The so called ‘Kitchen’ does no longer belong to the female member(s) of the family. Everyone is a Chef in the family and makes food that is being relished by the family members.</p>

<p>So, if you are a home chef, let the aroma of your recipe come out and enter the nose holes of others. Do share your recipe with Mirchi Chef and showcase your cooking skills. This platform is FREE for everyone to post recipes & articles relating to food. Let Mirchi Chef turn your kitchen a Chilli Kitchen indeed. Joining Mirchi Chef is easy and FREE.</p>

<p>By joining us you will join a foodie community where you will get to list your recipes and food ideas with hundreds of other like-minded members like you. You will also get a chance to win awesome prizes, make new friends and share delicious recipes.</p>

<p>Not only listings of your recipes & articles, Mirchi Chef is also a platform to shop the unique ingredients from different parts of India. So you have dual benefits of listings your recipes and shopping unique ingredients.</p>

<p>Happy Associations with Mirchi Chef!</p>
						
					</section>
					<!--//one-half-->
				</section>
				<!--//content-->
				
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
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
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="" />
					</div>
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->