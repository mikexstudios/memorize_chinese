<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pick_Cards {
	var $CI;
	var $deck_id;
	
	var $previous_card_id = -1; //Init to a non-id

	function Pick_Cards() {
		$this->CI =& get_instance();
	}
	
	function set_deck($in_deck_id = false) {
		if($in_deck_id === false)
		{
			$this->deck_id = false;
		}
		else
		{
			$this->deck_id = intval($in_deck_id);
		}
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
			$random_card_id = $this->CI->card->get_one_id_random_joined();
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
		
		//Keep track of what the previous card id was so that we can make sure
		//that the same card id doesn't appear in a row. Fixes #3.
		//NOTE!! The reason why this doesn't work is because we are stateless :).
		//       Must use sessions then, I guess!
		if($this->previous_card_id == $card_id)
		{
			echo 'duplicate card!';
			return $this->get_next();
			//The rest is skipped	
		}
		
		$this->previous_card_id = $card_id;
		
		
		$card_data = $this->CI->card->find_by_id($card_id);
		
		//Correct answer rating level. So we return card data.
		return $card_data;
	}

}

?>
