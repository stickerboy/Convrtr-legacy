<?php
date_default_timezone_set('Europe/London');

/**
* Page header includes the most common variables that can be accessed at any point
* In essence, you can call these *global* template variables
* Also allow passing of a custom page title & set correct headers for Internet Explorer
* 
* Page header function based on similar function used on phpBB
* Adopted due to use of stand alone phpBB templating 
* http://www.phpbb.com/community/viewtopic.php?f=71&t=1557455
*/
function page_header($page_title = '')
{
	global $template, $root_path;
	
	// Parse out the URL so we can get the query string
	// Then strip mode= so we can get the exact page name
	// This will be used for checking what page we are on
	$request_array 	= parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
	$query_string	= str_replace('m=', '', $request_array);
	
    $filename 		= 'offline';
    $offline 		= (file_exists($filename))  ?  true: false;
    	
	// The following assigns all _common_ variables that may be used at any point in a template.
	$template->assign_vars(array(
		'SITENAME'				=> 'Convrtr',
		'SITE_TAG'				=> 'For everlost and Grollo\'s!',
		'PAGE_TITLE'			=> $page_title,
		'CURRENT_TIME'			=> sprintf("Current Time: %s", date('jS M Y', time())),
		'PAGE_NAME'				=> $query_string,
		
		'META_DESC'				=> 'Convrtr',
		'META_AUTHOR'			=> 'Kenny Cameron',
		'COPYRIGHT'				=> "@stckr 2013",

		'ROOT_PATH'				=> $root_path,
		'TEMPLATE_PATH'			=> $root_path . 'theme/html/',
		'CSS_PATH'				=> $root_path . 'theme/css/',
		'JS_PATH'				=> $root_path . 'theme/js/',
		'IMG_PATH'				=> $root_path . 'theme/img/',
		'MEDIA_PATH'			=> $root_path . 'img/',

		'L_HOME'				=> 'Home',
		
		'L_DOWNLOAD'			=> 'Download',
		'L_ENCODE'				=> 'Encode',
		'L_DECODE'				=> 'Decode',
		'L_SELECT_TEXT'			=> 'Select text',
		'L_FILE_NAME'			=> 'File Name',
		'L_MD5'					=> 'MD5',
		'L_SIZE'				=> 'Size',
		'L_BACKTOTOP'			=> 'Back to top',

		'U_HOME'				=> "{$root_path}",
		'U_ABOUT'				=> "#about",
		
		'S_HIDDEN'				=> false,
        'S_OFFLINE'             => $offline,		
	));

	return;
}