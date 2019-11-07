<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>About Us</h1>
					<ul class="list-unstyled">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="active">About</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    
    	<section class="about-ds">
		<div class="container">
			<div class="row">
	            <div class="col-md-12 col-sm-12 about-ds-content">
					<div class="section-header03">
						<h2>About <span>Us</span></h2>
					</div>
                    <?php foreach($pages_data as $pagesdata){?>
					<p><?php echo $pagesdata->descrip;?></p>
                    
                    <?php } ?>
					
            	</div>
	            
			</div>
		</div>
	</section>
	
	<section class="information-cta">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                  <?php foreach($pages_data as $pagesdata_block){?>
					<h2><?php echo $pagesdata_block->extra_title ;?></h2>
					<?php echo $pagesdata_block->extra_descrip ;?>
                     <?php } ?>
				</div>
                
                
			</div>
		</div>
	</section>
    
    <section class="">
		<div class="container">
			<div class="row">
				
                
                <div class="col-md-12 col-sm-12 about-ds-content cntctdec">
                       <h2 style="text-align: center !important;"><strong>OUR TRAINING <span style="color: #ff6600;">CENTERS&nbsp;IN INDIA</span></strong></h2>
                    
                    <ul class="centerlist">
                            
                     <?php foreach($center_data as $centerdata){?>
				
					 <li>
                     <a href="<?php echo $centerdata->link;?>" target="_blank">
                     <div class="icon">
                      <img src="<?php echo base_url()?>uploads/educenter_image/<?php echo $centerdata->image_src;?>" alt="" >

                    </div>
					<div class="content"><?php echo $centerdata->title;?></div>
                    <div class="clearfix"></div>
                    </a>
					</li>
                    
                    <?php } ?>
                    
                    </ul>
					
            	</div>
			</div>
		</div>
	</section>
		