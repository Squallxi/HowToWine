<?php
    switch($action){
        case 'consulter':{
            $idSubTheme = $_GET['idsoustheme'] ?? 0;
            $idQuiz = $_GET['idquestionnaire'] ?? 0;
            require_once "includes/core/models/dao/daoQuestion.php";
            require_once "includes/core/models/dao/daoLesson.php";
            require_once "includes/core/function/main_photoToPage.php";

            if ($idSubTheme > 0 AND $idQuiz > 0){
                $questions = getAllQuestionsForQuiz($idSubTheme, $idQuiz);
                foreach ($questions as $question){
                    $question->setAnswers(getAllAnswersByQuestion($question->getId()));
                }
            }
            $lessons = getAllLessons();
            require_once "includes/core/views/view_quiz.phtml";
            break;
        }
        case 'repondre':{
            require_once "includes/core/models/dao/daoRespond.php";
            require_once "includes/core/models/dao/daoPerson.php";
            require_once "includes/core/models/dao/daoLesson.php";

            $idSubTheme = $_GET['idsoustheme'] ?? 0;
            $idQuiz = $_GET['idquestionnaire'] ?? 0;
            $idPersonne = $_SESSION['iduser'];

            if (!empty($_POST)){
            //potentielle correction à apporter sur les deux 0 plus bas pour rendre le code dynamique
            $AlreadyDone = new Respond(
                0,
                0,
                $idSubTheme,
                $idQuiz
            );
            if (respondExists($AlreadyDone)){
                DeleteOldRespond($AlreadyDone);
            }
            foreach($_POST['checkbox-option'] as $option){
                $unResultat = new Respond(
                    $idPersonne, 
                    $option,
                    $idSubTheme,
                    $idQuiz
                );
            addNewRespond($unResultat);
            }
            header('Location: ?page=frm_user&action=profil');    
            }
            $lessons = getAllLessons();
            require_once "includes/core/views/view_quiz.phtml";
            break;
        }
        default: {           
            print("Vous n'avez atteint aucune questions");
        }
    }
