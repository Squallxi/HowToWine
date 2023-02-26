<?php

    switch($action){
        case 'amateur':{
            require_once "includes/core/models/dao/daoChapter.php";
            require_once "includes/core/models/dao/daoLesson.php";
            require_once "includes/core/function/main_photoToPage.php";

            $chapters = getOenoChapters_LvlOne();
            $lessons = getAllLessons();

            require_once "includes/core/views/view_lessons.phtml";
            break;
        }
        case 'etudiant':{
            require_once "includes/core/models/dao/daoChapter.php";
            require_once "includes/core/function/main_photoToPage.php";

            $chapters = getOenoChapters_LvlTwo();

            require_once "includes/core/views/view_lessons.phtml";
            break;
        }
        case 'professionnel':{
            require_once "includes/core/models/dao/daoChapter.php";
            require_once "includes/core/function/main_photoToPage.php";

            $chapters = getOenoChapters_LvlThree();

            require_once "includes/core/views/view_lessons.phtml";
            break;
        }
        default:{
            print("Vous n'avez atteint aucune leçon");
        }
    }