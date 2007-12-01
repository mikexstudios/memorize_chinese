<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cards_model extends Model {
	
	//var $id, $category, $question, $answer;
	
	function Users_model() {
		parent::Model();	
	}
	
	function get_distinct_deck_ids() {
		$this->db->select('distinct deck_id'); //distinct will only return unique values
		$this->db->from(CARDS_TABLE);
		$query = $this->db->get(); //Returns a column matrix
		
		foreach($query->result_array() as $row)
		{
			$temp[] = $row['deck_id'];
		}
		
		return $temp;
	}
	
	/**
	 * Obtains a card information.
	 * 
	 * @param integer $in_id Id of card.
	 * @return array	 
	 */	 	 	 	 	
	function get_one($in_id) {
		$this->db->select('*');
		$this->db->from(CARDS_TABLE);
		$this->db->where('id', $in_id);
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	function get_one_random() {
		$max_id = $this->db->count_all(CARDS_TABLE);
		//Keep trying a random row until successful
		$row = $this->get_one(rand(1,$max_id)); //MySQL Id's start at 1
		
		return $row;
	}
	
	function get_one_from_level($in_level)
	{
		
	}
	
	function get_card_ids_random($in_deck_id = '') {
		$this->db->select('id');
		$this->db->from(CARDS_TABLE);
		$this->db->orderby('', 'RAND()');
		if(!empty($in_deck_id))
		{
			$this->db->where('deck_id', $in_deck_id);
		}
		else
		{
			$this->db->limit(100); //We limit here since all the cards could get pretty large.
		}
		$query = $this->db->get();
		
		$temp = $query->result_array();
		foreach($temp as $key=>$each_temp)
		{
			$temp[$key] = $each_temp['id'];
		}
		
		return $temp;
	}

}

?>
