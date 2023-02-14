<?php

    switch($action){
        case 'amateur':{
            require_once "includes/core/dao/daoChapitre.php";
            require_once "includes/core/dao/daoLecon.php";

            $lesChapitres = getOenoChapters_LvlOne();
            $lesLecons = getAllLecons();

            require_once "includes/core/views/chapitres.phtml";
            break;
        }
        case 'etudiant':{
            require_once "includes/core/dao/daoChapitre.php";

            $lesChapitres = getOenoChapters_LvlTwo();

            require_once "includes/core/views/chapitres.phtml";
            break;
        }
        case 'professionnel':{
            require_once "includes/core/dao/daoChapitre.php";

            $lesChapitres = getOenoChapters_LvlThree();

            require_once "includes/core/views/chapitres.phtml";
            break;
        }
        case 'exercice':{
            require_once "includes/core/dao/daoExercices.php";

            $lesChapitres = getOenoExercices();

            require_once "includes/core/views/exercices.phtml";
            break;
        }
        default:{
            print("Vous n'avez atteint aucune leçon");
        }
    }