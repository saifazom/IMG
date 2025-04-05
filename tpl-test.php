
<?php
/*
 * Template Name: Test Page Template
 */

// get_header();

if(my_wp_is_tablet()){
	echo 'this is a tablet';
}else{
	echo 'this is not a tablet';
}

echo '<br/><br/>';

echo $_SERVER['HTTP_USER_AGENT'];