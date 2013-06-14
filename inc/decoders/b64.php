<?php
/* 
* Base 64
*/

$base64 = $_SESSION['base64'] = $_REQUEST['base64'];	

if(!empty($base64)) {
	$str 		= $stckr->b64ToStr($base64);
	$b64		= $base64;
	
	$bin 		= $stckr->strToBin($str);
	$hex		= $stckr->strToHex($str);
	$dec		= $stckr->strToDec($str);
	$rev		= strrev($str);
	$mor		= $stckr->strToMorse(strtoupper($str));
	$url 		= urlencode($str);
	$msy 		= $stckr->strToMorsenary($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;
