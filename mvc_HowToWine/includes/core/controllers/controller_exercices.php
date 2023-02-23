<?php
ini_set('display_errors', 'on');
    require_once "includes/core/function/main_photoToPage.php";
    require_once "includes/core/dao/daoLecon.php";
    require_once "includes/core/dao/daoQuestionnaire.php";

    $lesLecons = getAllLecons();
    $lesQuestionnaires = getAllQuestionnaire();
    foreach ($lesQuestionnaires as $unQuestionnaire){
        $unQuestionnaire->setSousThemes(getAllSubThemeByQuestionnaire($unQuestionnaire->getId()));
    }

    //$listeSousTheme = getAllSubTheme();
    // $questionnairesWithSubTheme = getSubTheme();

    require_once "includes/core/views/listExercices.phtml";