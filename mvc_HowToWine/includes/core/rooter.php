<?php
    session_start();
    $page = $_GET['page'] ?? 'index';
    $action = $_GET['action'] ?? 'view';
   
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
        default:{
            require_once "includes/core/controller_error.php";
        }
    }

