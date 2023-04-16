<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/class/Person.php";

    function newAccount(Person $newPersonne): bool {

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

	function getAllInformationsForProfil(int $idpersonne): Person{
		$conn = getConnexion();

   		$SQLQuery = "SELECT personne.id, personne.pseudo, personne.email, personne.photo_profil, personne.mot_de_passe, personne.id_titre, t.id, t.nom, t.prerequis 
		   FROM personne
		   inner join titre t on t.id = personne.id
		   WHERE personne.id = :idpersonne";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idpersonne', $idpersonne, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$information = new Person($SQLRow['pseudo'],$SQLRow['email'],$SQLRow['photo_profil'],$SQLRow['mot_de_passe'], new Titre($SQLRow['nom'], $SQLRow['prerequis']));		
		$information->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();

		return $information;
	}

	function getAllAnswersForProfil(int $idpersonne, int $idquestionnaire, int $idsoustheme): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT questionnaires.id as identite_questionnaire, questionnaires.intitule as intitule_questionnaire, 
	sous_theme.nom as nomSousTheme, sous_theme.id as idSousTheme, 
	question.id as identite_question, question.intitule as intitule_question, 
	rep.id as reponseId, rep.bonne_reponse, 
	(select COUNT(*) from repondre where repondre.id_reponses = rep.id and repondre.id_personne = :idpersonne) as nbReponsePersonne
	from questionnaires
	inner join classer on id_questionnaire = questionnaires.id
	inner join sous_theme on classer.id_sous_theme = sous_theme.id 
	inner join question on classer.id_question = question.id
	inner join reponses rep on question.id = rep.id_question
	inner join repondre on rep.id = repondre.id_reponses
	where repondre.id_personne = :idpersonne
	AND classer.id_questionnaire = :idquestionnaire
	AND classer.id_sous_theme = :idsoustheme
	order by questionnaires.id, sous_theme.id, question.id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idquestionnaire', $idquestionnaire, PDO::PARAM_INT);
		$SQLStmt->bindValue(':idsoustheme', $idsoustheme, PDO::PARAM_INT);
		$SQLStmt->bindValue(':idpersonne', $idpersonne, PDO::PARAM_INT);
		$SQLStmt->execute();

		$data = array();
		$note = 0;
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			if((($SQLRow['bonne_reponse'] == $SQLRow['nbReponsePersonne']) ? 1 : 0)){
				$note++;
			}
			$data['QuestionnaireContenu'] = array(
					'NomQuestionnaire' => $SQLRow['intitule_questionnaire'],
				    'NomSousTheme' => $SQLRow['nomSousTheme'],
					'points' => $note.'/14'
				);
		}

		$SQLStmt->closeCursor();

		return $data;
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
		return (password_verify($mdp,$motDePasseStocke));
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
		return ($id);

	}