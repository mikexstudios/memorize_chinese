<?php

class Review extends Controller {

	function Review() {
		parent::Controller();	
	}
	
	function index() {
		$this->session->ro_userdata('learn_deck'); //Delete learn_deck
		
		redirect('/memorize');
		
	}
	
}
?>
