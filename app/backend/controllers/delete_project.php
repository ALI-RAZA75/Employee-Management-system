 <!-- <?php

if (isset($_GET['id'])) {
    $projectId = intval($_GET['id']); 
 
    $db = Database::getInstance();
    $db->query('projects', 'id ='.$projectId);

    if ($db->error()) {
        die("Error deleting the project: " . $db->error());
    } else {

        header("Location: projects");
        exit();
    }
} else {
    header("Location: projects");
    exit();
} 
?> -->
