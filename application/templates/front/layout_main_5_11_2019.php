<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title;?></title>
    <meta name="google-site-verification" content="SIRTOrE21qitCarPWSfTV5TZ0xTkKYWDveG610Vt4s4" />  
    <meta name="keywords" content="<?php echo $MetaKeyword;?>">
    <meta name="description" content="<?php echo $MetaDescription;?>">
	<meta name="robots" content="<?php if($MainIndex!=''){ echo $MainIndex; } else  { echo 'index';}?>, <?php if($RobotIndex!=''){ echo $RobotIndex; } else  { echo 'follow';}?>" />
    <link rel="canonical" href="<?php echo $CanonicalTag;?>" /> 
	<!-- Favicon -->

   <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>themes/front/images/fav.png">
    <link rel="preload" as="font" href="<?php echo base_url()?>themes/front/fonts/icomoon/fonts/icomoon543e.ttf?x9i9xv" type="font/ttf" crossorigin="anonymous"><!-- Vendor CSS -->
    <link href="<?php echo base_url()?>themes/front/js/plugins.css" rel="stylesheet"><!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>themes/front/css/style-light.css" rel="stylesheet">
    <!--icon font-->
    <link href="<?php echo base_url()?>themes/front/fonts/icomoon/icomoon.css" rel="stylesheet">

	

</head>
<?php $current_url=base_url(uri_string());
?>
<body <?php if(base_url()==$current_url){?>class="home-page is-dropdn-click has-slider"<?php } ?> >

	<div class="body-preloader">
        <div class="loader-wrap">
            <div class="dots">
                <div class="dot one"></div>
                <div class="dot two"></div>
                <div class="dot three"></div>
            </div>
        </div>
    </div>
    <header class="hdr global_width hdr_sticky hdr-mobile-style2">
        <!-- Promo TopLine -->
       
        <!-- /Promo TopLine -->
        <!-- Mobile Menu -->
        <div class="mobilemenu js-push-mbmenu">
            <div class="mobilemenu-content">
                <div class="mobilemenu-close mobilemenu-toggle">CLOSE</div>
                <div class="mobilemenu-scroll">
                    <div class="mobilemenu-search"></div>
                    <div class="nav-wrapper show-menu">
                        <div class="nav-toggle"><span class="nav-back"><i class="icon-arrow-left"></i></span> <span class="nav-title"></span></div>
                        <ul class="nav nav-level-1">
                             <li><a href="#">Home</a></li>
                             <li><a href="#">About Us</a></li>
                              <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>

                        
                    </div>
                    <div class="mobilemenu-bottom">
                        <a href="#" class="btnshop" style="color: #fff; width: 100%;"><i class="icon icon-handbag"></i> SHOP NOW</a>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- /Mobile Menu -->
        <div class="hdr-mobile show-mobile">
            <div class="hdr-content">
                <div class="container">
                    <div class="logo-holder"><a href="#" class="logo"><img src="<?php echo base_url()?>themes/front/images/logo.png" srcset="<?php echo base_url()?>themes/front/images/logo.png 2x" alt=""></a></div>

                    <div class="hdr-mobile-right">
                        <div class="hdr-topline-right links-holder"></div>
                         <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-desktop hide-mobile">
            <div class="hdr-topline">
                <div class="container">
                    <div class="row">
                        <div class="col-auto hdr-topline-left">
                            
                           <div class="custom-text whitecolor"><i class="icon icon-mobile"></i><b>8 800 265 89 56</b></div>
                        </div>
                        <div class="col hdr-topline-center">
                            <div class="custom-text whitecolor"><marquee attribute_name = "attribute_value"....more attributes>
   Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet. Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet
           </marquee></div>
                            
                        </div>
                        <div class="col-auto hdr-topline-right links-holder">
                            <!-- Header Search -->
                            <div class="dropdn dropdn_search hide-mobile @@classes"><a href="#" class="dropdn-link whitecolor"><i class="icon icon-search2"></i><span>Search</span></a>
                                <div class="dropdn-content">
                                    <div class="container">
                                        <form action="#" class="search"><button type="submit" class="search-button"><i class="icon-search2"></i></button> <input type="text" class="search-input" placeholder="search keyword">
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="dropdn dropdn_account @@classes"><a href="#" class="dropdn-link whitecolor"><i class="icon icon-person"></i><span>Login</span></a>
                                <div class="dropdn-content">
                                    <div class="container">
                                        <div class="dropdn-close">CLOSE</div>
                                        <ul>
                                            <li><a href="#"><i class="icon icon-person-fill"></i><span>My Account</span></a></li>
                                            <li><a href="#"><i class="icon icon-lock"></i><span>Log In</span></a></li>
                                            <li><a href="#"><i class="icon icon-lock"></i><span>Logout</span></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hdr-content hide-mobile">
                <div class="container">
                    <div class="row">
                        <div class="col-auto logo-holder"><a href="#" class="logo"><img src="<?php echo base_url()?>themes/front/images/logo.png" srcset="<?php echo base_url()?>themes/front/images/logo-retina.png 2x" alt=""></a></div>
                        <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                        <div class="nav-holder">
                            <div class="hdr-nav">
                                <ul class="mmenu mmenu-js">
                                    <li class="mmenu-item--simple hovered"><a href="#" title="">Home</a></li>
                                    <li class="mmenu-item--simple"><a href="#" title="">About Us</a></li>
                                    <li class="mmenu-item--simple"><a href="#" title="">Terms of Use</a></li>                             
                                    <li class="mmenu-item--simple"><a href="#" title="">Contact</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                        <!--//navigation-->
                        <div class="col-auto minicart-holder">
                            <div class="minicart minicart-js"><a href="#" class="btnshop desktopshop" style="color: #fff;"><i class="icon icon-handbag"></i> SHOP NOW</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-holder compensate-for-scrollbar">
            <div class="container">
                <div class="row"><a href="#" class="mobilemenu-toggle show-mobile"><i class="icon icon-menu"></i></a>
                    <div class="col-auto logo-holder-s"><a href="#" class="logo"><img src="<?php echo base_url()?>themes/front/images/logo.png" srcset="<?php echo base_url()?>themes/front/images/logo-retina.png 2x" alt=""></a></div>
                    <!--navigation-->
                    <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                    <div class="nav-holder-s"></div>
                    <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                    <!--//navigation-->
                    <div class="col-auto minicart-holder-s"></div>
                </div>
            </div>
        </div>
    </header>
      <?php echo $template['body']; ?>

	 <footer class="page-footer footer-style-1 global_width">
        <div class="holder bgcolor bgcolor-1 mt-0">
            <div class="container">
                <div class="row shop-features-style3">
                    <div class="col-md"><a href="#" class="shop-feature light-color">
                            <div class="shop-feature-icon"><i class="icon-box3"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">Doorstep Delivery</div>
                                <div class="text2">Lorem ipsum dolor sit amet</div>
                            </div>
                        </a></div>
                    <div class="col-md"><a href="#" class="shop-feature light-color">
                            <div class="shop-feature-icon"><i class="icon-arrow-left-circle"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">Smart Returns</div>
                                <div class="text2">Lorem ipsum dolor sit amet</div>
                            </div>
                        </a></div>
                    <div class="col-md"><a href="#" class="shop-feature light-color">
                            <div class="shop-feature-icon"><i class="icon-pencil"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">24x7 Support</div>
                                <div class="text2">Lorem ipsum dolor sit amet</div>
                            </div>
                        </a></div>
                          <div class="col-md"><a href="#" class="shop-feature light-color">
                            <div class="shop-feature-icon"><i class="icon-circle-dollar"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">Easy Payment Option</div>
                                <div class="text2">Lorem ipsum dolor sit amet</div>
                            </div>
                        </a></div>
                </div>
            </div>
        </div>
    
        <div class="footer-top container">
            <div class="row py-md-4">
                <div class="col-md-4 col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Categories</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="#">Women's Fashion</a></li>
                                <li><a href="#">Mens's Accessories</a></li>
                                <li><a href="#">Kid's Wear</a></li>
                                <li><a href="#">All Brands</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Customer Service</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">F.A.Q.</a></li>
                                <li><a href="#">Contact Info</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>My Account</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Track My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Information</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Portfolio</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Arrival Sales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>contact us</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul class="contact-list">
                                <li><i class="icon-phone"></i><span><span class="h6-style">Call Us:</span><span>+91 888 232 7474</span></span></li>
                                <li><i class="icon-clock4"></i><span><span class="h6-style">Hours:</span><span>Mon-fri 9am-8pm<br>sat 9am-6pm</span></span></li>
                                <li><i class="icon-mail-envelope1"></i><span><span class="h6-style">E-mail:</span><span><a href="mailto:info@sattyanarayan.com">info@sattyanarayan.com</a></span></span></li>
                                <li><i class="icon-location1"></i><span><span class="h6-style">Address:</span><span>C/6 Saltleke , Kolkata - 700091</span></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="footerbottom">
                <div class="footer-bottom container">
                    <div class="row lined py-2 py-md-3">
                       <div class="col-md-2 hidden-mobile"><a href="#"><img src="<?php echo base_url()?>themes/front/images/logo.png" class="img-fluid" alt=""></a></div>
                        <div class="col-md-6 col-lg-5 footer-copyright">
                            <p class="footer-copyright-text"><span>© Copyright</span> 2019 <a href="#">Sattyanarayan</a>. <span>All rights reserved.</span></p>
                            <p class="footer-copyright-links"><a href="#">Terms & conditions</a> <a href="#">Privacy policy</a></p>
                        </div>
                        <div class="col-md-auto">
                            <div class="payment-icons"><img src="<?php echo base_url()?>themes/front/images/payment/payment-card-visa.png"> 
                                <img src="<?php echo base_url()?>themes/front/images/payment/payment-card-mastecard.png"> 
                                <img src="<?php echo base_url()?>themes/front/images/payment/payment-card-discover.png" ></div>
                        </div>
                        <div class="col-md-auto ml-lg-auto">
                            <ul class="social-list">
                                <li><a href="#" class="icon icon-facebook"></a></li>
                                <li><a href="#" class="icon icon-twitter"></a></li>
                                <li><a href="#" class="icon icon-google"></a></li>
                                <li><a href="#" class="icon icon-instagram"></a></li>
                                <li><a href="#" class="icon icon-youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    </div>
    </footer><a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top"><i class="icon icon-angle-up"></i></a>
  
    
    
   
    <div class="body-preloader">
        <div class="loader-wrap">
            <div class="dots">
                <div class="dot one"></div>
                <div class="dot two"></div>
                <div class="dot three"></div>
            </div>
        </div>
    </div>
    
    
    <script src="<?php echo base_url()?>themes/front/js/plugins.js"></script>
    <script src="<?php echo base_url()?>themes/front/js/app.js"></script>



</body>

</html>

