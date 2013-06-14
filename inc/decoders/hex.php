<?php
/* 
* Hexadecimal
*/

$hexa = $_SESSION['hex'] = $_REQUEST['hex'];	

if(!empty($hexa)) {
	$str 		= $stckr->hexToStr($hexa);
	$hex		= $hexa;
	
	$bin 		= $stckr->strToBin($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$rev		= strrev($str);
	$mor		= $stckr->strToMorse(strtoupper($str));
	$url 		= urlencode($str);
	$msy 		= $stckr->strToMorsenary($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;