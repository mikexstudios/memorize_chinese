<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Grade {
	var $CI;
	
	var $card_id;
	var	$new_grade;
	
	var $card;
	
	function Grade() {
		$this->CI =& get_instance();
	}
	
	function set_new_grade($in_new_grade) {
		$this->new_grade = $in_new_grade;
		
		//Now we run through algorithm for grading:
		//$this->CI->user_progress_model->card_id = $this->new_grade;
		$this->card = $this->CI->user_progress->find_by_card_id($this->card_id);
		if($this->card === false) //We never encountered this card yet.
		{
			//So we create a baseline record so that we can do the next steps easily
			//(without keep checking for if card exists).
			$this->card = new User_progress();
			$this->card->card_id = $this->card_id;
			$this->card->flipped = IS_FLIPPED;
			//The other values, we have the default field set in MYSQL.
			$this->card->save();
			
			//Update card values:
			$this->card = $this->CI->user_progress->find_by_card_id($this->card_id);
		}
		
		//If the user gets two 5's in a row, then we assume that the card has been learnt.
		if($this->card->answer_rating >= 5 && $this->new_grade >= 5)
		{
			//We bump the inverval up
			$this->card->interval = $this->card->interval + 1;
			$this->card->update();
			
			//Compute next repetition date
			$this->CI->set_next_repetition_date();
		}
		else
		{
			//We just set the new score
			$this->card->answer_rating = $this->new_grade;
			$this->card->update();
		}
	}

//--------------------------------------------------------------------------------------------------

	function set_next_repetition_date() {
		$interval = $this->card->interval;
		$repetitions_to_memorize = intval($this->card->repetitions_to_memorize);
		
		$next_repetition_days = 0; //Initialize
		switch($interval)
		{
			case 1:
				$next_repetition_days = $this->_interval_1($repetitions_to_memorize);
			case 2:
				$next_repetition_days =  $this->_interval_2($repetitions_to_memorize);
			default:
				if($interval <= 0) { return false; }
				$next_repetition_days = $this->_interval_gteq_3($interval, $repetitions_to_memorize);
		}
		
		//Adjust current date (now) with days computed
		//Days * 24 hours * 60 minutes * 60 seconds. We want to convert days to seconds.
		$next_repetition_date = now() + ($next_repetition_days * 24 * 60 * 60); 
		$this->card->next_repetition_date = $next_repetition_date;
	}
	
	function _interval_1($repetitions) {
		switch($repetitions)
		{
			case 1:
				return 4;
			case 2:
				return 3;
			case 3:
				return 2;
			default:
				if($interval <= 0) {return false;}
				return 1;
		}
	}

	function _interval_2($repetitions) {
		switch($repetitions)
		{
			case 1:
				return 8;
			case 2:
				return 7;
			case 3:
				return 6;
			case 4:
				return 5;
			default:
				if($interval <= 0) {return false;}
				return 1;
		}	
	}

	function _interval_gteq_3($interval, $repetitions) {
		if($interval <= 3)
		{
			$days = 16;
		}
		else
		{
			$days = 35 * pow(2, ($interval-4));
		}
		
		switch($repetitions)
		{
			case 1:
				return $days+1;
			case 2:
				return $days;
			case 3:
				return floor(floatval($days)*0.94);
			default:
				if($interval <= 0) {return false;}
				return floor(floatval($days)*0.44)-($repetitions-7);
		}		
	}
	

}

?>
