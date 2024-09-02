<?php
$projectId = $_GET['id'] ?? null;

if (isset($_GET['delete_project']) && $_GET['delete_project'] === 'true' && $projectId) {
    $deleteSql = "DELETE FROM projects WHERE id = ?";
    $db->query($deleteSql, [$projectId]);

    if (!$db->error()) {
        header("Location: projects"); // Redirect to the projects page after deletion
        exit;
    } else {
        $errorMessage = "Error deleting project: " . $db->error();
    }
}

if ($projectId) {
    $sql = "SELECT * FROM projects WHERE id = ?";
    $db->query($sql, [$projectId]);
    if ($db->count() > 0) {
        $project = $db->first();
    } else {
        die("Project not found.");
    }
} else {
    die("No project ID provided.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $project_type = $_POST['project_type'];
    $profile_owner = $_POST['profile_owner'];
    $project_manager = $_POST['project_manager'];
    $client = $_POST['client'];
    $price = $_POST['price'];
    $deadline = $_POST['deadline'];
    $details = $_POST['details'];
    $is_completed = isset($_POST['is_completed']) ? 1 : 0;

    $updateSql = "UPDATE projects SET title = ?, project_type = ?, profile_owner = ?, project_manager = ?, client = ?, price = ?, deadline = ?, details = ?, is_completed = ? WHERE id = ?";
    $db->query($updateSql, [$title, $project_type, $profile_owner, $project_manager, $client, $price, $deadline, $details, $is_completed, $projectId]);

    if (!$db->error()) {
        header("Location: projects");
        exit;
    } else {
        $errorMessage = "Error updating project: " . $db->error();
    }
}
