<?php
class Session
{
    public static function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    public static function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = '')
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }

    public static function is_logged_in()
    {
        return self::exists("logged_in_email");
    }

    public static function set_logged_in($email, $role, $found_access_level)
    {
        self::put("logged_in_email", $email);
        self::put("logged_in_role", $role);
        self::put("access_level", $found_access_level);
    }

    public static function set_logged_out()
    {
        self::delete("logged_in_role");
        self::delete("logged_in_email");
        self::delete("access_level");
    }

    public static function get_user_role()
    {
        return self::get("logged_in_role");
    }
    public static function has_permission($required_level)
    {
        $access_level = self::get("access_level");
        if (strpos($access_level, $required_level) !== false || strpos($access_level, 'all') !== false) {
            return true;
        }
        return false;
    }
    
    
}
