<?php
	class Question_choice
	{
		var $ID;
		var $question_ID;
		var $choice;
		var $isRight;
		public function __construct($ID, $question_ID, $choice,$isRight) {
			$this->ID = $ID;
			$this->question_ID = $question_ID;
			$this->choice = $choice;
			$this->isRight = $isRight;

			
		}
		public function getId() {
		  return $this->ID;
		}
	   
		public function getQuestionID() {
		  return $this->question_ID;  
		}
	 
		public function getChoice() {
		  return $this->choice;
		}
	 
		public function isRight() {
		  return $this->Choice;
		}
	 
		public function setId($ID) {
		  $this->ID = $ID;    
		}
	 
		public function setQuestionID($questionID) {
		  $this->questionID = $questionID;    
		}
	 
		public function setChoice($Choice) {
		  $this->Choice = $Choice;    
		}
	 
		public function setRight($isRight) {
		  $this->isRight = $isRight;    
		}
		
	}

?>