<?php

require_once "./start.php";
if (Session::is_logged_in()) {
    require_once FRONTEND_INCLUDES . 'header.php';
    require_once FRONTEND_INCLUDES . 'nav-sidebar.php';
    echo "<section class='main-container'>";
    if (isset($_SERVER['REDIRECT_URL'])) {
        $request = $_SERVER['REQUEST_URI'];
        $request = rtrim($request, "/");
        // Check if the user is a limited access user
        // Admin and other user types can access the full dashboard


        if ($request == '/fom/dashboard') {
            require BACKEND_CONTROLLERS . 'home.php';
            require FRONTEND_PAGE . 'home.php';
        } else if ($request == '/fom/dashboard/users' && Session::has_permission('view-users')) {
            require FRONTEND_PAGE . 'users.php';
        } else if ($request == '/fom/dashboard/users/add' && Session::has_permission('add-users')) {
            require BACKEND_CONTROLLERS . 'add_user.php';
            require FRONTEND_PAGE . 'add_user.php';
        } else if ($request == '/fom/dashboard/projects' && Session::has_permission('view-projects')) {
            require FRONTEND_PAGE . 'projects.php';
        } else if ($request == '/fom/dashboard/projects/add' && Session::has_permission('add-projects')) {
            require BACKEND_CONTROLLERS . 'add_project.php';
            require FRONTEND_PAGE . 'add_project.php';
        } else if (str_contains($request, '/fom/dashboard/edit_user?id=')) {
            require BACKEND_CONTROLLERS . 'edit_user.php';
            require FRONTEND_PAGE . 'edit_user.php';
        } else if (str_contains($request, '/fom/dashboard/edit_project?id=')) {
            require BACKEND_CONTROLLERS . 'edit_project.php';
            require FRONTEND_PAGE . 'edit_project.php';
        } else if (str_contains($request, '/fom/dashboard/user_roles') && Session::has_permission('view-roles')) {
            require BACKEND_CONTROLLERS . 'user_roles.php';
            require FRONTEND_PAGE . 'user_roles.php';
        } else if (str_contains($request, '/fom/dashboard/withdrawal')) {
            require BACKEND_CONTROLLERS . 'withdrawal.php';
            require FRONTEND_PAGE . 'withdrawal.php';
        } else if (str_contains($request, '/fom/dashboard/transactions')) {
            require BACKEND_CONTROLLERS . 'transactions.php';
            require FRONTEND_PAGE . 'transactions.php';
        } else {
            require FRONTEND_PAGE . '404.php';
        }
    } else {
        header("location:./dashboard");
    }

    echo "</section>";

    require_once FRONTEND_INCLUDES . 'footer.php';
} else {
    header("location:login.php");
}
