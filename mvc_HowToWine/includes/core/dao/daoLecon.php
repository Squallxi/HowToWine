<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Lecon.php";
	//Récupération des données de la table Chapitre dans la bdd
    function getAllLecons(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT lecon.id, lecon.titre
			FROM lecon";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeLecons = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unelecon = new Lecon($SQLRow['titre']);		
			$unelecon->setId($SQLRow['id']);
			$listeLecons[] = $unelecon;		
		}

		$SQLStmt->closeCursor();

		return $listeLecons;
	}