<?php
/* 
 * orse
 */

$morsenary = $_SESSION['morsenary'] = $_REQUEST['morsenary'];	

if(!empty($morsenary)) {
	$str 		= $stckr->morsenaryToStr($morsenary);
	$msy 		= $morsenary;	
	
	$bin 		= $stckr->strToBin($str);	
	$hex		= $stckr->strToHex($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$rev		= $stckr->reverseStr($str);
	$mor		= $stckr->strToMorse($str);
	$url 		= urlencode($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morse 	    = $_SESSION['morse'] 	= $mor;
$hashes 	= $_SESSION['hash'] 	= $hash;