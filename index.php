<style>
fieldset {
  display: block;
      margin: 0 10px 0 10px;

    padding-top: 0;
    padding-bottom: 0.625em;
    padding-left: 0;
    padding-right: 0.75em;
    border: 0;
}
</style>

<?php
	session_start();
	include 'DBconnect.php'; 
	include 'Question.php'; 
	include 'Question_choice.php'; 
	$_SESSION['start'] = new DateTime();
	//echo $now->format('Y-m-d H:i:s');
	
	//Object Testing
	$choice= new Question_choice(1,1,1,1);
	$choice2= new Question_choice(2,2,2,2);
	$choices=array($choice,$choice2);
	//$question= new Question(1,"THA DOULEPSEI?",$choices);
	//print_r($choices);
	//echo $question->getQuestion();
	//--Object Testing
	
	$questions=array();
	$sql = "SELECT * FROM Question";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$question_ID=$row["question_id"];
			$question=$row["question"];
			$question_choice= array();
			//echo "Quest_id: " . $row["question_id"]. " - Name: " . $row["question"]. "<br>";
			
			$sql_choice="Select * FROM Question_choice where question_id= ".$question_ID;
			$result_choice = $mysqli->query($sql_choice);
			while($row_choice = $result_choice->fetch_assoc()) {
				//echo "Choice_id: " . $row_choice["choice_id"]. " - Name: " . $row_choice["choice"]. "<br>";
				$choice=new Question_choice($row_choice["choice_id"],$row_choice["question_id"],$row_choice["choice"],$row_choice["is_right_choice"]);
				array_push($question_choice,$choice);
			}
			$question_DB=new Question($question_ID,$question,$question_choice);
			array_push($questions,$question_DB);
		}
	} else {
		echo "No questions found";
	}
	$i=1;
	foreach($questions as $quest) {
		
		echo $i .". ". $quest->getQuestion() ."<br> ";
				
		 foreach($quest->getQuestion_choice() as $choice) {
			echo "<fieldset  id=\"".$quest->getId()."\">";
			echo "<ul class=\"answers\">";
			echo "<input type=\"radio\" name=\"".$choice->getChoice()."\" ><label for=\"q1a\">";
			echo $choice->getChoice();
			echo "</label><br/> ";
			echo "</ul>";
			echo "</fieldset>";

		}
		$i++;
	}
	
	
	
	echo "<form action=\"http://localhost:81/WebAssignment_1/PHP/submit.php\" method=\"get\"> 
		<input type=\"submit\" value=\"Submit\">
	</form>";
	
	
	
	$mysqli->close();
?>