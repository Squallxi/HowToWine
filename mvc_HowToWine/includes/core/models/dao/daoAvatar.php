<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Avatar.php";
	//Récupération des données de la table Niveau dans la bdd
    function getAllAvatar(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT avatar.id, avatar.balise_img, avatar.path
			FROM avatar";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$avatars = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$avatar = new Avatar($SQLRow['balise_img'],$SQLRow['path']);			
			$avatar->setId($SQLRow['id']);
			$avatars[] = $avatar;		
		}

		$SQLStmt->closeCursor();
		return $avatars;
	}