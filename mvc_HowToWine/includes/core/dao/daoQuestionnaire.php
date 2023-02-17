<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Questionnaire.php";
	require_once "includes/core/class/SousTheme.php";
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
	function getAllSubTheme(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT sous_theme.id, sous_theme.nom, sous_theme.id_theme
			FROM sous_theme";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeSousTheme = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unSousTheme = new SousTheme($SQLRow['nom'], $SQLRow['id_theme']);			
			$unSousTheme->setId($SQLRow['id']);
			$listeSousTheme[] = $unSousTheme;		
		}

		$SQLStmt->closeCursor();

		return $listeSousTheme;
	}
	function getSubTheme(): array{
		$conn = getConnexion();

		$SQLQuery = "SELECT questionnaires.id, questionnaires.intitule, questionnaires.id_theme, questionnaires.img_Questionnaires,
		sous_theme.nom, sous_theme.id_theme
		FROM questionnaires
		INNER JOIN classer ON questionnaires.id = id_questionnaire
		INNER JOIN sous_theme ON sous_theme.id = id_sous_theme";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$questionnairesWithSubTheme = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$QuestionNsub = new Questionnaire($SQLRow['intitule'], $SQLRow['id_theme'], date_create($SQLRow['img_Questionnaires']),
			new SousTheme($SQLRow['nom'], $SQLRow['id_theme']));
			
			$QuestionNsub->setId($SQLRow['id']);

			$questionnairesWithSubTheme[] = $QuestionNsub;		
		}

		$SQLStmt->closeCursor();

		return $questionnairesWithSubTheme;
	}