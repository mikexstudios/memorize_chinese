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
			
			//Compute next repetition date
			$next_repetition_days = $this->get_days_to_next_repetition($this->card->interval, $this->card->repetitions_to_memorize);
			//Adjust current date (now) with days computed
			//Days * 24 hours * 60 minutes * 60 seconds. We want to convert days to seconds.
			$this->card->next_repetition_date = now() + ($next_repetition_days * 24 * 60 * 60); 
			
			//Reset the repetitions to memorize
			$this->card->repetitions_to_memorize = 0;
			
			$this->card->update();
		}
		else
		{
			//We just set the new score and bump up the repetitions
			$this->card->answer_rating = $this->new_grade;
			$this->card->repetitions_to_memorize = $this->card->repetitions_to_memorize + 1;
			$this->card->update();
		}
	}

//--------------------------------------------------------------------------------------------------

	function get_days_to_next_repetition($interval, $repetitions_to_memorize) {
		
		/* No, NOT TRUE:
		//Since reps will always be >= 2, we bump it down to 1 so that the switch
		//statements look cleaner.
		$repetitions_to_memorize = $repetitions_to_memorize - 1; 
		*/
		
		$next_repetition_days = 0; //Initialize
		switch($interval)
		{
			case 1:
				$next_repetition_days = $this->_interval_1($repetitions_to_memorize);
				break;
			case 2:
				$next_repetition_days =  $this->_interval_2($repetitions_to_memorize);
				break;
			default:
				if($interval <= 0) { return false; }
				$next_repetition_days = $this->_interval_gteq_3($interval, $repetitions_to_memorize);
		}
		
		return $next_repetition_days;
		
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
				if($repetitions <= 0) {return false;}
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
				if($repetitions <= 0) {return false;}
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
				if($repetitions <= 0) {return false;}
				$next_days = floor(floatval($days)*0.44)-($repetitions-7);
				if($next_days < 0) //Solves the issue where we have negative numbers
					{ $next_days = 0; }
				return $next_days;
		}		
	}
	
}

/*
//Testing
$x = new Grade();
echo $x->get_days_to_next_repetition(3,15);
*/

?>
