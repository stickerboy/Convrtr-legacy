<?php
/*
* Binary
*/

$binary = $_SESSION['binary'] = $_REQUEST['binary'];

if(!empty($binary)){
	$str		= $Convrtr->binToStr($binary);
	$bin		= $binary;

	$hex		= $Convrtr->strToHex($str);
	$b64		= $Convrtr->strToB64($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$tor		= $Convrtr->rotText($str);
	$msy		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		=$str;
$hexa		= $_SESSION['hex']		=$hex;
$base64		= $_SESSION['base64']	=$b64;
$decimal	= $_SESSION['decimal']	=$dec;
$reverse	= $_SESSION['reverse']	=$rev;
$morse		= $_SESSION['morse']	=$mor;
$rot13		= $_SESSION['rot13']	=$tor;
$morsenary	= $_SESSION['morsenary']=$msy;
$hashes		= $_SESSION['hash']		=$hash;