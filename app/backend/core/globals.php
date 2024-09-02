<?php
class Users {
    public static function get_users() {
     
        $sql = "SELECT *,users.id AS user_id,user_roles.id AS user_roles_id FROM users LEFT JOIN user_roles ON users.user_roles_id = user_roles.id";
        $db = Database::getInstance(); 
        $db->query($sql);

        if ($db->error()) {
            die("Error executing the query: " . $db->error());
        } else {
            if ($db->count() > 0) {
                return $db->results();
            } else {
                return false; // Return false if no users found.
            }
        }
    }
    public static function get_users_id_name() {
        $users = self::get_users();
        if ($users) {
            $user_id_name = array();
            foreach ($users as $row) {
                $user_id_name[$row->user_id] = $row->name;
            }
            return $user_id_name;
        } else {
            return false; // Return an empty array if no users found.
        }
    }
}

