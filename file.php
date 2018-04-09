<?php
/**
*
* @package stckr framework (based on phpBB)
* @version $Id: file.php
* @copyright (c) 2018 Kenny Cameron
* Developed using the phpBB template engine
*
*/

// Include all the relevant files we need
$root_path = (defined('ROOT_PATH')) ? ROOT_PATH : './';
require_once($root_path . 'inc/start.php');

$Convrtr	= new Convrtr();
$template	= new Template(); // Needs to be done on every page we are setting up
$template->set_custom_template($root_path . 'theme/html', 'default');  // This is important as it states where the template files are located
include_once($root_path . 'inc/language.php');

$page		= "{$root_path}file.php";
$mode		= (isset($_GET['m'])) ? (string) $_GET['m'] : '';

$section	= 'File Headers';

foreach ($_SESSION as $key => $value) {
	$_SESSION[$key] = stripslashes($value);
}

page_header($section);

$template->assign_vars(array(
	'ROOT_PATH'	=> $root_path,
));

// Set up the html file for the page
$template->set_filenames(array(
	'body' => 'file_body.html',
));

// Assign the html file to the display
$template->display('body');