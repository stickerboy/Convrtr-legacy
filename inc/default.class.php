<?php

// Classes
class stckr { // yay for completely irrlevant class name!

public function __construct() {
	session_start();
}

/* Format size of file 
 * @author Mike Zriel
 * @date 7 March 2011
 * @website www.zriel.com
 */
function formatSize($size) {
	$sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	if ($size == 0) { 
		return('n/a'); 
	} 
	else {
		return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
	}
}

// Debug whatever
function Debug($function) {
	echo '<pre><br /><br />';
	print_r($function);
	echo '</pre>';
}


// String to Binary
function strToBin($string) {
	for($i=0;$i<strlen($string);$i++){
		$bin .= sprintf("%08s ",decbin(ord($string[$i])));
	}
	return $bin;
}

// Binary to String
function binToStr($string) {
    $str = preg_replace("/[^01]/","", $string);
    $len = strlen($str);
    for ($i = 0; $i < $len; $i += 8)
    {
        $bin .= chr(bindec(substr($str,$i,8)));
    }
    return $bin;     
}
    
// String to Hex
function strToHex($string) {
    for ($i=0; $i < strlen($string); $i++) {
        $hex .= dechex(ord($string[$i])) . " ";
    }
    return $hex;
}

// Hex to String
function hexToStr($string) {
    $string = str_replace(' ','',$string);
    for ($i=0; $i < strlen($string)-1; $i+=2) {
        $str .= chr(hexdec($string[$i].$string[$i+1]));
    }
    return $str;
}

// String to Base 64
function strToB64($string) {
	$string = stripslashes($string);
	return base64_encode($string);
}

// String to Base 64
function b64ToStr($string) {
	return base64_decode($string);
}

// String to Decimal
function strToDec($string) {
    for ($i=0; $i < strlen($string); $i++) {
        $dec .= ord($string[$i]) . " ";
    }
    return $dec;
}

// String to Decimal
function decToStr($string) {
	$split = explode(" ", $string);
	for($i=0; $i < sizeof($split); $i++)
	{
		$dec .= chr($split[$i]);
	}
	return trim($dec); // was returning extra null char at end
}

// String to Morse
// https://github.com/balsama/sandbox/blob/master/morse.php
function strToMorse($string) {
$maps = array (
  'A' => '.-',
  'B' => '-...',
  'C' => '-.-.',
  'D' => '-..',
  'E' => '.',
  'F' => '..-.',
  'G' => '--.',
  'H' => '....',
  'I' => '..',
  'J' => '.---',
  'K' => '-.-',
  'L' => '.-..',
  'M' => '--',
  'N' => '-.',
  'O' => '---',
  'P' => '.--.',
  'Q' => '--.-',
  'R' => '.-.',
  'S' => '...',
  'T' => '-',
  'U' => '..-',
  'V' => '...-',
  'W' => '.--',
  'X' => '-..-',
  'Y' => '-.--',
  'Z' => '--..',
  '0' => '-----',
  '1' => '.----',
  '2' => '..---',
  '3' => '...--',
  '4' => '....-',
  '5' => '.....',
  '6' => '-....',
  '7' => '--...',
  '8' => '---..',
  '9' => '----.',
  '.' => '.-.-.-',
  ',' => '--..--',
  '?' => '..--..',
  '\'' => '.----.',
  ' ' => ' ',
);

  $string = str_split(htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));
  $converted = array();
  foreach ($string as $letter) {
    foreach ($maps as $input => $output) {
      if ($letter === $input) {
        $converted[] = $output;
      }
    }
  }
  
  $processed = implode(' ', $converted);

  return $processed;
}

// Morse to String
/**
 * Powerby: Mgccl's
 * Doc: http://en.wikipedia.org/wiki/Morse_code
 * Source code: http://mgccl.com/2007/01/24/morse-code-in-php/
 */
function morseToStr($string) {
    $string .= ' ';
    $array['0'] = '----- ';
    $array['1'] = '.---- ';
    $array['2'] = '..--- ';
    $array['3'] = '...-- ';
    $array['-'] = '-....- ';
    $array['4'] = '....- ';
    $array['5'] = '..... ';
    $array['6'] = '-.... ';
    $array['7'] = '--... ';
    $array['8'] = '---.. ';
    $array['\''] = '.----. ';
    $array['9'] = '----. ';
    $array['B'] = '-... ';
    $array[';'] = '-.-.-. ';
    $array['@'] = '.--.-. ';
    $array['C'] = '-.-. ';
    $array['"'] = '.-..-. ';
    $array['/'] = '-..-. ';
    $array['F'] = '..-. ';
    $array['('] = '-.--. ';
    $array['P'] = '.--. ';
    $array['G'] = '--. ';
    $array['H'] = '.... ';
    $array['J'] = '.--- ';
    $array[')'] = '-.--.- ';
    $array['Q'] = '--.- ';
    $array['.'] = '.-.-.- ';
    $array['K'] = '-.- ';
    $array['L'] = '.-.. ';
    $array['?'] = '..--.. ';
    $array['Z'] = '--.. ';
    $array['D'] = '-.. ';
    $array[':'] = '---... ';
    $array['S'] = '... ';
    $array['I'] = '.. ';
    $array['O'] = '--- ';
    $array['!'] = '-.-.-- ';
    $array['Y'] = '-.-- ';
    $array[','] = '--..-- ';
    $array['&'] = '. ... ';
    $array['_'] = '..-- .- ';
    $array['M'] = '-- ';
    $array['&'] = '.-...- ';
    $array['R'] = '.-. ';
    $array['N'] = '-. ';
    $array['='] = '-...- ';
    $array['V'] = '...- ';
    $array['$'] = '...-..- ';
    $array['X'] = '-..- ';
    $array['U'] = '..- ';
    $array['A'] = '.- ';
    $array['T'] = '- ';
    $array['W'] = '.-- ';
    $array[')'] = '-.--.- ';
    $array['E'] = '. ';
    $array['    '] = ' ';

    foreach ($array as $key => $var) {
        $string = str_replace($var, $key, $string);
    }
    return $string;
}

// String to Morsenary
function strToMorsenary($string) {
	$string = $this->strToBin($string);
	$pattern = array('0', '1'); $replacement = array('.', '-');
	$string = str_replace($pattern, $replacement, $string);
	return $string;
}

// Morsenary to String
function mosenaryToStr($string) {
	$pattern = array('.', '-'); $replacement = array('0', '1');
	$string = str_replace($pattern, $replacement, $string);
    $string = $this->binToStr($string);
	return $string;
}

// Return hash values
function returnHash($string) {
	$hash = "      md2: " . hash('md2', $string) . "\n";
	$hash .= "      md4: " . hash('md4', $string) . "\n";
	$hash .= "      md5: " . hash('md5', $string) . "\n";
	$hash .= "     sha1: " . hash('sha1', $string) . "\n";
	$hash .= " sha224: " . hash('sha224', $string) . "\n";
	$hash .= " sha256: " . hash('sha256', $string) . "\n";
	$hash .= " sha384: " . hash('sha384', $string) . "\n";
	$hash .= " sha512: " . hash('sha512', $string);

 	return $hash;
}
}