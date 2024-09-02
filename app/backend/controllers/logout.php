<?php
if (Session::is_logged_in()) {
    Session::set_logged_out();
} 
header("Location: login.php");