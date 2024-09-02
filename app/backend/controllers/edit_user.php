<?php


$user_roles = $db->query("SELECT * FROM user_roles")->results();
$user = null;
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $user = $db->get('users', ['id', '=', $userId])->first();
}

if (isset($_GET['delete_user']) && $_GET['delete_user'] == 'true' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $user = $db->get('users', ['id', '=', $id])->first();
    if ($user) {
        if ($user->img) {
            $img_path = FRONTEND_ASSET . 'images/users/' . $user->img;
            if (file_exists($img_path)) {
                unlink($img_path);
            }
        }

        if ($db->delete('users', ['id', '=', $id])) {
            header('Location: ./users');
            exit();
        } else {
            die('Error deleting the user.');
        }
    } else {
        die('User not found.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $user_roles_id = intval($_POST["user_roles_id"]);
    $title = trim($_POST['title']);
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
                $errorMessage .= 'Error uploading the image file. ';
            }
        } else {
            $errorMessage .= 'Invalid image file. ';
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage .= 'Invalid email address. ';
    }

    if (!empty($password) && strlen($password) < 6) {
        $errorMessage .= 'Password must be at least 6 characters long. ';
    }

    if (empty($errorMessage)) {
        $user_roles_sql = "SELECT id FROM user_roles WHERE id = ?";
        $db->query($user_roles_sql, [$user_roles_id]);
        if ($db->count() > 0) {
            $password_hashed = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : $user->pass;

            $fields = [
                'email' => $email,
                'name' => $name,
                'img' => !empty($img) ? $img : $user->img,
                'is_profile_owner' => $is_profile_owner,
                'user_roles_id' => $user_roles_id,
                'title' => $title,
                'status' => $status
            ];

            if (!empty($password)) {
                $fields['pass'] = $password_hashed;
            }

            if ($db->update('users', $id, $fields)) {
                $successMessage = 'User updated successfully!';
                header("Location: ./users");
                
            } else {
                $errorMessage .= 'Error updating the user.';
            }
        } else {
            $errorMessage .= 'Invalid user type selected. ';
        }
    }
}