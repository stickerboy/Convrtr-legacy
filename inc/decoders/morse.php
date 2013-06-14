<?php
/* 
 * orse
 */

$morse = $_SESSION['morse'] = $_REQUEST['morse'];	

if(!empty($morse)) {
	$str 		= $stckr->morseToStr($morse);
	$mor 		= $morse;	
	
	$bin 		= $stckr->strToBin($str);	
	$hex		= $stckr->strToHex($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$rev		= strrev($str);
	$url 		= urlencode($str);
	$msy 		= $stckr->strToMorsenary($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;