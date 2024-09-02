<?php
session_start();
define('BACKEND_BASE',  'app/backend/');
define('BACKEND_CONTROLLERS', 'app/backend/controllers/');
define('FRONTEND_BASE', 'app/frontend/');
define('FRONTEND_PAGE', 'app/frontend/pages/');
define('FRONTEND_INCLUDES', 'app/frontend/includes/');
define('FRONTEND_ASSET', 'app/frontend/assets/');
require_once BACKEND_BASE . "core/db.php";
$db = Database::getInstance(); 
require_once BACKEND_BASE . "core/session.php";
require_once BACKEND_BASE . "core/globals.php";
$all_users_id_name = Users::get_users_id_name();

?>