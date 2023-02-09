<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Chapitre.php";

    function getAllChapitres(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT chapitre.id, chapitre.titre
			FROM chapitre";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeChapitre = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unChapitre = new Chapitre($SQLRow['id'], $SQLRow['nom_chapitre'], $SQLRow['contenu']);			
			$unChapitre->setId($SQLRow['id']);
			$listeChapitre[] = $unChapitre;		
		}

		$SQLStmt->closeCursor();

		return $listeChapitre;
	}

