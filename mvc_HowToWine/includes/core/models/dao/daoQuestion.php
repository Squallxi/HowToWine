<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Question.php";
	require_once "includes/core/models/class/Answer.php";
	//Récupération des données de la table Chapitre dans la bdd
    function getAllQuestions(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT question.id, question.intitule, question.id_soustheme
			FROM question";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$questions = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$question = new Question($SQLRow['intitule']);			
			$question->setId($SQLRow['id']);
			$questions[] = $question;		
		}

		$SQLStmt->closeCursor();

		return $questions;
	}

	function getAllQuestionsForQuiz(int $idSubTheme, int $idQuiz){
		$conn = getConnexion();

    	$SQLQuery = "SELECT question.id, intitule
			FROM question 
			INNER JOIN classer ON question.id = classer.id_question
			WHERE classer.id_sous_theme = :idsstheme
			AND classer.id_questionnaire = :idquestionnaire";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idsstheme', $idSubTheme, PDO::PARAM_INT);
		$SQLStmt->bindValue(':idquestionnaire', $idQuiz, PDO::PARAM_INT);
		$SQLStmt->execute();

		$questions = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$question = new Question($SQLRow['intitule']);			
			$question->setId($SQLRow['id']);
			$questions[] = $question;		
		}

		$SQLStmt->closeCursor();

		return $questions;
	}
function getAllAnswersByQuestion(int $idQuestion): array{
    $conn = getConnexion();

	$SQLQuery = "SELECT reponses.id , libelle , bonne_reponse
	FROM question
	INNER JOIN reponses ON reponses.id_question = question.id
	WHERE question.id = :id";

	$SQLStmt = $conn->prepare($SQLQuery);
	$SQLStmt->bindValue(':id', $idQuestion, PDO::PARAM_INT);
	$SQLStmt->execute();

	$answersByQuestions = array();
	while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
	$answer = new Answer($SQLRow['libelle'], $SQLRow['bonne_reponse']);

	$answer->setId($SQLRow['id']);

	$answersByQuestions[] = $answer;		
}

$SQLStmt->closeCursor();

return $answersByQuestions;
}