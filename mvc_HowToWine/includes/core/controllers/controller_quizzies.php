<?php
ini_set('display_errors', 'on');
    require_once "includes/core/function/main_photoToPage.php";
    require_once "includes/core/models/dao/daoLesson.php";
    require_once "includes/core/models/dao/daoQuiz.php";

    $lessons = getAllLessons();
    $quizzies = getAllQuizzies();
    foreach ($quizzies as $quiz){
        $quiz->setSubThemes(getAllSubThemeByQuiz($quiz->getId()));
    }
    require_once "includes/core/views/view_quizList.phtml";