<?php
    require_once "includes/core/models/dao/daoLevel.php";
    require_once "includes/core/models/dao/daoTheme.php";
    require_once "includes/core/models/dao/daoLesson.php";
    require_once "includes/core/function/main_photoToPage.php";

    $levels = getAllLevels();
    $themes = getAllThemes();
    $lessons = getAllLessons();
    
    require_once "includes/core/views/view_homePage.phtml";