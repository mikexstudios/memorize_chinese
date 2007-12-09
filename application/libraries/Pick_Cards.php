<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pick_Cards {
	var $CI;
	var $deck_id;

	function Pick_Cards() {
		$this->CI =& get_instance();
	}
	
	function set_deck($in_deck_id = false) {
		$this->deck_id = intval($in_deck_id);
	}
	
	function _get_next_id() {
		//Next card id is selected randomly where the repetition date is <= today.
		if($this->deck_id !== false && is_int($this->deck_id))
		{
			$random_card_id = $this->CI->card->get_one_id_random_joined('AND deck_id = '.$this->deck_id);
			//echo $this->CI->db->last_query();
		}
		else
		{
			$random_card = $this->CI->card->get_one_id_random_joined();
		}
		
		if(empty($random_card_id))
		{
			return false;
		}
		
		
		return $random_card_id;

	}
		
	function get_next() {	
		//Since we now have the interval functionality, we can just keep getting
		//random cards within the range and deck we specify.
	
	
		$card_id = $this->_get_next_id();
		if($card_id === false)
		{
			//We really now went through all of the cards for all of the answer
			//rating levels (5 times).
			return false;
		}
		
		$card_data = $this->CI->card->find_by_id($card_id);
		
		//Correct answer rating level. So we return card data.
		return $card_data;
	}

}

?>
