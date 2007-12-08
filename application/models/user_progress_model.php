<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_progress_model extends Model {
	
	var $card_id;
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
		
		if($this->db->affected_rows() >  0) 
		{
			$query = $this->db->get();
			return $query->row_array();
		}
		
		return false;
	}
	
	function get_answer_rating() {
		$temp = $this->get_card_id_one();
		
		if(!isset($temp['answer_rating']))
		{
			return false;
		}
		
		return floatval($temp['answer_rating']);
	}

	function get_interval() {
		$temp = $this->get_card_id_one();
		return $temp['interval'];
	}
	
	function get_repetitions() {
		$temp = $this->get_card_id_one();
		return $temp['repetitions_to_memorize'];
	}
	
	function set($answer_rating, $date_answered, $interval, $repetitions_to_memorize) {
		//Check to see if user has already encountered card.
		$temp = $this->get_answer_rating();
		//die($answer_rating);
		$this->db->set('answer_rating', $answer_rating);
		$this->db->set('date_answered', $date_answered);
		$this->db->set('interval', $interval);
		$this->db->set('repetitions_to_memorize', $repetitions_to_memorize);
		$this->db->limit(1);
		
		if($temp !== false)
		{
			$this->db->where('card_id', $this->card_id);
			$this->where_flipped_check();
			$this->db->update(USER_PROGRESS_TABLE);
		}
		else
		{
			$this->db->set('card_id', $this->card_id);
			if($this->flipped === true)
			{
				$this->db->set('flipped', 1);
			}
			
			$this->db->insert(USER_PROGRESS_TABLE);
		}
	}
	
	function increment_interval($card_id) {
		if($this->get_card_id_one() !== false)
		{
			$old_interval = $this->get_interval();
			$this->set_interval($old_interval+1);
			return true;
		}
		
		return false;	
	}

	function set_interval($in_interval) {
		$temp = $this->get_interval();
		
		$this->db->set('interval', $in_interval);
		if($temp !== false)
		{
			$this->db->where('card_id', $this->card_id);
			$this->where_flipped_check();
			$this->db->update(USER_PROGRESS_TABLE);
		}
		else
		{
			$this->db->set('card_id', $this->card_id);
			if($this->flipped === true)
			{
				$this->db->set('flipped', 1);
			}
			
			$this->db->insert(USER_PROGRESS_TABLE);
		}
	}
	
	function get_next_repetition_date() {
		$temp = $this->get_card_id_one();
		return $temp['next_repetition_date'];
	}
	
	function set_next_repetition_date($in_date) {
		$temp = $this->get_next_repetition_date();
		
		$this->db->set('next_repetition_date', $in_date);
		if($temp !== false)
		{
			$this->db->where('card_id', $this->card_id);
			$this->where_flipped_check();
			$this->db->update(USER_PROGRESS_TABLE);
		}
		else
		{
			$this->db->set('card_id', $this->card_id);
			if($this->flipped === true)
			{
				$this->db->set('flipped', 1);
			}
			
			$this->db->insert(USER_PROGRESS_TABLE);
		}
	}

}

?>
