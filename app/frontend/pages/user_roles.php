<div class="inner-main page-add-user">
    <div class="row">
        <div class="col-6">
            <div class="table-wrapper">
                <div class="table-title">
                    <h3 class="text-white mb-3">Users</h3>
                </div>
                <table class="table table-fom">
                    <thead>
                        <tr>
                            <th>User Roles</th>
                            <th>Access Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user_roles)): ?>
                            <?php foreach ($user_roles as $role): ?>
                                <tr>
                                    <td>
                                        <div class="biography-col">
                                            <span><?php echo htmlspecialchars($role->role); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="status-col text-white">
                                            <span><?php echo htmlspecialchars($role->access_level); ?></span>
                                        </div>
                                    </td>
                                    <?php if (Session::has_permission('edit-delete-roles')): ?>
                                        <td>
                                            <div class="action-col">
                                                <a href="?edit=<?php echo $role->id; ?>"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                <a href="?delete=<?php echo $role->id; ?>" onclick="return confirm('Are you sure you want to delete this role?');"><i class="fa-regular fa-trash-can text-danger"></i></a>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No roles found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if (Session::has_permission('add-roles')): ?>
            <div class="col-6">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h3 class="text-white"><?php echo isset($edit_role) ? 'Edit Role' : 'Add Role'; ?></h3>
                    </div>
                    <table class="table table-fom">
                        <form action="" method="post" enctype="multipart/form-data" style="color: white;" class="mx-auto rounded p-5 add-user-form">
                            <div class="form-outline">
                                <label class="form-label pt-3 fw-bold" style="color: white; font-size: 19px;" for="form3Example1">User Roles</label>
                                <input type="text" id="form3Example1" name="name" class="form-control bg-transparent text-white" value="<?php echo isset($edit_role) ? htmlspecialchars($edit_role->role) : ''; ?>" />
                            </div>
                            <div class="mb-3 d-flex flex-column justify-content-center">
                                <label for="userTypeSelect" style="color: white; font-size: 19px;" class="fw-bold form-label mt-3 mb-3 d-flex">Access Level</label>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="all" class="text-white f-3">All Access</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="all" id="all" <?php echo (isset($edit_role) && in_array('all', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="view-users" class="text-white f-3">View Users</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="view-users" id="view-users" <?php echo (isset($edit_role) && in_array('view-users', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="add-users">Add Users</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="add-users" id="add-users" <?php echo (isset($edit_role) && in_array('add-users', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="view-projects">View Projects</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="view-projects" id="view-projects" <?php echo (isset($edit_role) && in_array('view-projects', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="add-projects">Add Project</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="add-projects" id="add-projects" <?php echo (isset($edit_role) && in_array('add-projects', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="view-invoices">View Invoices</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="view-invoices" id="view-invoices" <?php echo (isset($edit_role) && in_array('view-invoices', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="add-invoices">Add Invoices</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="add-invoices" id="add-invoices" <?php echo (isset($edit_role) && in_array('add-invoices', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <div class="d-flex justify-content-between user-role-data text-white f-3">
                                    <label for="edit-delete-roles">Edit Delete Roles</label>
                                    <input type="checkbox" style="width: 18px!important;" name="access_level[]" value="edit-delete-roles" id="edit-delete-roles" <?php echo (isset($edit_role) && in_array('edit-delete-roles', explode(',', $edit_role->access_level))) ? 'checked' : ''; ?>>
                                </div>
                                <?php if (isset($edit_role)): ?>
                                    <input type="hidden" name="role_id" value="<?php echo $edit_role->id; ?>">
                                <?php endif; ?>
                                <input type="submit" class="btn btn-primary btn-block mb-4 fw-bold rounded-0" name="add-role" value="<?php echo isset($edit_role) ? 'Update Role' : 'Add Role'; ?>">
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
