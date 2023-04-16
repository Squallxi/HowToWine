<?php
require_once "includes/core/models/dao/daoLesson.php";
require_once "includes/core/function/main_photoToPage.php";

$lessons = getAllLessons();

require_once("includes/core/views/view_workInProgress.phtml");