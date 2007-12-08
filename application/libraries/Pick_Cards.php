<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pick_Cards {
	var $CI;
	var $card_ids = array();
	var $card_number = 0; //Holds the card index we are on
	var $current_answer_rating = 0; //Holds the answer rating we are on

	function Pick_Cards() {
		$this->CI =& get_instance();
		
		//Sessions hack:
		//Get current_answer_rating from sessions
		$temp = intval($this->CI->session->userdata('current_answer_rating'));
		if(!empty($temp))
		{
			$this->current_answer_rating = $this->CI->session->userdata('current_answer_rating');
		}
		else
		{
			$this->current_answer_rating = 0;
		}
		
		$this->shuffle();
	}
	
	function shuffle() {
		$learn_deck = $this->CI->session->userdata('learn_deck');
		if(!empty($learn_deck))
		{
			$this->card_ids = $this->CI->cards_model->get_card_ids_random($learn_deck);
		}
		else
		{
			$this->card_ids = $this->CI->cards_model->get_card_ids_random();
		}
	}
	
	function _get_next_id() {
		//Get any existing card id from session
		$temp_cn = intval($this->CI->session->userdata('card_number'));
		if(!empty($temp_cn))
		{
			$this->card_number = $temp_cn;
		}
		else
		{
			$this->card_number = 0;
		}
	
		if(!empty($this->card_ids[$this->card_number]))
		{
			$temp = $this->card_ids[$this->card_number];
			//echo 'here'.$this->card_number;
			$this->card_number++;
			$this->CI->session->set_userdata('card_number', $this->card_number);
			//die('here'.$this->card_number);
			//echo 'here'.$this->card_number;
			return $temp;
		}
		
		$this->card_number = 0;
		$this->CI->session->ro_userdata('card_number'); //We delete it
		$this->card_ids = array();
		
		return false;
	}
	
	function _get_card_data($card_id) {
	
		$card_data = $this->CI->cards_model->get_one($card_id);
		
		//Check to see if card exists in user_progress table
		$user_answer_rating = $this->CI->user_progress->find_by_card_id($card_id);
		
		//$user_answer_rating = $this->CI->user_progress_model->get_answer_rating($card_id);
		if($user_answer_rating !== false)
		{
			$card_data['answer_rating'] = $user_answer_rating->answer_rating;
		}
		else
		{
			//The card doesn't exist. So we set a default answer_rating
			$card_data['answer_rating'] = 0;
		}
		
		return $card_data;
	
	}
	
	function get_next() {
		//Sessions hack:
		//Write current_answer_rating to sessions
		$this->CI->session->set_userdata('current_answer_rating', $this->current_answer_rating); 	
	
		$card_id = $this->_get_next_id();
		//A problem is that current_answer_rating isn't persistent. Therefore, 
		//all of the cards get parsed each time we load a new card!
		//echo $card_id.'|'.$this->current_answer_rating.' ';
		if($card_id === false)
		{
			//We are at the end of the cards
			$this->current_answer_rating++;
			//echo '$'.$this->current_answer_rating.'$';
			if($this->current_answer_rating > 0 && $this->current_answer_rating <= 5)
			{
				//Continue by reshuffling
				$this->shuffle();
				return $this->get_next();
			}
			
			//We really now went through all of the cards for all of the answer
			//rating levels (5 times).
			return false;
		}
		
		$card_data = $this->_get_card_data($card_id);
		
		//Check to see if we are on the correct answer rating
		if($card_data['answer_rating'] > $this->current_answer_rating)
		{
			//Wrong answer rating, let's go to the next card.
			return $this->get_next();
		}
		
		//Correct answer rating level. So we return card data.
		return $card_data;
	}

}

?>
