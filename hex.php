<?php
/**
*
* @package stckr framework (based on phpBB)
* @version $Id: hex.php 
* @copyright (c) 2013 Kenny Cameron
* Developed using the phpBB template engine
*
*/

// Include all the relevant files we need
$root_path = (defined('ROOT_PATH')) ? ROOT_PATH : './';
require_once($root_path . 'inc/start.php');

$Convrtr    = new Convrtr();
$template 	= new Template(); // Needs to be done on every page we are setting up
$template->set_custom_template($root_path . 'theme/html', 'default');  // This is important as it states where the template files are located
include_once($root_path . 'inc/language.php');

$page 		= "{$root_path}hex.php";
$mode 		= (isset($_GET['m'])) ? (string) $_GET['m'] : '';
$encode		= (isset($_POST['encode'])) ? true : false;
$hexpattern = $hex_pattern = '';
$section	= 'Hex';

if($encode) 		{ include($root_path . 'inc/decoders/hexpattern.php'); }

foreach ($_SESSION as $key => $value) {
	$_SESSION[$key] = stripslashes($value);
}

// Serve up downloads
if (isset($_GET['hex_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=HexPattern");
   header("Content-Description: Convrts Data");
   echo $_SESSION['hexpattern'];
   exit;
}

page_header($section);

$template->assign_vars(array( 
	'ROOT_PATH'    => $root_path,

	'ORIG_HEX'     => (isset($_REQUEST['hexpattern'])) ? stripslashes($_REQUEST['hexpattern']) : '',
	'POST_HEX'     => stripslashes($hex_pattern),
));

// Set up the html file for the page
$template->set_filenames(array(
	'body' => 'hex_body.html',
));

// Assign the html file to the display
$template->display('body');