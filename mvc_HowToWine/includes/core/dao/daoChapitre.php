<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Chapitre.php";
	//Récupération des données de la table Chapitre dans la bdd
    function getAllChapitres(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT chapitre.id, chapitre.nom_chapitre, chapitre.contenu, chapitre.id_lecon, chapitre.id_niveau,
	 chapitre.id_theme
			FROM chapitre";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeChapitres = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unChapitre = new Chapitre($SQLRow['nom_chapitre'], $SQLRow['contenu'], $SQLRow['id_lecon'],
			$SQLRow['id_niveau'], $SQLRow['id_theme']);			
			$unChapitre->setId($SQLRow['id']);
			$listeChapitres[] = $unChapitre;		
		}

		$SQLStmt->closeCursor();

		return $listeChapitres;
	}

	function getOenoChapters_LvlOne(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT id, nom_chapitre, contenu, id_lecon, id_niveau, id_theme
	FROM chapitre
	WHERE id_niveau = 1
	AND id_theme = 1";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeChapitres = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unChapitre = new Chapitre($SQLRow['nom_chapitre'], $SQLRow['contenu'], $SQLRow['id_lecon'],
			$SQLRow['id_niveau'], $SQLRow['id_theme']);			
			$unChapitre->setId($SQLRow['id']);
			$listeChapitres[] = $unChapitre;		
		}

		$SQLStmt->closeCursor();

		return $listeChapitres;
	}

