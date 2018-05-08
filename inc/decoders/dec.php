<?php
/*
* Decimal / Char
*/

$decimal = $_SESSION['decimal'] = $_REQUEST['decimal'];

if(!empty($decimal)) {
	$str		= $Convrtr->decToStr($decimal);
	$dec		= $decimal;

	$bin		= $Convrtr->strToBin($str);
	$hex		= $Convrtr->strToHex($str);
	$b64		= $Convrtr->strToB64($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$tor		= $Convrtr->rotText($str);
	$msy		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		= $str;
$binary		= $_SESSION['binary']	= $bin;
$hexa		= $_SESSION['hex']		= $hex;
$base64		= $_SESSION['base64']	= $b64;
$reverse	= $_SESSION['reverse']	= $rev;
$morse		= $_SESSION['morse']	= $mor;
$rot13		= $_SESSION['rot13']	= $tor;
$morsenary	= $_SESSION['morsenary']= $msy;
$hashes		= $_SESSION['hash']		= $hash;