<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <meta name="author" content="Medikilo">
    <meta name="robots" content="index, nofollow" /> 
    <link rel="shortcut icon" href="<?php echo base_url()?>themes/admin/images/logo_medikolo.jpg" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>themes/admin/images/logo_medikolo.jpg" type="image/x-icon">

    <title><?php echo $title;?></title>

    <!--Core CSS -->
    <link href="<?php echo base_url()?>themes/admin/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>themes/admin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>themes/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>themes/admin/css/style-responsive.css" rel="stylesheet">
   

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/admin/js/bootstrap-datepicker/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/admin/js/bootstrap-timepicker/css/timepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/admin/js/bootstrap-colorpicker/css/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/admin/js/bootstrap-datetimepicker/css/datetimepicker.css">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>themes/admin/js/jquery.js"></script>
     <script src="<?php echo base_url()?>themes/admin/js/jquerynew.js"></script>
</head>


<body>


<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->

<div class="brand">
    <a href="<?php echo base_url();?>admin/home" class="logo">
        <img src="<?php echo base_url()?>themes/admin/images/logo_medikolo.jpg" alt="" height="65" width="225">
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<!--logo end-->

<div class="nav notify-row" id="top_menu">


</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

     
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo base_url()?>themes/admin/images/profile.png">
                <span class="username">Admin</span>
                <b class="caret"></b>
            </a>

            <ul class="dropdown-menu extended logout">

               <!-- <li><a href="<?php //echo base_url()?>admin/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="<?php //echo base_url()?>admin/#"><i class="fa fa-cog"></i> Settings</a></li>-->
                <li><a href="<?php echo base_url('admin/login/logout')?>"><i class="fa fa-key"></i> Log Out</a></li>

            </ul>

        </li>

     
    </ul>

    <!--search & user info end-->

</div>

</header>

<!--header end-->

<aside>

    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </li>
            

            <li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-th"></i><span>CMS</span></a>

                <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/pages">Pages Management</a></li>
                    <li><a href="<?php echo base_url()?>admin/homepageslider">Home Banner Management</a></li>
                    

                </ul>

            </li>

            
             <li class="sub-menu">

                <a href="javascript:;"><i class="fa fa-th"></i><span>Blog Management</span></a>
                
                 <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/category/blog">Category</a></li>
                    <li><a href="<?php echo base_url()?>admin/blog">Blog</a></li>
                </ul>
            </li>


			<li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-th"></i><span>Comment Management</span> </a>

                <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/comment">All Comment</a></li>
                </ul>

            </li>

            

			

            

        
            

            

            
           

			<li class="sub-menu">

                <a href="javascript:;"><i class="fa fa-th"></i><span>User Management</span> </a>

                <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/user">User</a></li>
                    <li><a href="<?php echo base_url()?>admin/customers">Customers</a></li>
                </ul>

            </li>

           <!--   <li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-laptop"></i><span>SEO Management</span></a>
                <ul class="sub">
                    <li><a href="#">All List</a></li>
                </ul>
              </li>-->
            
			<li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-laptop"></i><span>Testimonials</span></a>
                <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/testimonials">All Testimonials</a></li>
                </ul>

            </li>
               <li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-laptop"></i><span>Master Settings</span></a>

                <ul class="sub">
				     <li><a href="<?php echo base_url()?>admin/department">Department</a></li>
					 <li><a href="<?php echo base_url()?>admin/company">Company Details </a></li>
                     
                     
                     <li><a href="<?php echo base_url()?>admin/doctors">Doctors</a></li>
					 <li><a href="<?php echo base_url()?>admin/authors">Authors</a></li>
         
                   
                </ul>

            </li>

            <li class="sub-menu">

                <a href="javascript:;"><i class="fa fa-laptop"></i><span>Settings</span></a>
                 <ul class="sub">
                    <li><a href="<?php echo base_url()?>admin/profile">Profile</a></li>
                    <li><a href="<?php echo base_url()?>admin/settings">Social | Contact Settings</a></li>
                   
                 </ul>

            </li>

         
            

        </ul></div>        

<!-- sidebar menu end-->

    </div>

</aside>

<!--sidebar end-->

    <!--main content start-->

    <?php echo $template['body']; ?> 
   
   <!--main content End -->

<footer>
    <div class="copyright text-right">
     Copy @2019 
     <br>Design & Development By <a href="" target="_blank"></a>
   </div>
</footer>
<!-- Placed js at the end of the document so the pages load faster -->



<!--Core js-->

<script src="<?php echo base_url()?>themes/admin/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url()?>themes/admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url()?>themes/admin/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url()?>themes/admin/js/jQuery-slimScroll-1.3.0\jquery.slimscroll.js"></script>
<script src="<?php echo base_url()?>themes/admin/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#datepick').datepicker({
      format: 'yyyy-mm-dd',
      autoclose:true
    });

    $('#datepick2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose:true

    });

});



$(function(){  
  $('input[type="time"][value="now"]').each(function(){    
    var d = new Date(),        
        h = d.getHours(),
        m = d.getMinutes();
      if(h < 10) h = '0' + h; 
      if(m < 10) m = '0' + m;
      $(this).val(h + ':' + m); 
  });

});

</script>




<!--common script init for all pages-->

<script src="<?php echo base_url()?>themes/admin/js/scripts.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>themes/admin/vendor/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url()?>themes/admin/vendor/responsive-tables/responsivetables.css">
<script src="<?php echo base_url()?>themes/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>themes/admin/vendor/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>themes/admin/vendor/responsive-tables/responsivetables.js"></script>
        

<script type="text/javascript">
            $(function () {
              $("#tabledata").DataTable();
              $(".dataTables_filter input").addClass("dataTable_search");
            });
            
            $(document).ready(function() {
                $('#rockies_table').DataTable( {
                    "order": [[ 0, "asc" ]]
                } );
                
                 $('#alluser_table').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );
                
                 $('#common_table').DataTable( {
                    "order": [[ 0, "asc" ]]
                } );
                
                 $('.mn_common_table').DataTable( {
                    "order": [[ 0, "asc" ]]
                } );
                
                 $('#rank_table').DataTable( {
                    "order": [[ 4, "DESC" ]]
                } );
                
                } );
        </script>



<link rel="stylesheet" href="<?php echo base_url()?>themes/admin/datatable/css/dataTables.bootstrap.min.css">
<script src="<?php echo base_url()?>themes/admin/datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>themes/admin/datatable/DT_bootstrap.js"></script>




<script type="text/javascript">
$(document).ready(function() {

    var table = $('#example').DataTable( {
        responsive: true
    } );
 

} );
</script>



<script src="<?php echo base_url()?>themes/admin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

tinymce.init({

          selector: ".editor_big",
		  height: 175,
		  force_br_newlines : true,
          force_p_newlines : false,
          forced_root_block : '',
		  automatic_uploads: true,
		  paste_data_images: true,	
		  link_assume_external_targets: true,
		  relative_urls : false,
		  remove_script_host : false,
          convert_urls : true,
		  toolbar: 'codesample | bold italic sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code',

         fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
	  
		  plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor  colorpicker textpattern codesample" ],



     style_formats: [
    { title: 'Headers', items: [
      { title: 'h1', block: 'h1' },
      { title: 'h2', block: 'h2' },
      { title: 'h3', block: 'h3' },
      { title: 'h4', block: 'h4' },
      { title: 'h5', block: 'h5' },
      { title: 'h6', block: 'h6' }

    ] },



    { title: 'Blocks', items: [
      { title: 'p', block: 'p' },
      { title: 'div', block: 'div' },
      { title: 'pre', block: 'pre' }
    ] },



    { title: 'Containers', items: [
      { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
      { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
      { title: 'blockquote', block: 'blockquote', wrapper: true },
      { title: 'hgroup', block: 'hgroup', wrapper: true },
      { title: 'aside', block: 'aside', wrapper: true },
      { title: 'figure', block: 'figure', wrapper: true }

    ] }

  ],

  visualblocks_default_state: false,
  end_container_on_empty_block: false,


  add_unload_trigger: false,
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample code",

         

  image_advtab: true,
  image_caption: true,
  spellchecker_callback: function(method, data, success) {
			if (method == "spellcheck") {
				var words = data.match(this.getWordCharPattern());
				var suggestions = {};
				for (var i = 0; i < words.length; i++) {
					suggestions[words[i]] = ["First", "second"];
				}
				success({words: suggestions, dictionary: true});
			}
			if (method == "addToDictionary") {
				success();
			}

		}

 });



/*	if (!window.console) {

		window.console = {

			log: function() {

				tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);

			}

		};

	}

	*/



tinymce.init({
          selector: ".editor_big_days",
		  height: 175,
		  force_br_newlines : true,
          force_p_newlines : false,
          forced_root_block : '',
		  automatic_uploads: true,
		  paste_data_images: true,	
		  link_assume_external_targets: true,
		  relative_urls : false,
		  remove_script_host : false,
          convert_urls : true,
		  toolbar: 'codesample | bold italic sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code',

         fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
	  	  plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor  colorpicker textpattern codesample" ],



     style_formats: [

    { title: 'Headers', items: [
      { title: 'h1', block: 'h1' },

      { title: 'h2', block: 'h2' },

      { title: 'h3', block: 'h3' },

      { title: 'h4', block: 'h4' },

      { title: 'h5', block: 'h5' },

      { title: 'h6', block: 'h6' }

    ] },



    { title: 'Blocks', items: [

      { title: 'p', block: 'p' },

      { title: 'div', block: 'div' },

      { title: 'pre', block: 'pre' }

    ] },



    { title: 'Containers', items: [

      { title: 'section', block: 'section', wrapper: true, merge_siblings: false },

      { title: 'article', block: 'article', wrapper: true, merge_siblings: false },

      { title: 'blockquote', block: 'blockquote', wrapper: true },

      { title: 'hgroup', block: 'hgroup', wrapper: true },

      { title: 'aside', block: 'aside', wrapper: true },

      { title: 'figure', block: 'figure', wrapper: true }

    ] }

  ],

  visualblocks_default_state: false,

  end_container_on_empty_block: false,

  

  add_unload_trigger: false,



  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample code",

         

  image_advtab: true,

  image_caption: true,

  spellchecker_callback: function(method, data, success) {

			if (method == "spellcheck") {

				var words = data.match(this.getWordCharPattern());

				var suggestions = {};



				for (var i = 0; i < words.length; i++) {

					suggestions[words[i]] = ["First", "second"];

				}



				success({words: suggestions, dictionary: true});

			}



			if (method == "addToDictionary") {

				success();

			}

		}


 });

	

</script>


<script type="text/javascript">

$(document).ready(function () {

      var next = 0;

    $("#add-more").click(function(e){

        e.preventDefault();

        var addto = "#field" + next;

        var addRemove = "#field" + (next);

        next = next + 1;

		

	   var editorID = 'editor_big'+next;

		

        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="form-group"><label for="inputslidercaption">Question Title</label><input name="question_title[]" type="text" class="form-control"  placeholder="Enter Question Title"></div> <div class="form-group"><label for="inputslidercaption">Description</label><textarea name="question_descrip[]"  class="form-control editor_big" id="editor_big'+next+'" placeholder="Enter Question Description"></textarea></div></div>';

        var newInput = $(newIn);

        var removeBtn = '<button type="button" id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button><br><br></div></div><div id="field">';

        var removeButton = $(removeBtn);

        $(addto).after(newInput);

        $(addRemove).after(removeButton);

        $("#field" + next).attr('data-source',$(addto).attr('data-source'));

        $("#count").val(next);  

        

		tinymce.EditorManager.execCommand('mceAddEditor', false, editorID);

		tinymce.EditorManager.execCommand('mceAddControl', false, editorID);

		

            $('.remove-me').click(function(e){

				

                e.preventDefault();

				//tinymce.execCommand('mceRemoveControl', true, editorID);

                var fieldNum = this.id.charAt(this.id.length-1);

                var fieldID = "#field" + fieldNum;

                $(this).remove();

                $(fieldID).remove();

            });

			

			

    });



});





$(document).ready(function () {

      var next_days = 0;

    $("#add_days").click(function(e){

		

				

        e.preventDefault();

        var addto_days = "#field_days" + next_days;

        var addRemove_days = "#field_days" + (next_days);

        next_days = next_days + 1;

		

	   var editorID1 = 'editor_big_days'+next_days;

		

        var newIn_days = '<div id="field_days'+ next_days +'" name="field_days'+ next_days +'"><div class="form-group"><label for="inputslidercaption">Day Number</label><input name="days_num[]" type="text" class="form-control"  placeholder="Enter Day Nuumber"></div> <div class="form-group"><label for="inputslidercaption">Description</label><textarea name="days_descrip[]"  class="form-control editor_big_days" id="editor_big_days'+next_days+'" placeholder="Enter Days Description"></textarea></div></div>';

        var newInput_days = $(newIn_days);

        var removeBtn_days = '<button type="button" id="remove_days' + (next_days - 1) + '" class="btn btn-danger removeme" >Remove</button><br><br></div></div><div id="field_days">';

        var removeButton_days = $(removeBtn_days);

        $(addto_days).after(newInput_days);

        $(addRemove_days).after(removeButton_days);

        $("#field_days" + next_days).attr('data-source',$(addto_days).attr('data-source'));

        $("#count_days").val(next_days);  

        

		tinymce.EditorManager.execCommand('mceAddEditor', false, editorID1);

		tinymce.EditorManager.execCommand('mceAddControl', false, editorID1);

		

            $('.removeme').click(function(e){

				

                e.preventDefault();

				//tinymce.execCommand('mceRemoveControl', true, editorID);

                var fieldNum = this.id.charAt(this.id.length-1);

                var fieldID = "#field_days" + fieldNum;

                $(this).remove();

                $(fieldID).remove();

            });

			

			

    });



});





</script>

</body>
</html>

