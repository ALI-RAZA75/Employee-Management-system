<div class="inner-main page-add-project">
    <?php if ($successMessage): ?>
        <p class="text-success"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <p class="text-danger"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <div class="col-8 mx-auto">
        <form action="" method="post" enctype="multipart/form-data" class="col-12 p-5 mb-4 add-project-form">
            <div class="d-flex justify-content-between">
                <div class="form-outline mb-4 col-9 me-2">
                    <label class="form-label fs-5" for="title">Project Title</label>
                    <input type="text" id="title" name="title" class="form-control p-2 bg-transparent text-white"
                        value="<?php echo htmlspecialchars($title ?? ''); ?>" />
                </div>
                <div class="form-outline mb-4 col-3">
                    <label class="form-label fs-5" for="project_type">Project Type</label>
                    <select id="project_type" name="project_type" class="form-select bg-transparent text-white">

                        <option value="1" <?php echo isset($projectType) && $projectType == '1' ? 'selected' : ''; ?>>
                            Timer</option>
                        <option value="2" <?php echo isset($projectType) && $projectType == '2' ? 'selected' : ''; ?>>Fix
                        </option>
                        <option value="4" <?php echo isset($projectType) && $projectType == '4' ? 'selected' : ''; ?>>Per
                            Day</option>
                            <!-- <?php if (!empty($project_type)): ?>
                        <?php foreach ($project_type as $type): ?>
                            <option value="<?php echo $type['id']; ?>" <?php echo isset($projectType) && $projectType == $type['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($type['type']); ?>
                            </option>
                        <?php endforeach; ?>
                        <?php endif; ?> -->
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-outline mb-4 col-6 me-2">
                    <label class="form-label fs-5" for="profile_owner">Profile Owner</label>
                    <select name="profile_owner" id="profile_owner" class="form-control p-2 bg-transparent ">
                        <?php
                        foreach ($all_users_id_name as $key => $value):
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        endforeach; ?>
                    </select>
                </div>
                <div class="form-outline mb-4 col-6">
                    <label class="form-label fs-5" for="project_manager">Project Manager</label>
                    <select name="project_manager" id="project_manager" class="form-control p-2 bg-transparent ">

                        <?php
                        foreach ($all_users_id_name as $key => $value):
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-outline mb-4 col-4 me-2">
                    <label class="form-label fs-5" for="client">Client</label>
                    <input type="text" id="client" name="client" class="form-control p-2 bg-transparent text-white"
                        value="<?php echo htmlspecialchars($client ?? ''); ?>" />
                </div>
                <div class="form-outline mb-4 col-4 me-2">
                    <label class="form-label fs-5" for="price">Price</label>
                    <input type="number" id="price" name="price" class="form-control p-2 bg-transparent text-white"
                        value="<?php echo htmlspecialchars($price ?? ''); ?>" />
                </div>
                <div class="form-outline mb-4 col-4 ">
                    <label class="form-label fs-5" for="deadline">Deadline</label>
                    <input type="date" id="deadline" name="deadline" class="form-control p-2 bg-transparent text-white"
                        value="<?php echo htmlspecialchars($deadline ?? ''); ?>" />
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fs-5" for="details">Details</label>
                <input type="text" id="details" name="details" class="form-control p-2 bg-transparent text-white"
                    value="<?php echo htmlspecialchars($details ?? ''); ?>" />
            </div>
            <div class="d-flex justify-content-between mt-4 align-items-center">
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="is_completed">Is Completed</label>
                    <input class="form-check-input" type="checkbox" value="1" id="is_completed" name="is_completed"
                        <?php echo isset($isCompleted) && $isCompleted ? 'checked' : ''; ?>>
                </div>
                <button type="submit" class="btn btn-primary px-5 py-2 btn-block mb-4 bg-transparent text-white"
                    name="submit">Add Project</button>
            </div>
        </form>
    </div>
</div>