<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Chapter.php";
	
    function getAllChapter(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT chapitre.id, chapitre.nom_chapitre, chapitre.contenu, chapitre.id_lecon, chapitre.id_niveau,
	 chapitre.id_theme
			FROM chapitre";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$chapters = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$chapter = new Chapter($SQLRow['nom_chapitre'], $SQLRow['contenu'], $SQLRow['id_lecon'],
			$SQLRow['id_niveau'], $SQLRow['id_theme']);			
			$chapter->setId($SQLRow['id']);
			$chapters[] = $chapter;		
		}

		$SQLStmt->closeCursor();

		return $chapters;
	}

	function getOenoChapters_LvlOne(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT id, nom_chapitre, contenu, id_lecon, id_niveau, id_theme
	FROM chapitre
	WHERE id_niveau = 1
	AND id_theme = 1";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$oenoChaptersLvlOne = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$chapterLvlOne = new Chapter($SQLRow['nom_chapitre'], $SQLRow['contenu'], $SQLRow['id_lecon'],
			$SQLRow['id_niveau'], $SQLRow['id_theme']);			
			$chapterLvlOne->setId($SQLRow['id']);
			$oenoChaptersLvlOne[] = $chapterLvlOne;		
		}

		$SQLStmt->closeCursor();

		return $oenoChaptersLvlOne;
	}

