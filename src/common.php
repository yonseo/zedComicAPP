<?php

// IMPORTANT DO NOT CHANGE THE ORDER!
require_once __DIR__.'/config.php';

// USER FUNCTIONS
require_once  __DIR__ . '/Model/User.php';
require_once  __DIR__ . '/View/viewuser.inc.php';
require_once  __DIR__ . '/Controller/cont_userRole.php';

// BLOG FUNCTIONS
require_once __DIR__ . '/Model/BlogRead.php';
require_once __DIR__ . '/View/view_Blog.php';

// COMMENTS FUNCTIONS
require_once  __DIR__ . '/Model/Comments.php';
require_once  __DIR__ . '/View/view_Comments.php';

//Donut and key Check
require_once  __DIR__ . '/Model/donut_check.php';

//COMIC FUNCTIONS
require_once  __DIR__ . '/Model/ComicBook.php';
require_once  __DIR__ . '/View/view_Comic.php';
require_once  __DIR__ . '/Model/model_Tanko.php';

//Buy Functions
require_once  __DIR__ . '/View/view_Purchase.php';
?>
