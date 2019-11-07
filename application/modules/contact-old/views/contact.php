<?php $data_settings = get_settings_data();  ?>    

<section class="page-header">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<h1>Contact Us</h1>

					<ul class="list-unstyled">

						<li><a href="<?php echo base_url();?>">Home</a></li>

						<li class="active">Contact</li>

					</ul>

				</div>

			</div>

		</div>

	</section>

    

    	<section class="contact-wrapper">

		<div class="container">

			<div class="row">

            <div class="col-md-12 col-sm-12">

                             <?php foreach($pages_data as $pagesdata){?>

				 <div class="section-header03">

						<h2 style="margin-bottom:15px;"><?php echo $pagesdata->heading_title; ?></h2>

					</div>

					  <div class="corpocnt">

                   

					<p><?php echo $pagesdata->descrip;?></p>

                    </div>

                    

                    <?php } ?>

					

            	</div>

            

				<div class="col-sm-12">

					<div class="contact-two-top contact-two-bottom" style="margin-top:10px;">

						<div class="row">

                        	

                        

                        

						<div class="col-sm-5">

							<div class="contact-info row">

								<div class="col-sm-12">

									<h3>Contact Info</h3>

								</div>

								<div class="col-sm-12">

									<div class="contact-info-box">

										<div class="icon"><i class="fa fa-map-marker"></i></div>

										<div class="cinfo">

											<h4>Postal Address:</h4>

											<p><?php echo $data_settings['address'];?></p>

										</div>

									</div>

								</div>

								<div class="col-sm-12">

									<div class="contact-info-box">

										<div class="icon"><i class="fa fa-phone"></i></div>

										<div class="cinfo">

											<h4>Phone</h4>

											<p><?php echo $data_settings['phone_no_1'];?> <?php if($data_settings['phone_no_2']!=''){?>| <?php echo $data_settings['phone_no_2'];?>  <?php } ?> <?php if($data_settings['phone_no_3']!=''){?> | <?php echo $data_settings['phone_no_3'];?> <?php } ?></p>

										</div>

									</div>

								</div>

								

								

								<div class="col-sm-12">

									<div class="contact-info-box">

										<div class="icon"><i class="fa fa-envelope"></i></div>

										<div class="cinfo">

											<h4>Email</h4>

											<p><?php echo $data_settings['email'];?></p>

										</div>

									</div>

								</div>

							</div>

						</div>	





                             



							<div class="col-sm-7 ">

                            <div class="cntfrm">

                            <script type="text/javascript">



function isValidEmailAddress(emailAddress) {

    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

    // alert( pattern.test(emailAddress) );

    return pattern.test(emailAddress);

};



   function contact_submit(){

				

		var fullname = $('#fullname').val();

		var emailadd = $('#emailadd').val();

		var contactno = $('#contactno').val();

		var messageqry = $('#messageqry').val();

			

			var qry_type  = 'Contact Query';

			

	       var cnc_captcha = $('#cnc_captcha').val();

		var cnc_hdn_captcha = $('#cnc_hdn_captcha').val();		

			

		if(fullname == '')

		{

			alert('Please Enter Your Full Name !!');

			$('#fullname').focus();

		}

		else if(emailadd =='')

		{

	     	alert('Please Enter Your Email Address !!');	

			$('#emailadd').focus();

		}

		 else if(!isValidEmailAddress(emailadd))

		{

			alert('Please Enter Your Valid Email Address !!');

			$('#emailadd').focus();

			

		} 

		else if(contactno =='')

		{

	     	alert('Please Enter Your Contact Number !!');	

			$('#contactno').focus();

		}

		else if(isNaN(contactno))
		{
			$('#contactno').focus();
			alert('Please Enter Your Valid Phone Number !!');	
			
		}
		else if(contactno.length !=10)
		{
			$('#contactno').focus();
			alert('Please Enter Your Valid Phone Number Digit !!');	
		}

		else if(messageqry =='')

		{

	     	alert('Please Enter Your Message !!');	

			$('#messageqry').focus();

		}

		else if(cnc_captcha =='')

		{

	     	alert('Please Enter Your Captcha Code !!');	

			$('#cnc_captcha').focus();

		}

		else if(cnc_captcha != cnc_hdn_captcha)

		{

	     	alert('Please Enter Your Valid Captcha Code !!');	

			$('#cnc_captcha').focus();

		}

		else

		{

			  $.ajax({

				  type:'POST',

				  url:"<?php echo base_url(); ?>" + "form/form_data_submit",

				   data:{full_name:fullname,email_id:emailadd,contact_no:contactno,message_qry:messageqry,qry_type:qry_type},

				  success:function(data)

				    {

					alert(data);

					//alert('Your requeset has been proceed will be touch you shortly !!');

					$('#fullname').val('');

					$('#emailadd').val('');

					$('#contactno').val('');

					$('#messageqry').val('');

					$('#cnc_captcha').val('');

					}

				  

				  })

		}

		

		}

    

    

    </script>

								<h3>Write Us</h3>

								<form id="contact" method="post" action="">

									<div class="form-group row">

										<div class="col-sm-4">

											<input type="text" placeholder="Name *" id="fullname">

										</div>

										<div class="col-sm-4">

											<input type="email" placeholder="Email *" id="emailadd">

										</div>

										<div class="col-sm-4">

											<input type="text" placeholder="Contact No. *" id="contactno">

										</div>

										<div class="col-sm-12">

											<textarea placeholder="Message *" id="messageqry"></textarea>

										</div>

                                      

										 <?php 

				$num_cnc1=rand(1,9); //Generate First number between 1 and 9  

                $num_cnc2=rand(1,9); //Generate Second number between 1 and 9  

                $captcha_total_cnc =$num_cnc1+$num_cnc2;

				?>

                <div class="col-sm-4 captchabx">

				<input type="text"  value="<?php echo $num_cnc1;?> + <?php echo $num_cnc2;?> = " placeholder="<?php echo $num_cnc1;?> + <?php echo $num_cnc2;?> = " readonly="readonly" style="letter-spacing:12px;">

										</div>

                

              

                <div class="col-lg-4">

                <input type="text" class="form-control" placeholder="Enter Captcha Code*" id="cnc_captcha" style="border-radius:2px;" >

                 <input type="hidden"  id="cnc_hdn_captcha"  value="<?php echo $captcha_total_cnc;?>">

										</div>

										

									

                                    <div class="col-sm-12 ">

											<button type="button" id="contactsubmit" onclick="contact_submit()">Send Message</button>

										</div>

									<div id="form-messages"></div>

                                    </div>

								</form>

                                </div>

							</div>

                            

                            <div class="col-md-12 col-sm-12 about-ds-content cntctdec">

                             <?php foreach($pages_data as $pagesdata){?>

				

					<p><?php echo $pagesdata->extra_descrip;?></p>

                    

                    <?php } ?>

                    

                    <ul class="addresslist">

                            

                     <?php foreach($address_data as $addressdata){?>

				

					 <li><?php echo $addressdata->address;?></li>

                    

                    <?php } ?>

                    

                    </ul>

					

            	</div>

                

                

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

				</div>

			</div>

		</div>

	</section>

	

	

		