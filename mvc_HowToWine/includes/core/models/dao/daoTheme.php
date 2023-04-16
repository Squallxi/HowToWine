<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Theme.php";
    function getAllThemes(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT themes.id, themes.nom_theme, themes.theme_contenu, themes.theme_logo
			FROM themes";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$themes = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$theme = new Theme($SQLRow['nom_theme'], $SQLRow['theme_contenu'], $SQLRow['theme_logo']);			
			$theme->setId($SQLRow['id']);
			$themes[] = $theme;		
		}

		$SQLStmt->closeCursor();
		return $themes;
	}