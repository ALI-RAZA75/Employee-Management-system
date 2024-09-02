<?php

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $client = $_POST['client'];
    $projectType = $_POST['project_type'];
    $profileOwner = $_POST['profile_owner'];
    $projectManager = $_POST['project_manager'];
    $deadline = $_POST['deadline'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $isCompleted = isset($_POST['is_completed']) ? 1 : 0;

    if (empty($title) || empty($client) || empty($projectType) || empty($profileOwner) || empty($projectManager) || empty($deadline) || empty($details) || empty($price)) {
        $errorMessage = "All fields are required.";
    } else {
        $sql = "INSERT INTO projects (title, client, project_type, profile_owner, project_manager, deadline, details, price, is_completed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $db->query($sql, [$title, $client, $projectType, $profileOwner, $projectManager, $deadline, $details, $price, $isCompleted]);
        
        if ($db->error()) {
            $errorMessage = "Error adding project: " . $db->error();
        } else {
            $successMessage = "Project added successfully!";
        }
    }
}
