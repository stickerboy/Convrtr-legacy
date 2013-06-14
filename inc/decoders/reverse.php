<?php
/* 
 * Reverse
 */

$reverse = $_SESSION['reverse'] = $_REQUEST['reverse'];	

if(!empty($reverse)) {
	$str 		= strrev($reverse);
	$rev 		= $reverse;	
	
	$bin 		= $stckr->strToBin($str);	
	$hex		= $stckr->strToHex($str);
	$b64 		= $stckr->strToB64($str);
	$dec		= $stckr->strToDec($str);
	$mor		= $stckr->strToMorse(strtoupper($str));
	$url 		= urlencode($str);
	$msy 		= $stckr->strToMorsenary($str);
	$hash		= $stckr->returnHash($str);
}

$text 		= $_SESSION['text']		= $str;
$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;