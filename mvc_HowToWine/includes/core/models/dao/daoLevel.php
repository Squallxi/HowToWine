<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Level.php";
	//Récupération des données de la table Niveau dans la bdd
    function getAllLevels(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT niveau.id, niveau.nom_niveau, niveau.contenu
			FROM niveau";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$levels = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$level = new Level($SQLRow['nom_niveau'], $SQLRow['contenu']);			
			$level->setId($SQLRow['id']);
			$levels[] = $level;		
		}

		$SQLStmt->closeCursor();
		
		return $levels;
	}