<?php
/* 
 * URL Encode
 */

$words = $_SESSION['words'] = $_REQUEST['words'];	

if(!empty($words)) {
	$str           = $stckr->wordFreqs($words);
	$word_freqs    = $words;
}

$word_freqs 	   = $_SESSION['words'] 	= $str;