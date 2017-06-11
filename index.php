<style>
form {
    margin: auto;
	margin-top:5%;
    width: 50%;
    border: 5px solid pink;
    padding: 10px;
	font-family:Helvetica;
	font-size:120%;
	border-radius: 25px;

}


</style>

<?php
	session_start();
	include 'DBconnect.php'; 
	include 'Question.php'; 
	include 'Question_choice.php'; 
	$_SESSION['start'] = new DateTime();
	
	$choice= new Question_choice(1,1,1,1);
	$choice2= new Question_choice(2,2,2,2);
	$choices=array($choice,$choice2);
	
	
	$questions=array();
	$sql = "SELECT * FROM Question order by rand()";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$question_ID=$row["question_id"];
			$question=$row["question"];
			$question_choice= array();
			
			$sql_choice="Select * FROM Question_choice where question_id= ".$question_ID;
			$result_choice = $mysqli->query($sql_choice);
			while($row_choice = $result_choice->fetch_assoc()) {
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
	$_SESSION['questions'] = serialize($questions);
	echo "<form action=\"http://localhost:81/WebAssignment_1/PHP/submit.php\" method=\"POST\">";
	foreach($questions as $quest) {
		
		echo "<div class = 'question'>". $i .". ". $quest->getQuestion() ."</div> ";
		foreach($quest->getQuestion_choice() as $choice) {
			echo "<input class='ans' type=\"radio\" value=\"".$choice->isRight() ." \" name=\"nam".$quest->getId()."\" >";
			echo $choice->getChoice() ."<br>";
		}
		echo "<br>";

		$i++;
	}
	echo "<input type=\"submit\" value=\"Submit\">";
	echo "</form>";

	
	
	$mysqli->close();
?>