<?php

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
            require_once "includes/core/controllers/controller_exercices.php";
            break;
        }
        default:{
            require_once "includes/core:controller_error.php";
        }
    }

