<?php
/* 
 * ROT Text
 */

$rot = $_SESSION['rot_orig'] = $_REQUEST['rot_orig'];

if(!empty($rot)) {
	$str           = $Convrtr->rotText($rot);
	$rot_orig      = $rot;
}

$rot_text 	   = $_SESSION['rot_orig'] 	= $str;