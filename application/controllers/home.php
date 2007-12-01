<?php

class Home extends Controller {

	function Home() {
		parent::Controller();	
	}
	
	function index() {	
		//Generate list of decks
		$this->load->model('decks_model');
		$decks = $this->decks_model->get_all();
		$this->template->add_value('decks', $decks);
		
		$this->load->view('home');
	}
	
	function flipped() {
		$is_flipped = $this->session->ro_userdata('flipped');
		if(empty($is_flipped))
		{
			$this->session->set_userdata('flipped', true);
		}
		
		//Else flipped is deleted.
		$this->index();
	}
}
?>
