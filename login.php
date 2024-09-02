<?php
    require_once "./start.php";
if (Session::is_logged_in()) {
    header("location:./");
} else {
    require_once FRONTEND_INCLUDES . 'header.php';
    echo '<link rel="stylesheet" href="' . FRONTEND_ASSET . 'css/login.css">';
    require_once BACKEND_CONTROLLERS . 'login.php';
    require_once FRONTEND_PAGE . 'login.php';
    require_once FRONTEND_INCLUDES . 'footer.php';
}
