<style>
div {
    margin: auto;
	margin-top:5%;
    width: 50%;
    border: 5px solid pink;
    padding: 10px;
	text-align:center;
	font-family:Helvetica;
	font-size:120%;
	border-radius: 25px;

}

</style>
<?php
	session_start();
	include 'Question.php'; 
	include 'Question_choice.php'; 
	$start=$_SESSION['start'];
	$end = new DateTime();
	$diff=date_diff($start,$end);
	echo "<div>";
	if($diff->format("%i")==0)
		echo "Time Used: ". $diff->format("%s Sec");
	else
		echo "Time Used: ". $diff->format("%i Min %s Sec");
	$questions=unserialize($_SESSION['questions']);
	
	$numOfQuest=sizeof($questions);
	$correct=0;
	foreach($questions as $quest)
	{
		//$val=$_POST["nam".$quest->getId()];
		if(!empty($_POST["nam".$quest->getId()])) {
			if($_POST["nam".$quest->getId()]==1)
				$correct++;
		}

	} 

	echo "<br>". $correct . "/". $numOfQuest ." Correct Answers";
	echo "</div>";

?>