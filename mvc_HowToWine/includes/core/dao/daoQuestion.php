<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Question.php";
	require_once "includes/core/class/Reponse.php";
	//Récupération des données de la table Chapitre dans la bdd
    function getAllQuestion(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT question.id, question.intitule, question.id_soustheme
			FROM question";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeQuestion = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$uneQuestion = new Question($SQLRow['intitule']);			
			$uneQuestion->setIdQuestion($SQLRow['id']);
			$listeQuestion[] = $uneQuestion;		
		}

		$SQLStmt->closeCursor();

		return $listeQuestion;
	}

	function getAllQuestionsForQuestionnaire(int $idSsTheme, int $idQuestionnaire){
		$conn = getConnexion();

    	$SQLQuery = "select question.id, intitule
			from question inner join classer on question.id = classer.id_question
			where classer.id_sous_theme = :idsstheme
				and classer.id_questionnaire = :idquestionnaire";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idsstheme', $idSsTheme, PDO::PARAM_INT);
		$SQLStmt->bindValue(':idquestionnaire', $idQuestionnaire, PDO::PARAM_INT);
		$SQLStmt->execute();

		$listeQuestion = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$uneQuestion = new Question($SQLRow['intitule']);			
			$uneQuestion->setIdQuestion($SQLRow['id']);
			$listeQuestion[] = $uneQuestion;		
		}

		$SQLStmt->closeCursor();

		return $listeQuestion;
	}
function getAllAnswerByQuestion(int $idQuestion): array{
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
	$reponse = new Reponse($SQLRow['libelle'], $SQLRow['bonne_reponse']);

	$reponse->setIdReponse($SQLRow['id']);

	$answersByQuestions[] = $reponse;		
}

$SQLStmt->closeCursor();

return $answersByQuestions;
}