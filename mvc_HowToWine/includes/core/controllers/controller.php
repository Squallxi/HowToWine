<?php
    require_once "includes/core/dao/daoNiveau.php";
    require_once "includes/core/dao/daoTheme.php";
    require_once "includes/core/dao/daoLecon.php";
    require_once "includes/core/function/main_photoToPage.php";

    $lesNiveaux = getAllNiveaux();
    $lesThemes = getAllThemes();
    $lesLecons = getAllLecons();
    
    require_once "includes/core/views/view.phtml";