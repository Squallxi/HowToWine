<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/class/Theme.php";
	//Récupération des données de la table Niveau dans la bdd
    function getAllThemes(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT themes.id, themes.nom_theme, themes.theme_contenu, themes.theme_logo
			FROM themes";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeThemes = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unTheme = new Theme($SQLRow['nom_theme'], $SQLRow['theme_contenu'], $SQLRow['theme_logo']);			
			$unTheme->setId($SQLRow['id']);
			$listeThemes[] = $unTheme;		
		}

		$SQLStmt->closeCursor();

		return $listeThemes;
	}