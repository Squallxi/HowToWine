<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Questionnaire.php";
	//Récupération des données de la table Chapitre dans la bdd
    function getAllQuestionnaire(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT questionnaires.id, questionnaires.intitule, questionnaires.id_theme, questionnaires.img_Questionnaires
			FROM questionnaires";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeQuestionnaire = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unQuestionnaire = new Questionnaire($SQLRow['intitule'], $SQLRow['id_theme'],$SQLRow['img_Questionnaires']);			
			$unQuestionnaire->setId($SQLRow['id']);
			$listeQuestionnaire[] = $unQuestionnaire;		
		}

		$SQLStmt->closeCursor();

		return $listeQuestionnaire;
	}