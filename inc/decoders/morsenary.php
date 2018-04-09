<?php
/*
 * orse
 */

$morsenary = $_SESSION['morsenary'] = $_REQUEST['morsenary'];

if(!empty($morsenary)) {
	$str		= $Convrtr->morsenaryToStr($morsenary);
	$msy		= $morsenary;

	$bin		= $Convrtr->strToBin($str);
	$hex		= $Convrtr->strToHex($str);
	$b64		= $Convrtr->strToB64($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$tor		= $Convrtr->rotText($text);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		= $str;
$binary		= $_SESSION['binary']	= $bin;
$hexa		= $_SESSION['hex']		= $hex;
$base64		= $_SESSION['base64']	= $b64;
$decimal	= $_SESSION['decimal']	= $dec;
$reverse	= $_SESSION['reverse']	= $rev;
$rot13		= $_SESSION['rot13']	= $tor;
$morse		= $_SESSION['morse']	= $mor;
$hashes		= $_SESSION['hash']		= $hash;