<?php

    switch($action){
        case 'consulter':{
            $idsoustheme = $_GET['idsoustheme'] ?? 0;
            $idquestionnaire = $_GET['idquestionnaire'] ?? 0;
            require_once "includes/core/dao/daoQuestion.php";
            require_once "includes/core/dao/daoLecon.php";
            require_once "includes/core/function/main_photoToPage.php";

            if ($idsoustheme > 0 AND $idquestionnaire > 0){
                $lesQuestions = getAllQuestionsForQuestionnaire($idsoustheme, $idquestionnaire);
                
                foreach ($lesQuestions as $uneQuestion){
                    $uneQuestion->setReponse(getAllAnswerByQuestion($uneQuestion->getIdQuestion()));
                }
            }

            $lesLecons = getAllLecons();
            // $lesQuestions = getAllQuestion();
            // foreach ($lesQuestions as $uneQuestion){
            //     $uneQuestion->setReponse(getAllAnswerByQuestion($uneQuestion->getIdQuestion()));
            // }

            require_once "includes/core/views/question.phtml";
            break;
        }
        default: {           
            print("Vous n'avez atteint aucune questions");
        }
    }