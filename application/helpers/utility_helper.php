<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
* @package     CLIRENT 1.0
* @subpackage  utility helper for frontend
*
* @copyright   Copyright (C) 2016 CLIRENT, Inc. All rights reserved.
*/
#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//start
#################################################################
if (! function_exists('is_logged_in_profile')) {
    function is_logged_in_profile()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in');
        //print_r($CI->session);
        //echo $is_logged_in;
        //exit;
        if ($is_logged_in == true) {
            redirect('home');
        } else {
        }
    }
}
if (! function_exists('get_settings_data')) {
	function get_settings_data()
	{
		 $CI =& get_instance();
		/* $name = 'Sanjib Dandapat';
		 return $name;*/
		$CI->db->select('');
        $qry="SELECT * FROM settings_mng WHERE id=1";
        $query = $CI->db->query($qry);
        return $data_row_settings= $query->row_array();
        //print_r($data_row_settings); exit();
	
	}
}





#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//end
#################################################################
#################################################################
//constractor checking for all page where user session is requried
//start
#################################################################
if (! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in == false) {
            //redirect('home');
            redirect(base_url());
        }
    }
}
#################################################################
#################################################################
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}




function force_ssl() {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        redirect($url);
        exit;
    }
}


