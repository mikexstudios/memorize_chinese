<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Decks_model extends Model {
	
	//var $id, $category, $question, $answer;
	
	function Decks_model() {
		parent::Model();	
	}
	
	function get_all() {
		$this->db->select('*'); //distinct will only return unique values
		$this->db->from(DECKS_TABLE);
		$query = $this->db->get(); //Returns a column matrix
		
		$temp = $query->result_array();
		
		foreach($temp as $each_temp)
		{
			if(!empty($each_temp))
			{
				$deck[$each_temp['id']] = $each_temp['name'];
			}
		}
		//print_r($deck);
		return $deck;
	}
	
	function get_name($in_id) {
		$this->db->select('name');
		$this->db->from(DECKS_TABLE);
		$this->db->where('id', $in_id);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$temp = $query->row_array();
		return $temp['name'];
	}

}

?>
