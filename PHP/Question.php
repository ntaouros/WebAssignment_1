<?php
	class Question
	{
		var $ID;
		var $question;
		var $question_choice= array();
		public function __construct($ID, $question, array $question_choice) {
			$this->ID = $ID;
			$this->question = $question;
			$this->question_choice = $question_choice;
			/* foreach($question_choice as $question_choice) {
				$this->question_choice[] = new Question_choice($question_choice, array());
			} */
		}
		public function getId() {
		  return $this->ID;
		}
	   
		public function getQuestion() {
		  return $this->question;  
		}
	 
		public function getQuestion_choice() {
		  return $this->question_choice;
		}
	 
		public function setId($ID) {
		  $this->ID = $ID;    
		}
	 
		public function setQuestion($question) {
		  $this->question = $question;    
		}
	 
		public function setQuestion_choice($question_choice) {
		  $this->question_choice = $question_choice;    
		}
	}
		


?>