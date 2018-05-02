<?php
/*
 * ROT Text
 */

$rot = $_SESSION['rot13'] = $_REQUEST['rot13'];

if(!empty($rot)) {
	$str		= $Convrtr->rotText($rot);
	$tor		= $rot;

	$b64		= $Convrtr->strToB64($str);
	$bin		= $Convrtr->strToBin($str);
	$hex		= $Convrtr->strToHex($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$msy		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		= $str;
$binary		= $_SESSION['binary']	= $bin;
$hexa		= $_SESSION['hex']		= $hex;
$base64		= $_SESSION['base64']	= $b64;
$decimal	= $_SESSION['decimal']	= $dec;
$reverse	= $_SESSION['reverse']	= $rev;
$morse		= $_SESSION['morse']	= $mor;
$morsenary	= $_SESSION['morsenary']= $msy;
$hashes		= $_SESSION['hash']		= $hash;