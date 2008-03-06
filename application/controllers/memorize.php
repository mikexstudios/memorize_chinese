<?php

class Memorize extends Controller {
	var $is_flipped = false;
	
	function Memorize()
	{
		parent::Controller();	
	}
	
	function _initialize() {
		$this->load->model('user_progress');
		//Check for flipped option
		$this->is_flipped = $this->session->userdata('flipped'); //This line is probably not necessary
	}
	
	function index()
	{
		$this->showquestion();
	}
	
	/**
	 * Displays a flashcard
	 */	 	
	function showquestion() {
		$this->_initialize();
	
		//No support for autoloading in CI 1.5.4 yet.
		$this->load->model('decks_model');
		$this->load->model('card');
		
		$this->load->library('Pick_Cards');
		$learn_deck = $this->session->userdata('learn_deck');
		
		//Set our deck
		if(empty($learn_deck))
		{
			$this->pick_cards->set_deck(false); //-1 means all decks
		}
		else
		{
			$learn_deck = intval($learn_deck);
			$this->pick_cards->set_deck($learn_deck);
		}
		
		$question = $this->pick_cards->get_next();
		
		//We went through all of the cards
		if($question === false)
		{
			//Clear flipped
			//$this->session->ro_userdata('flipped');
			
			//We clear any decks that we are focusing on (learn_deck) and prompt user
			//to review old material. Otherwise, we show the done message.
			$learn_deck = $this->session->ro_userdata('learn_deck'); //Read once! Deletes session var too.
			if(!empty($learn_deck))
			{
				$this->load->view('done_review_old_materials');
			}
			else
			{
				$this->load->view('done');
			}
		}
		else
		{
			$this->template->add_value('id', $question->id);
			$deck_name = $this->decks_model->get_name($question->deck_id);
			$this->template->add_value('category', $deck_name);
			$question->answer = format_pinyin($question->answer);
			if($this->is_flipped === true)
			{
				$this->template->add_value('answer', $question->question);
				$this->template->add_value('question', $question->answer);
				//We want to filter out any chinese characters from the extra that match
				//this word.
				$question->extra = preg_replace('/'.$question->question.'/', '_', $question->extra);
				$this->template->add_value('question_extra', $question->extra);
				$question->extra2 = preg_replace('/'.$question->question.'/', '_', $question->extra2);
				$this->template->add_value('question_extra2', $question->extra2);
			}
			else
			{
				$this->template->add_value('question', $question->question);
				$this->template->add_value('answer', $question->answer);
				$this->template->add_value('answer_extra', $question->extra);
				$this->template->add_value('answer_extra2', $question->extra2);
			}
			
			
			$this->load->view('show_question');
		}
	}
	
	function grade($in_card_id, $in_grade) {
		$this->_initialize();
		
		$this->load->model('user_progress');
		
		$in_card_id = intval($in_card_id);
		$in_grade = intval($in_grade);
	
		//We currently don't implement elapsed_time
		
		$this->load->library('Grade');
		$this->grade->card_id = $in_card_id;
		$this->grade->set_new_grade($in_grade);
		
		
		//See if we need to set the current_grade_level down. This should be in
		//Pick Cards!
		$temp_cgl = $this->session->userdata('current_answer_rating');
		if($in_grade < $temp_cgl)
		{
			$this->session->set_userdata('current_answer_rating', $in_grade);
		}
	
		redirect('/memorize');
	}
	
	
}
?>
