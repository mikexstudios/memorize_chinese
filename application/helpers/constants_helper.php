<?php
/**
 * Sets a constant on the fly.
 */
 
$CI =& get_instance();
$CI->load->library('session'); //Seems like template library has not been loaded yet.

$is_flipped = $CI->session->userdata('flipped');
if($is_flipped === true)
{
	define('IS_FLIPPED', 1); //true. Set to number to match database table
}
else
{
	define('IS_FLIPPED', 0); //false
} 

?>
