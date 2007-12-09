<?php

class Learn extends Controller {

	function Learn() {
		parent::Controller();	
	}
	
	function _remap($method) {
		$param1 = $this->uri->segment(3);
		if($param1 == 'flipped')
		{
			$this->index($method, true);
		}
		
		$this->index($method);
		
	}
	
	function index($in_deck_id, $flipped=false) {
		if(empty($in_deck_id))
		{
			show_error('Invalid deck selected!');
		}
		
		$in_deck_id = intval($in_deck_id);
		$this->session->set_userdata('learn_deck', $in_deck_id);
		if($flipped === true)
		{
			$this->session->set_userdata('flipped', true);
		}
		
		redirect('/memorize');
		
	}
	
}
?>
