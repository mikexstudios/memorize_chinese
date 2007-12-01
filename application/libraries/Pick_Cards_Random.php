<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pick_Cards_Random {
	var $CI;
	
	function Pick_Cards_Random() {
		$this->CI =& get_instance();
	}
	
	function get_next() {
		return $this->CI->cards_model->get_one_random();
	}

}

?>
