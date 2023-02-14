<?php
    require_once "includes/core/class/Niveau.php";
    require_once "includes/core/class/Theme.php";
    require_once "includes/core/dao/daoNiveau.php";
    require_once "includes/core/dao/daoTheme.php";
    require_once "includes/core/dao/daoLecon.php";

    $lesNiveaux = getAllNiveaux();
    $lesThemes = getAllThemes();
    $lesLecons = getAllLecons();
    
    require_once "includes/core/views/view.phtml";