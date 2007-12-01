<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_progress_model extends Model {
	
	//var $id, $category, $question, $answer;
	var $flipped = false; //Defines whether or not we are in the flipped card state.
	
	function User_progress_model() {
		parent::Model();	
	}
	
	function where_flipped_check() {
		if($this->flipped === true)
		{
			$this->db->where('flipped', 1);
		}
		else
		{
			$this->db->where('flipped', 0);
		}
	}
	
	function get_card_id_one($card_id) {
		$this->db->select('*');
		$this->db->from(USER_PROGRESS_TABLE);
		$this->db->where('card_id', $card_id);
		$this->where_flipped_check();
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function get_answer_rating($card_id) {
		$temp = $this->get_card_id_one($card_id);
		
		if(!isset($temp['answer_rating']))
		{
			return false;
		}
		
		return $temp['answer_rating'];
	}
	
	function set($card_id, $answer_rating, $date_answered, $time_to_answer) {
		//Check to see if user has already encountered card.
		$temp = $this->get_answer_rating($card_id);
		//die($answer_rating);
		$this->db->set('answer_rating', $answer_rating);
		$this->db->set('date_answered', $date_answered);
		$this->db->set('time_to_answer', $time_to_answer);
		$this->db->limit(1);
		
		if($temp !== false)
		{
			$this->db->where('card_id', $card_id);
			$this->where_flipped_check();
			$this->db->update(USER_PROGRESS_TABLE);
		}
		else
		{
			$this->db->set('card_id', $card_id);
			if($this->flipped === true)
			{
				$this->db->set('flipped', 1);
			}
			
			$this->db->insert(USER_PROGRESS_TABLE);
		}
	}

}

?>
