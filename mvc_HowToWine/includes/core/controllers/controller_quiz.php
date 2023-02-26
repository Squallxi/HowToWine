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
        default: {           
            print("Vous n'avez atteint aucune questions");
        }
    }