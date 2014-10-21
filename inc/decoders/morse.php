<?php
/* 
 * Morse
 */

$morse = $_SESSION['morse'] = $_REQUEST['morse'];	

if(!empty($morse)) {
	$str 		= $Convrtr->morseToStr($morse);
	$mor 		= $morse;	
	
	$bin 		= $Convrtr->strToBin($str);	
	$hex		= $Convrtr->strToHex($str);
	$b64 		= $Convrtr->strToB64($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$url 		= urlencode($str);
	$msy 		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
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