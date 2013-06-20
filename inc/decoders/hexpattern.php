<?php
/* 
 * Hex Patterns
 */

$hexpattern = $_SESSION['hexpattern'] = $_REQUEST['hexpattern'];
$case_sensitive = (isset($_REQUEST['case_sensitive'])) ? true : false;
$delimiter = (isset($_REQUEST['delimiter'])) ? $_REQUEST['delimiter'] : '';

if(!empty($hexpattern)) {
	$str           = $stckr->hexAnalyse($hexpattern, $case_sensitive, $delimiter);
	$hex_pattern   = $hexpattern;
}

$hex_pattern 	   = $_SESSION['hexpattern'] 	= $str;