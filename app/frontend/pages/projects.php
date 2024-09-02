<div class="inner-main page-projects">
    <?php
    $sql = "SELECT *,projects.id AS project_id, project_type.id AS project_type_id FROM projects JOIN project_type ON projects.project_type = project_type.id";
    $db->query($sql);
    if ($db->error()) {
        die("Error executing the query: " . $db->error());
    } else {
        $results = $db->results();
        if ($db->count() > 0) {
            ?>
            <div class="table-wrapper">
                <div class="table-title">
                    <h3 class="text-white">Projects</h3>
                </div>
                <table class="table table-fom">
                    <thead>
                        <tr>
                            <th>Project Title</th>
                            <th>Project Type</th>
                            <th>Profile Owner</th>
                            <th>Project Manager</th>
                            <th>Deadline</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($results as $row) {
                            ?>
                            <tr>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span class="project"><?php echo $row->title; ?></span>
                                            <span class="client">Client:<?php echo $row->client; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                        
                                            <span class="project"><?php
                                                echo isset($project_type[$row->project_type_id]) ? $project_type[$row->project_type_id] : "PI not found..";
                                                ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span class="project"> <?php
                                                echo isset($all_users_id_name[$row->profile_owner]) ? $all_users_id_name[$row->profile_owner] : "PM not found..";
                                                ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">

                                            <span class="project">
                                                <?php
                                                echo isset($all_users_id_name[$row->project_manager]) ? $all_users_id_name[$row->project_manager] : "PM not found..";
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span class="project"><?php echo $row->deadline; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span class="project"><?php echo $row->details; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span class="project"><?php echo $row->price; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-col">
                                        <div class="name-project">
                                            <span
                                                class="project"><?php echo $row->is_completed ? "Completed" : "In Progress" ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-col">
                                        <a href="edit_project?id=<?php echo $row->project_id; ?>"><i
                                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                                        <a href="edit_project?id=<?php echo $row->project_id; ?>&delete_project=true"><i
                                                class="fa-regular fa-trash-can text-danger"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <?php
        }
    }
    ?>
</div>