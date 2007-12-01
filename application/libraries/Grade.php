<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Grade {
	var $CI;
	
	function Grade() {
		$this->CI =& get_instance();
	}
	
	function get_previous($in_id) {
		$previous_grade = $this->CI->user_progress_model->get_answer_rating($in_id);
		if(empty($previous_grade))
		{
			$previous_grade = 2.5;
		}
		$previous_grade = floatval($previous_grade);	
		
		return $previous_grade;
	}
	
	function get_new($previous_grade, $in_grade) {
		return $in_grade;	
	}

}

?>
