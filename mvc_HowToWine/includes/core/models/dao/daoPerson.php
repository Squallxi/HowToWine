<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/class/Person.php";

    function newAccount(Personne $newPersonne): bool {
		// INSERT DANS LA BDD 
		$conn = getConnexion();

		$SQLQuery = "INSERT INTO personne(pseudo, email, photo_profil, mot_de_passe)
		VALUES (:pseudo, :email, :photo_profil, :mot_de_passe)";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':pseudo', $newPersonne->getPseudo(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':email', $newPersonne->getEmail(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':photo_profil', $newPersonne->getPhotoProfil(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':mot_de_passe', $newPersonne->getPassword(), PDO::PARAM_STR);

		if (!$SQLStmt->execute()){
			return false;
		}else{
			return true;
		}
	}
	function getInformationsForPerson(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT personne.id, personne.pseudo, personne.email, personne.photo_profil
			FROM personne";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$quizzies = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$quiz = new Quiz($SQLRow['pseudo'], $SQLRow['email'],$SQLRow['photo_profil']);			
			$quiz->setId($SQLRow['id']);
			$quizzies[] = $quiz;		
		}

		$SQLStmt->closeCursor();

		return $quizzies;
	}
	function userExists(string $login): bool{
		$conn = getConnexion();

		$SQLQuery = "
			SELECT COUNT(id) as existe
			FROM personne
			WHERE pseudo = :login
		";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$loginTrouve = $SQLRow['existe'];
		
		$SQLStmt->closeCursor();

		return ($loginTrouve > 0);
	}

	function checkAuth(string $login, string $mdp): bool{
		$conn = getConnexion();
		
		$SQLQuery = "
			SELECT mot_de_passe
			FROM personne
			WHERE pseudo = :login	
		";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$motDePasseStocke = $SQLRow['mot_de_passe'];

		$SQLStmt->closeCursor();
		// Pour hash le mot de passe plus tard
		// return (password_verify($mdp, $motDePasseStocke));
		return ($mdp == $motDePasseStocke);

	}

	function getUserIdByLogin(string $login): int{
		$conn = getConnexion();
		
		$SQLQuery = "
			SELECT id
			FROM personne
			WHERE pseudo = :login	
		";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$id = $SQLRow['id'];

		$SQLStmt->closeCursor();
		// Pour hash le mot de passe plus tard
		// return (password_verify($mdp, $motDePasseStocke));
		return ($id);

	}