<?php
/**
*
* @package stickr framework (based on phpBB)
* @version $Id: index.php 
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

$page 		= "{$root_path}index.php";
$mode 		= (isset($_GET['m'])) ? (string) $_GET['m'] : '';
$encode		= (isset($_POST['encode'])) ? true : false;
$bin_decode	= (isset($_POST['bin_decode'])) ? true : false;
$hex_decode	= (isset($_POST['hex_decode'])) ? true : false;
$b64_decode	= (isset($_POST['b64_decode'])) ? true : false;
$dec_decode	= (isset($_POST['dec_decode'])) ? true : false;
$rev_decode	= (isset($_POST['rev_decode'])) ? true : false;
$mor_decode	= (isset($_POST['mor_decode'])) ? true : false;
$url_decode	= (isset($_POST['url_decode'])) ? true : false;
$msy_decode	= (isset($_POST['msy_decode'])) ? true : false;

$section	= 'Home';

if($encode) 		{ include($root_path . 'inc/decoders/text.php'); }
if($bin_decode) 	{ include($root_path . 'inc/decoders/binary.php'); }
if($hex_decode) 	{ include($root_path . 'inc/decoders/hex.php'); }
if($b64_decode) 	{ include($root_path . 'inc/decoders/b64.php'); }
if($dec_decode) 	{ include($root_path . 'inc/decoders/dec.php'); }
if($rev_decode) 	{ include($root_path . 'inc/decoders/reverse.php'); }
if($mor_decode) 	{ include($root_path . 'inc/decoders/morse.php'); }
if($url_decode) 	{ include($root_path . 'inc/decoders/url.php'); }
if($msy_decode) 	{ include($root_path . 'inc/decoders/morsenary.php'); }

foreach ($_SESSION as $key => $value) {
	$_SESSION[$key] = stripslashes($value);
}

// Serve up downloads
if (isset($_GET['text_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Text");
   header("Content-Description: Convrts Data");
   echo $_SESSION['text'];
   exit;
}
if (isset($_GET['binary_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Binary");
   header("Content-Description: Convrts Data");
   echo $_SESSION['binary'];
   exit;
}
if (isset($_GET['hex_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Hex");
   header("Content-Description: Convrts Data");
   echo $_SESSION['hex'];
   exit;
}
if (isset($_GET['b64_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Base64");
   header("Content-Description: Convrts Data");
   echo $_SESSION['base64'];
   exit;
}
if (isset($_GET['dec_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Decimal");
   header("Content-Description: Convrts Data");
   echo $_SESSION['decimal'];
   exit;
}
if (isset($_GET['rev_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Reverse");
   header("Content-Description: Convrts Data");
   echo $_SESSION['reverse'];
   exit;
}
if (isset($_GET['morse_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Morse");
   header("Content-Description: Convrts Data");
   echo $_SESSION['morse'];
   exit;
}
if (isset($_GET['url_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=URL_Encoded");
   header("Content-Description: Convrts Data");
   echo $_SESSION['url_enc'];
   exit;
}
if (isset($_GET['morsenary_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Morsenary");
   header("Content-Description: Convrts Data");
   echo $_SESSION['morsenary'];
   exit;
}
if (isset($_GET['hash_download'])) {    
   header("Content-type: text/plain");
   header("Content-Disposition: attachment; filename=Hashes");
   header("Content-Description: Convrts Data");
   echo $_SESSION['hash'];
   exit;
}

// Wipe sessions
if (isset($_POST['clss'])) {
	unset($_SESSION);
	session_destroy(); 
}

//$stckr->Debug($_SESSION); // debug

page_header($section);

$template->assign_vars(array( 
	'ROOT_PATH'		=> $root_path,
	
	'POST_TEXT'		=> stripslashes($text),
	'POST_BINARY'	=> $bin,
	'POST_HEX'		=> $hex,
	'POST_B64'		=> $b64,
	'POST_DEC'		=> $dec,
	'POST_REV'		=> stripslashes($rev),
	'POST_MORSE'	=> $mor,
	'POST_URL'		=> $url,
	'POST_MORSENARY'=> $msy,
	'POST_HASH'		=> nl2br($hash),
));

// Set up the html file for the page
$template->set_filenames(array(
	'body' => 'index_body.html',
));

// Assign the html file to the display
$template->display('body');