<?php
    // crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie
    session_start();
    $page = $_GET['page'] ?? 'index';
    $action = $_GET['action'] ?? 'view';
   
    // Switch permettant l'utilisation d'un controller en fonction des cas du page= dans l'url
    switch ($page){
        case 'index':{
            require_once "includes/core/controllers/controller.php";
            break;
        }
        case 'oenologie':{
            require_once "includes/core/controllers/controller_oenologie.php";
            break;
        }
        case 'listExo':{
            require_once "includes/core/controllers/controller_quizzies.php";
            break;
        }
        case 'question':{
            require_once "includes/core/controllers/controller_quiz.php";
            break;
        }
        case 'frm_user':{
            require_once "includes/core/controllers/controller_frmUser.php";
            break;
        }
        case 'progress':{
            require_once "includes/core/controllers/controller_workInProgress.php";
            break;
        }
        default:{
            require_once "includes/core/controller_error.php";
        }
    }

