<?php

// Classes
class Convrtr {

    public function __construct() {
        session_start();
    }
    
    /* 
     * Format size of file 
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
    
    /* 
     * Debug whatever
     */
    function Debug($function) {
        echo '<pre><br /><br />';
        print_r($function);
        echo '</pre>';
    }
    
    
    /* 
     * String to Binary
     * $string  - text string ('X')
     * 
     * returns binary string 
     */
    function strToBin($string) {
        for($i=0;$i<strlen($string);$i++){
            $bin .= sprintf("%08s ",decbin(ord($string[$i])));
        }
        
        return $bin;
    }
    
    /* 
     * Binary to String
     * $string  - binary string (01011000 - 'X')
     * 
     * returns text string
     */
    function binToStr($string) {
        $string = preg_replace("/[^01]/","", $string);
        $len = strlen($string);
        for ($i = 0; $i < $len; $i += 8)
        {
            $str .= chr(bindec(substr($string,$i,8)));
        }
        
        return $str;     
    }
        
    /* 
     * String to Hex
     * $string                  - text string ('foo bar')
     * $delimeter (optional)    - sets spacer between hex chars (either space or hyphen)
     * 
     * returns hexadecimal string
     */
    function strToHex($string, $delimiter = ' ') {
        $spacer = ($delimiter != ' ') ? '-' : ' ';
        for ($i=0; $i < strlen($string); $i++) {
            $lead = (ord($string[$i]) < 16) ? '0' : '';
            $hex .= $lead . dechex(ord($string[$i])) . $spacer;
            $hex = strtoupper($hex);
        }
        
        return $hex;
    }
    
    /* 
     * Hex to String
     * $string  - hexadecimal string (66 6f 6f 20 62 61 72  - 'foo bar')
     * 
     * returns text string
     */
    function hexToStr($string) {
        $pattern = array(' ', '-', '\x', '0x');
        $string = str_replace($pattern, '', $string);
        $str = pack('H*', $string);
        
        return $str;
    }
    
    /* 
     * String to Base 64
     * $string  - text string ('foo bar')
     * 
     * returns base64 encoded string
     */
    function strToB64($string) {
        return base64_encode($string);
    }
    
    /* 
     * String to Base 64
     * $string  - base 64 string (Zm9vIGJhcg== - 'foo bar')
     * 
     * returns text string
     */
    function b64ToStr($string) {
        return base64_decode($string);
    }

    /* 
     * String to Decimal
     * $string  - text string ('foo bar')
     * 
     * returns decimal string
     */ 
    function strToDec($string) {
        for ($i=0; $i < strlen($string); $i++) {
            $dec .= ord($string[$i]) . " ";
        }
        
        return $dec;
    }
    
    /* 
     * Decimal to String
     * $string  - decimal string (102 111 111 32 98 97 114  - 'foo bar')
     * 
     * returns text string
     */ 
    function decToStr($string) {
        $split = explode(" ", $string);
        for($i=0; $i < sizeof($split); $i++)
        {
            $str .= chr($split[$i]);
        }
        
        return trim($str); // strip extra null char at end
    }
    
    /*
     * Maps an array of characters to their morse equivalent
     * Periods, hyphens and some other characters are exluded
     * 
     * returns array
     */
    function morseMap() {
        $map = array (
            '0' => '----- ','1' => '.---- ','2' => '..--- ','3' => '...-- ','4' => '....- ','5' => '..... ','6' => '-.... ','7' => '--... ',
            '8' => '---.. ','\'' => '.----. ','9' => '----. ','B' => '-... ',',' => '-.-.-. ','@' => '.--.-. ','C' => '-.-. ','"' => '.-..-. ','/' => '-..-. ',
            'F' => '..-. ','(' => '-.--. ','P' => '.--. ','G' => '--. ','H' => '.... ','J' => '.--- ',')' => '-.--.- ','Q' => '--.- ',
            'K' => '-.- ','L' => '.-.. ','?' => '..--.. ','Z' => '--.. ','D' => '-.. ',':' => '---... ','S' => '... ','I' => '.. ','O' => '--- ','!' => '-.-.-- ',
            'Y' => '-.-- ',',' => '--..-- ','_' => '..-- .- ','M' => '-- ','R' => '.-. ','N' => '-. ','=' => '-...- ','V' => '...- ','$' => '...-..- ',
            'X' => '-..- ','U' => '..- ','A' => '.- ','T' => '- ','W' => '.-- ','E' => '. ',' ' => ' ', 'Ch' => '----',
        );
        return $map;
    }
    /* 
     * String to Morse
     * $string  - text string ('foo bar')
     * https://github.com/balsama/sandbox/blob/master/morse.php
     * 
     * returns morse code string
     */
    function strToMorse($string) {
        $maps = $this->morseMap();

        $string = str_split(strtoupper($string));
        $converted = array();
        foreach ($string as $letter) {
            foreach ($maps as $input => $output) {
                if ($letter === $input) {
                    $converted[] = $output;
                }
            }
        }
        $morse = implode('', $converted);

        return $morse;
    }
    
    /*
     * Morse to String - Powerby: Mgccl's
     * Doc: http://en.wikipedia.org/wiki/Morse_code
     * Source code: http://mgccl.com/2007/01/24/morse-code-in-php/
     * $string - morse code string (..-. --- ---   -... .- .-. ['foo bar'])
     * 
     * returns text string
     */
    function morseToStr($string) {
        $string .= ' ';
        $maps = $this->morseMap();

        foreach ($maps as $key => $var) {
            $string = str_replace($var, $key, $string);
        }
        return $string;
    }
    
    /* 
     * String to Morsenary
     * Morsenary has the appearance of morse, but is actually binary
     * Text is converted to binary, then each 0 and 1 are replaced with . and - repectively
     * $string - text string ('foo bar')
     * 
     * returns morsenary
     */
    function strToMorsenary($string) {
        $morsenary = $this->strToBin($string);
        $pattern = array('0', '1'); $replacement = array('.', '-');
        $morsenary = str_replace($pattern, $replacement, $morsenary);
        
        return $morsenary;
    }
    
    /* 
     * Morsenary to String
     * The reverse of the strToMorsenary() function - replace ./- with 0/1
     * Then convert resulting binary back to a text string
     * $string - morsenary string: 
     * 
     * returns text string
     */
    function morsenaryToStr($string) {
        $pattern = array('.', '-'); $replacement = array('0', '1');
        $string = str_replace($pattern, $replacement, $string);
        $string = $this->binToStr($string);
        
        return $string;
    }
    
    /* 
     * Reverse String
     * $string  - text string ('foo bar')
     * 
     * returns text string
     */
    function reverseStr($string) {
        $ary        = str_split($string);
        $rev_ary    = array_reverse($ary);
        $rev        = implode($rev_ary);
        
        return $rev;
    }
    
    /* 
     * Return hash values
     * $string  - text string ('foo bar')     
     * 
     * returns text string
     */
    function returnHash($string) {
        $hash = "    md2: " . hash('md2', $string) . "<br />";
        $hash .= "    md4: " . hash('md4', $string) . "<br />";
        $hash .= "    md5: " . hash('md5', $string) . "<br />";
        $hash .= "   sha1: " . hash('sha1', $string) . "<br />";
        $hash .= " sha224: " . hash('sha224', $string) . "<br />";
        $hash .= " sha256: " . hash('sha256', $string) . "<br />";
        $hash .= " sha384: " . hash('sha384', $string) . "<br />";
        $hash .= " sha512: " . hash('sha512', $string);
    
        return $hash;
    }
    
    function charCounts($string, $uc = false) {
        $strip_space    = str_replace(' ', '', $string);
        $counts         = '';
        $counts         .= "Word &amp; Characters Counter / Frequencies\r\n----------------------------------------\r\n";
        
        $chars          = strlen($string);
        $chars_nospace  = strlen($strip_space);
        $size           = $this->formatSize(mb_strlen($string, '8bit'));        
        
        $counts .="Characters (spaces)     = $chars\r\nCharacters (no spaces)  = $chars_nospace\r\nFilesize                = $size\r\n";
        
        $count_space        = preg_replace('[^\s]', '', $string);
        $spaces             = substr_count($count_space, ' ');
        $counts             .= "Whitespace count        = $spaces\r\n";
        
        if($uc) {
            $unique_chars       = count_chars($strip_space, 3);
            $unique_chars_count = strlen($unique_chars);
            $counts .= "Unique Characters       = ($unique_chars_count) $unique_chars\r\n";
        }
        
        return $counts;
    }

    /* 
     * Word and character frequency analysis
     * $string                      - text taken from $_POST/$_REQUEST
     * $case_sensitive (optional)   - force uppercase on string
     * $delimiter (optional)        - explode to array based on value given
     * 
     * returns a lot of stuff
     */
    function stringAnalyse($string, $case_sensitive = false, $delimiter = '') {
        
        if($case_sensitive) { 
            $string = strtoupper($string); 
            if($delimiter) { 
                $delimiter = strtoupper($delimiter);  
            }
        }
        
        $data .= $this->charCounts($string, true);

        $wordlist   = explode(" ", $string);
        $result     = @array_combine($wordlist, array_fill(0, count(asort($wordlist)), 0));
        
        foreach($wordlist as $word) {
            $result[$word]++;
        }
        $unique_word_count = count($result);
        
        $data .= "Unique words            = $unique_word_count\r\n";   
        foreach($result as $word => $count) {
            $word_freqs .= "$word ($count)\n";
        }
        $data .= "\nWord Frequencies:\r\n------------------\r\n$word_freqs\r\n";

        if ($delimiter) {
            $whitespace_ary         = explode($delimiter, $string);
            $whitespace_ary_unique  = array_count_values($whitespace_ary);
            
            ksort($whitespace_ary_unique);
            $data                  .= "Delimiter: '$delimiter'\r\n\nCharacter Frequencies\r----------------------\r";
            
            foreach($whitespace_ary_unique as $key => $value) {
                $space  = strspn($value, " \t\r\n\0\x0B");
                $len    = strlen($key);
                $data .= "\n$value instance(s) of $len leading characters - '$key'\r";
            }
        }

        return $data;
    }
        
    /* 
     * Hex pattern and character frequency analysis
     * $string                      - text taken from $_POST/$_REQUEST
     * $case_sensitive (optional)   - force uppercase on string
     * $delimiter (optional)        - explode to array based on value given
     * 
     * returns a lot of stuff
     */
    function hexAnalyse($string, $case_sensitive = false, $delimiter = '') {
        
        if($case_sensitive) { 
            $string = strtoupper($string); 
            if($delimiter) { 
                $delimiter = strtoupper($delimiter);  
            }
        }
        
        $data .= $this->charCounts($string);

        if ($delimiter) {
            $whitespace_ary         = explode($delimiter, $string);
            $whitespace_ary_unique  = array_count_values($whitespace_ary);

            ksort($whitespace_ary_unique);
            $data                  .= "\nDelimiter: '$delimiter'\r\n\nCharacter Frequencies\r----------------------\r\n";

            foreach($whitespace_ary_unique as $key => $value) {
                $data .= "\n Val: '$key'    Freq: $value\r";
            }

            /* This is very processor heavy - commented out for now
             * It's also really bad code haha
             * Need to find a way to accomplish the same thing using regex
             * Trying to match double, triple and quad values in a large hex string
             *
             * Examples - 0A-0A  /  FF-FF-FF / 00-00-00-00
             * Spitting out the original string with d/t/q strings highlighted would be cool
             
            $d = 0;  $t = 0; $q = 0;
            for ($i = 0; $i < count($whitespace_ary); $i++) {
                if($whitespace_ary[$i] == $whitespace_ary[$i+1]) {
                    $d++;
                }
                if($whitespace_ary[$i] == $whitespace_ary[$i+1] && $whitespace_ary[$i] == $whitespace_ary[$i+2]) {
                    $t++;
                }
                if($whitespace_ary[$i] == $whitespace_ary[$i+1] && $whitespace_ary[$i] == $whitespace_ary[$i+2] && $whitespace_ary[$i] == $whitespace_ary[$i+3]) {
                    $t++;
                }                
            }
            $data .= "\r\n$d duplicate value(s) found";
            $data .= "\r\n$t triplicate value(s) found";
            $data .= "\r\n$t quad value(s) found\n";
            */
        }

        return $data;
    }

    /* 
     * Idenfity file headers based on hex
     * $string - hex values taken from uploaded file
     * 
     * returns file header or unknown
     */    
    function identifyHeader($string) {

        if(substr($string, 0, 5) == '42 4D') {
            $header = "BMP";
        }
        else if(substr($string, 0, 23) == 'D0 CF 11 E0 A1 B1 1A E1') {
            $header = "DB, DOC, DOT, PPS, PPT, XLA, XLS, VSD, WIZ, WPS";
        }
        else if(substr($string, 0, 2) == '78') {
            $header = "DMG";
        }
        else if(substr($string, 0, 14) == '49 44 33 03 37' || substr($string, 0, 14) == '49 44 33 03 39') {
            $header = "GIF";
        }
        else if(substr($string, 0, 8) == 'FF D8 FF') {
            $header = "JPG";
        }
        else if(substr($string, 0, 34) == '4D 54 68 64 00 00 00 06') {
            $header = "MIDI";
        }
        else if(substr($string, 0, 11) == '49 44 33 03') {
            $header = "MP3";
        }
        else if(substr($string, 0, 23) == '66 74 79 70 69 73 6F 6D' || substr($string, 0, 23) == '66 74 79 70   6D 70 34 32') {
            $header = "MP4";
        }
        else if(substr($string, 0, 11) == '25 50 44 46') {
            $header = "PDF";
        }
        else if(substr($string, 0, 11) == '89 50 4E 47 0D 0A 1A 0A 00 00 00 0D 49 48 44 52') {
            $header = "PNG";
        }
        else if(substr($string, 0, 17) == '38 42 50 53 00 01') {
            $header = "PSD";
        }
        else if(substr($string, 0, 11) == '52 49 46 46') {
            $header = "WAV";
        }
        else if(substr($string, 0, 11) == '50 4B 03 04') {
            $header = "ZIP";
        }
        else {
            $header = 'Unknown';
        }
        
        return $header;
    }
}   