<?php
/*
* Hexadecimal
*/

$hexa = $_SESSION['hex'] = $_REQUEST['hex'];

if(!empty($hexa)) {
	$str		= $Convrtr->hexToStr($hexa);
	$hex		= $hexa;

	$bin		= $Convrtr->strToBin($str);
	$b64		= $Convrtr->strToB64($str);
	$dec		= $Convrtr->strToDec($str);
	$rev		= $Convrtr->reverseStr($str);
	$mor		= $Convrtr->strToMorse($str);
	$tor		= $Convrtr->rotText($str);
	$msy		= $Convrtr->strToMorsenary($str);
	$hash		= $Convrtr->returnHash($str);
}

$text		= $_SESSION['text']		= $str;
$binary		= $_SESSION['binary']	= $bin;
$base64		= $_SESSION['base64']	= $b64;
$decimal	= $_SESSION['decimal']	= $dec;
$reverse	= $_SESSION['reverse']	= $rev;
$morse		= $_SESSION['morse']	= $mor;
$rot13		= $_SESSION['rot13']	= $tor;
$morsenary	= $_SESSION['morsenary']= $msy;
$hashes		= $_SESSION['hash']		= $hash;