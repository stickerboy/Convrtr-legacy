<?php
/* 
* Text
*/

$text = $_SESSION['text'] = $_REQUEST['text'];

if(!empty($text)) {
	$bin 		= $stckr->strToBin($text);
	$hex		= $stckr->strToHex($text);
	$b64 		= $stckr->strToB64($text);
	$dec		= $stckr->strToDec($text);
	$rev		= $stckr->reverseStr($text);
	$mor		= $stckr->strToMorse($text);
	$url 		= urlencode($text);
	$msy		= $stckr->strToMorsenary($text);	
	$hash		= $stckr->returnHash($text);
}

$binary 	= $_SESSION['binary'] 	= $bin;
$hexa 		= $_SESSION['hex'] 		= $hex;
$base64 	= $_SESSION['base64'] 	= $b64;
$decimal 	= $_SESSION['decimal'] 	= $dec;
$reverse 	= $_SESSION['reverse'] 	= $rev;
$morse 		= $_SESSION['morse'] 	= $mor;
$urlenc 	= $_SESSION['url_enc'] 	= $dec;
$morsenary 	= $_SESSION['morsenary']= $msy;
$hashes 	= $_SESSION['hash'] 	= $hash;