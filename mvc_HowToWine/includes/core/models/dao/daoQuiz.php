<?php 
    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Quiz.php";
	require_once "includes/core/models/class/SubTheme.php";


    function getAllQuizzies(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT questionnaires.id, questionnaires.intitule, questionnaires.id_theme, questionnaires.img_Questionnaires
			FROM questionnaires";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$quizzies = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$quiz = new Quiz($SQLRow['intitule'], $SQLRow['id_theme'],$SQLRow['img_Questionnaires']);			
			$quiz->setId($SQLRow['id']);
			$quizzies[] = $quiz;		
		}

		$SQLStmt->closeCursor();

		return $quizzies;
	}
	function getAllSubTheme(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT sous_theme.id, sous_theme.nom, sous_theme.id_theme
			FROM sous_theme";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$subThemes = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$subTheme = new SubTheme($SQLRow['nom'], $SQLRow['id_theme']);			
			$subTheme->setId($SQLRow['id']);
			$subThemes[] = $subTheme;		
		}

		$SQLStmt->closeCursor();

		return $subThemes;
	}
	function getQuizziesWithSubThemes(): array{
		$conn = getConnexion();

		$SQLQuery = "SELECT questionnaires.id, questionnaires.intitule, questionnaires.id_theme, questionnaires.img_Questionnaires,
		sous_theme.nom, sous_theme.id_theme
		FROM questionnaires
		INNER JOIN classer ON questionnaires.id = id_questionnaire
		INNER JOIN sous_theme ON sous_theme.id = id_sous_theme";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$quizziesNsubThemes = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$quizNsub = new Quiz($SQLRow['intitule'], $SQLRow['id_theme'], date_create($SQLRow['img_Questionnaires']));
			
			$quizNsub->setId($SQLRow['id']);

			$quizziesNsubThemes[] = $quizNsub;		
		}

		$SQLStmt->closeCursor();

		return $quizziesNsubThemes;
	}

	function getAllSubThemeByQuiz(int $idQuiz): array{
		$conn = getConnexion();

		$SQLQuery = "SELECT  sous_theme.id, sous_theme.nom, sous_theme.id_theme
		FROM questionnaires
		INNER JOIN themes ON questionnaires.id_theme = themes.id
		INNER JOIN sous_theme ON sous_theme.id_theme = themes.id
		WHERE questionnaires.id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $idQuiz, PDO::PARAM_INT);
		$SQLStmt->execute();

		$subThemesbyQuiz = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$subTheme = new SubTheme($SQLRow['nom'], $SQLRow['id_theme']);
			
			$subTheme->setId($SQLRow['id']);

			$subThemesbyQuiz[] = $subTheme;		
		}

		$SQLStmt->closeCursor();

		return $subThemesbyQuiz;
	}