<?php
$successMessage = '';
$errorMessage = '';

$db = Database::getInstance();
$user_roles = $db->query("SELECT * FROM user_roles")->results();
if (Session::has_permission('all')) {

    if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['user_roles_id'], $_POST['title'])) {

        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $user_roles_id = intval($_POST["user_roles_id"]);
        $title = trim($_POST["title"]);
        $is_profile_owner = isset($_POST["is_profile_owner"]) ? 1 : 0;
        $status = 1; 
        $img = null;

        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
            $img_tmp_name = $_FILES['fileToUpload']['tmp_name'];
            $img_name = $_FILES['fileToUpload']['name'];
            $img_size = $_FILES['fileToUpload']['size'];
            $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];          

            if (in_array($img_ext, $allowed_exts) && $img_size <= 2 * 1024 * 1024) {
                $img_new_name = uniqid('', true) . '.' . $img_ext;
                $img_dest_path = FRONTEND_ASSET . 'images/users/' . $img_new_name;

                if (!is_dir(FRONTEND_ASSET . 'images/users/')) {
                    mkdir(FRONTEND_ASSET . 'images/users/', 0775, true);
                }

                if (move_uploaded_file($img_tmp_name, $img_dest_path)) {
                    $img = $img_new_name;
                } else {
                    $errorMessage = 'Error uploading the image file.';
                }
            } else {
                $errorMessage = 'Invalid image file.';
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Invalid email address.';
        }

        if (strlen($password) < 6) {
            $errorMessage = 'Password must be at least 6 characters long.';
        }

        if (empty($errorMessage)) {

            $user_roles_sql = "SELECT id FROM user_roles WHERE id = ?";
            $db->query($user_roles_sql, array($user_roles_id));
            if ($db->count() > 0) {
                $password_hashed = md5($password);

                $register_sql = "INSERT INTO users (email, pass, name, img, is_profile_owner, user_roles_id, title, status) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $params = array($email, $password_hashed, $name, $img, $is_profile_owner, $user_roles_id, $title, $status);
                $db->query($register_sql, $params);

                if (!$db->error()) {
                    $successMessage = 'User registered successfully!';
                } else {
                    $errorMessage = 'Error registering the user: ' . $db->error();
                }
            } else {
                $errorMessage = 'Invalid user type selected.';
            }
        }
    } else {
        $errorMessage = 'All fields are required.';
    }
} else {
    $errorMessage = 'You are not authorized to register new users.';
}
