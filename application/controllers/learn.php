<?php

class Learn extends Controller {

	function Learn() {
		parent::Controller();	
	}
	
	
	function _remap($method) {
		/*
		$param1 = $this->uri->segment(3);
		if($param1 == 'flipped')
		{
			$this->index($method, true);
		}
		*/
		$this->index($method);
		
	}
	
	
	function index($in_deck_id) {
		if(empty($in_deck_id))
		{
			show_error('Invalid deck selected!');
		}
		
		$in_deck_id = intval($in_deck_id);
		$this->session->set_userdata('learn_deck', $in_deck_id);
		/*
		if($flipped === true)
		{
			$this->session->set_userdata('flipped', true);
		}
		*/
		
		//Check if we have a range of cards selected
		/*
		$cards_start = $this->uri->segment(3);
		$cards_end = $this->uri->segment(4);
		if(!empty($cards_start) && is_int($cards_start))
		{
			if(!empty($cards_end) && is_int($cards_end))
			{
			}
		}
		*/
		
		redirect('/memorize');
		
	}
	
}
?>
