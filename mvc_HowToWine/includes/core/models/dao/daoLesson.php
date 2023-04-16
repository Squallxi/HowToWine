<?php 

    require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/class/Lesson.php";

    function getAllLessons(): array{
		$conn = getConnexion();

    $SQLQuery = "SELECT lecon.id, lecon.titre
			FROM lecon";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$lessonsList = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$oneLesson = new Lesson($SQLRow['titre']);		
			$oneLesson->setId($SQLRow['id']);
			$lessonsList[] = $oneLesson;		
		}

		$SQLStmt->closeCursor();

		return $lessonsList;
	}