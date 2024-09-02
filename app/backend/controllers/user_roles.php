<?php
// if (isset($_POST['name'])) {
//     $role = $_POST['name'];
//     $access_levels = isset($_POST['access_level']) ? $_POST['access_level'] : [];
//     $access_levels_string = implode(',', $access_levels);
//     $data = [
//         'role' => $role,
//         'access_level' => $access_levels_string
//     ];
//     if (isset($_POST['role_id']) && !empty($_POST['role_id'])) {
//         $role_id = $_POST['role_id'];
//         if ($db->update('user_roles', $role_id, $data)) {
//             echo "Role updated successfully.";
//             $edit_role = null;
//         } else {
//             echo "Error: Unable to update the role.";
//         }

//     } else {
//         if ($db->insert('user_roles', $data)) {
//             echo "New role added successfully.";
//         } else {
//             echo "Error: Unable to add the new role.";
//         }
//     }
// }

// $user_roles = $db->query("SELECT * FROM user_roles")->results();
// $edit_role = null;
// if (isset($_GET['edit'])) {
//     $edit_role_id = $_GET['edit'];
//     $edit_role = $db->get('user_roles', ['id', '=', $edit_role_id])->first();
// }
$edit_role = null;

if (isset($_GET['delete'])) {
    $role_id = $_GET['delete'];
    if ($db->delete('user_roles', ['id', '=', $role_id])) {
        echo "Role deleted successfully.";
    } else {
        echo "Error: Unable to delete the role.";
    }
    header("Location: ./user_roles");
    exit();
}

if (isset($_GET['edit'])) {
    $role_id = $_GET['edit'];
    $edit_role = $db->query("SELECT * FROM user_roles WHERE id = ?", [$role_id])->first();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_name = $_POST['name'];
    $access_levels = isset($_POST['access_level']) ? $_POST['access_level'] : [];
    $access_levels_string = implode(',', $access_levels);
    $role_id = $_POST['role_id'] ?? null;

    if (isset($_POST['add-role']) && $_POST['add-role'] === 'Add Role') {
        $data = [
            'role' => $role_name,
            'access_level' => $access_levels_string
        ];
        if ($db->insert('user_roles', $data)) {
            echo "New role added successfully.";
        } else {
            echo "Error: Unable to add the new role.";
        }
    } elseif (isset($_POST['add-role']) && $_POST['add-role'] === 'Update Role' && $role_id) {
        $data = [
            'role' => $role_name,
            'access_level' => $access_levels_string
        ];
        if ($db->update('user_roles', $role_id, $data)) {
            echo "Role updated successfully.";
        } else {
            echo "Error: Unable to update the role.";
        }
        $edit_role = null;
    }
}

$user_roles = $db->query("SELECT * FROM user_roles")->results();