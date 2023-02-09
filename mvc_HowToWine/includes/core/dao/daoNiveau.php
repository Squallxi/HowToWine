<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Niveau.php";
	//Récupération des données de la table Niveau dans la bdd
    function getAllNiveaux(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT niveau.id, niveau.nom_niveau, niveau.contenu
			FROM niveau";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeNiveaux = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unNiveau = new Niveau($SQLRow['nom_niveau'], $SQLRow['contenu']);			
			$unNiveau->setId($SQLRow['id']);
			$listeNiveaux[] = $unNiveau;		
		}

		$SQLStmt->closeCursor();

		return $listeNiveaux;
	}