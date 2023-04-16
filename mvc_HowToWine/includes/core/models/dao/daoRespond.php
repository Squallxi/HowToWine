<?php

require_once "includes/core/models/class/Respond.php";
function addNewRespond(Respond $newRespond): bool {
		$conn = getConnexion();

		$SQLQuery = "INSERT INTO repondre(id_personne, id_reponses, id_questionnaire, id_soustheme)
		VALUES (:idpersonne, :idreponses, :idquestionnaire, :idsoustheme)";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idpersonne', $newRespond->getIdPerson(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':idreponses', $newRespond->getIdAnswer(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':idquestionnaire', $newRespond->getIdSubTheme(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':idsoustheme', $newRespond->getIdQuiz(), PDO::PARAM_INT);

		if (!$SQLStmt->execute()){
			return false;
		}else{
			return true;
		}
	}

	function DeleteOldRespond(Respond $newRespond): bool {
		$conn = getConnexion();

		$SQLQuery = "DELETE FROM repondre
		WHERE id_questionnaire = :idquestionnaire 
		AND id_soustheme = :idsoustheme";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idquestionnaire', $newRespond->getIdQuiz(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':idsoustheme', $newRespond->getIdSubTheme(), PDO::PARAM_INT);

		if (!$SQLStmt->execute()){
			return false;
		}else{
			return true;
		}
	}

	function respondExists(Respond $newRespond): bool {
		$conn = getConnexion();

		$SQLQuery = "SELECT COUNT(id_questionnaire) as quizExiste, COUNT(id_soustheme) as subThemeExiste
		FROM repondre
		WHERE id_questionnaire = :id_questionnaire
		AND id_soustheme = :id_soustheme
		";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id_questionnaire',$newRespond->getIdQuiz() , PDO::PARAM_INT);
		$SQLStmt->bindValue(':id_soustheme', $newRespond->getIdSubTheme(), PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$loginTrouve = 0;
		
		$SQLStmt->closeCursor();
		if($SQLRow['quizExiste'] > 0 && $SQLRow['subThemeExiste'] > 0){
			$loginTrouve = 1;
		}
		return $loginTrouve;
	
	}