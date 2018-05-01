<?php
/*
* Base 64
*/

$base64 = $_SESSION['base64'] = $_REQUEST['base64'];

if(!empty($base64)) {
	$str		= $Convrtr->b64ToStr($base64);
	$b64		= $base64;

	$bin		= $Convrtr->strToBin($str);
	$hex		= $Convrtr->strToHex($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$tor		= $Convrtr->rotText($text);
	$msy		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		= $str;
$binary		= $_SESSION['binary']	= $bin;
$hexa		= $_SESSION['hex']		= $hex;
$decimal	= $_SESSION['decimal']	= $dec;
$reverse	= $_SESSION['reverse']	= $rev;
$morse		= $_SESSION['morse']	= $mor;
$rot13		= $_SESSION['rot13']	= $tor;
$morsenary	= $_SESSION['morsenary']= $msy;
$hashes		= $_SESSION['hash']		= $hash;
