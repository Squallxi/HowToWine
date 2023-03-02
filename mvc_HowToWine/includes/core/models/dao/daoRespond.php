<?php
require_once "includes/core/models/class/Respond.php";
function updateRespond(Respond $newRespond): bool {
		// METTRE A JOUR LES REPONSES DES UTILISATEURS
		$conn = getConnexion();

		$SQLQuery = "INSERT INTO repondre(id_personne, id_reponses)
		VALUES (:idpersonne, :idreponses)";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':idpersonne', $newRespond->getIdPerson(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':idreponses', $newRespond->getIdAnswer(), PDO::PARAM_INT);

		if (!$SQLStmt->execute()){
			return false;
		}else{
			return true;
		}
	}