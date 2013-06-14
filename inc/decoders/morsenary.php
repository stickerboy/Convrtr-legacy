<?php
/* 
 * orse
 */

$morsenary = $_SESSION['morsenary'] = $_REQUEST['morsenary'];	

if(!empty($morsenary)) {
	$str 		= $stckr->mosenaryToStr($morsenary);
	$msy 		= $morsenary;	
	
	$bin 		= $stckr->strToBin($str);	
	$hex		= $stckr->strToHex($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$rev		= strrev($str);
	$mor		= $stckr->strToMorse(strtoupper($str));	
	$url 		= urlencode($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$hashes 	= $_SESSION['hash'] 	= $hash;