<?php
/* 
 * Reverse
 */

$reverse = $_SESSION['reverse'] = $_REQUEST['reverse'];	

if(!empty($reverse)) {
	$str 		= $Convrtr->reverseStr($reverse);
	$rev 		= $reverse;	
	
	$bin 		= $Convrtr->strToBin($str);	
	$hex		= $Convrtr->strToHex($str);
	$b64 		= $Convrtr->strToB64($str);
	$dec		= $Convrtr->strToDec($str);
	$mor		= $Convrtr->strToMorse($str);
	$url 		= urlencode($str);
	$msy 		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
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