<?php
/**
*
* @package stickr framework (based on phpBB)
* @version $Id: check.php 
* @copyright (c) 2013 Kenny Cameron
* Developed using the phpBB template engine
*
*/

// Include all the relevant files we need
$root_path = (defined('ROOT_PATH')) ? ROOT_PATH : './';
require_once($root_path . 'inc/start.php');

$Convrtr    = new Convrtr();
$template 	= new Template(); // Needs to be done on every page we are setting up
$template->set_custom_template($root_path . 'theme/html', 'default');  // This is important as it states where the template files are located
include_once($root_path . 'inc/language.php');

$page 		= "{$root_path}upload.php";
$mode 		= (isset($_GET['m'])) ? (string) $_GET['m'] : '';
$check		= (isset($_POST['check'])) ? true : false;

$section	= 'Check Files';

foreach ($_SESSION as $key => $value) {
	$_SESSION[$key] = stripslashes($value);
}

// Wipe sessions
if (isset($_POST['clss'])) {
	unset($_SESSION);
	session_destroy(); 
}

$errors 	= array(); // Set up an array to catch errors
if($check) {    
    if (empty($_FILES["tmpFile"]) || $_FILES["tmpFile"]["size"] == 0) {
        $errors[] = "There was no file uploaded - please make sure you added a file!";
    }

    $tmpFile = @fopen($_FILES["tmpFile"]["tmp_name"], "rb");
    @fclose($tmpFile);
    if($tmpFile) {

        $tmpF = fopen($_FILES["tmpFile"]["tmp_name"], "rb");
        $data = fread($tmpF, 32); // grabbing the 1st 32 bytes
        fclose($tmpF);
        
        $file_hex       = $Convrtr->strToHex($data);
        $file_header    = $Convrtr->identifyHeader($file_hex);
    }
    else {
        $errors[] = 'Unable to open the file';
    }
    if(!sizeof($errors)) {
        $mesg = "File upload was successful<br /><br />"; 
        $mesg .= "File header (first 32 bytes): " . $file_hex . "<br />"; 
        $mesg .= "Your file was identified as '" . $file_header . "'"; 
        $template->assign_vars(array(
            'MSG_HEADER' => $mesg,
        ));
        unset($_FILES);
    }
    else {
        $count = 0;
        // Loop through all our error messages and add them into a block
        // This block can then be passed to the template and styled
        // More information available here - http://wiki.phpbb.com/Tutorial.Template_syntax#Blocks
        foreach($errors as $error)
        {
            $errors[$count]['message_text'] = $error;
            $template->assign_block_vars('errors', array(
                'ERROR_TXT' => $error,
            ));
            $count++;
        }
    }
}

page_header($section);

$template->assign_vars(array( 
	'ROOT_PATH'    => $root_path,
	'S_ERROR'      => (isset($errors) && sizeof($errors)) ? true : false,
	'S_MESSAGE'    => (isset($mesg)) ? $mesg : '',    
));

// Set up the html file for the page
$template->set_filenames(array(
	'body' => 'check_body.html',
));

// Assign the html file to the display
$template->display('body');