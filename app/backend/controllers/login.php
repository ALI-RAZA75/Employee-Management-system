<?php
require_once './start.php'; 
if (isset($_REQUEST["email"]) && isset($_REQUEST["password"])) {
    $email = $_REQUEST["email"];
    $password = md5($_REQUEST["password"]);
    

    $sql = "SELECT * FROM users 
            JOIN user_roles ON users.user_roles_id = user_roles.id 
            WHERE email = ? AND pass = ?";

    $db->query($sql, array($email, $password));

    if (!$db->error()) {

        $results = $db->results();
        if ($db->count() > 0) {
            $user = $results[0];
            $found_email = $user->email;
            $found_role = $user->role;
            
            $found_access_level = $user->access_level;
            $user_roles_id = $user->user_roles_id;
            Session::set_logged_in($found_email, $found_role, $found_access_level);
            
            header("Location: ./dashboard");
        } else { 
            echo "Invalid email or password.";
        }
    } else {
        die("Error executing the query: " . $db->error());
    }
} else {
    echo "Please enter email and password.";
}
?>
