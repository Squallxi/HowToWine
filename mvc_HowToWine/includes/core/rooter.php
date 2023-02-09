<?php

    $page = $_GET['page'] ?? 'index';
    $action = $_GET['action'] ?? 'view';

    switch ($page){
        case 'index':{
            require_once "includes/core/controllers/controller.php";
            break;
        }
        default:{
            require_once "includes/core:controller_error.php";
        }
    }

