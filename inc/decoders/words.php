<?php
/* 
 * URL Encode
 */

$words = $_SESSION['words'] = $_REQUEST['words'];
$case_sensitive = (isset($_REQUEST['case_sensitive'])) ? true : false;
$delimiter = (isset($_REQUEST['delimiter'])) ? $_REQUEST['delimiter'] : '';

if(!empty($words)) {
	$str           = $stckr->wordFreqs($words, $case_sensitive, $delimiter);
	$word_freqs    = $words;
}

$word_freqs 	   = $_SESSION['words'] 	= $str;