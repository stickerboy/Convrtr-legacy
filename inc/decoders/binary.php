<?php
/* 
* Binary
*/

$binary = $_SESSION['binary'] = $_REQUEST['binary'];	

if(!empty($binary)) {
	$str 		= $stckr->binToStr($binary);
	$bin 		= $binary;	
	
	$hex		= $stckr->strToHex($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$rev		= strrev($str);
	$mor		= $stckr->strToMorse(strtoupper($str));
	$url 		= urlencode($str);
	$msy 		= $stckr->strToMorsenary($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;