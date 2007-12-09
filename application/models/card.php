<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card extends ActiveRecord {
	
	var $flipped = false; //Defines whether or not we are in the flipped card state.
	
  function __construct() {
	  parent::ActiveRecord();
	  $this->_class_name = strtolower(get_class($this));
	  $this->_table = $this->_class_name . 's';
	  $this->_columns = $this->discover_table_columns();
  }
  
  function get_one_id_random_joined($in_where = false) {
  	/*
  	This is our target SQL:
  	SELECT cards.id, user_progress.next_repetition_date 
		FROM `cards` 
		LEFT JOIN `user_progress` //We need a left join so that repetition date field is NULL
		ON cards.id=user_progress.card_id 
		WHERE user_progress.next_repetition_date IS NULL 
		OR user_progress.next_repetition_date < 889898989899 
		ORDER BY RAND() 
		LIMIT 1
  	*/
  
		$this->db->select(CARDS_TABLE.'.id');
		$this->db->from(CARDS_TABLE);
		$this->db->join(USER_PROGRESS_TABLE, CARDS_TABLE.'.id = '.USER_PROGRESS_TABLE.'.card_id', 'left');
		$where = '('.USER_PROGRESS_TABLE.'.next_repetition_date IS NULL
						 OR ('.USER_PROGRESS_TABLE.'.next_repetition_date <= '.now().'
						 AND '.USER_PROGRESS_TABLE.'.flipped = '.IS_FLIPPED.'))';		
		
		if($in_where !== false && is_string($in_where))
		{
			$where .= ' '.$in_where;
		}
		
		$this->db->where($where);
		$this->db->orderby('RAND()');
		$this->db->limit(1);
		$query = $this->db->get();
		
		return element('id', $query->row_array());
	}

}

?> 
