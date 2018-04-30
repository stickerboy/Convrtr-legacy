<?php
/*
* Text
*/

$text = $_SESSION['text'] = $_REQUEST['text'];

if(!empty($text)) {
	$bin		= $Convrtr->strToBin($text);
	$hex		= $Convrtr->strToHex($text);
	$b64		= $Convrtr->strToB64($text);
	$dec		= $Convrtr->strToDec($text);
	$rev		= $Convrtr->reverseStr($text);
	$mor		= $Convrtr->strToMorse($text);
	$tor		= $Convrtr->rotText($text);
	$msy		= $Convrtr->strToMorsenary($text);
	$hash		= $Convrtr->returnHash($text);
}

$binary		= $_SESSION['binary']	= $bin;
$hexa		= $_SESSION['hex']		= $hex;
$base64		= $_SESSION['base64']	= $b64;
$decimal	= $_SESSION['decimal']	= $dec;
$reverse	= $_SESSION['reverse']	= $rev;
$morse		= $_SESSION['morse']	= $mor;
$rot13		= $_SESSION['rot13']	= $tor;
$morsenary	= $_SESSION['morsenary']= $msy;
$hashes		= $_SESSION['hash']		= $hash;