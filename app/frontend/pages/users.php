<div class="inner-main page-users">
    <?php
    if (Users::get_users()) {
    ?>
        <div class="table-wrapper">
            <div class="table-title">
                <h3 class="text-white">Users</h3>
            </div>
            <table class="table table-fom">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Access Level</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    foreach (Users::get_users() as $row) {
                    ?>
                        <tr>
                            <td>
                                <div class="biography-col">
                                    <img src="/fom/app/frontend/assets/images/users/<?php echo $row->img; ?>"
                                        alt="<?php echo $row->name; ?>">
                                    <div class="name-email">
                                        <span class="name"><?php echo $row->name; ?></span>
                                        <span class="email"><?php echo $row->email; ?></span>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <div class="access-level-col">
                                <span class="role"><?php if($row->role != NULL) echo $row->role; else echo "<span class='error-value-not-found'>Not Set</span>" ?></span>
                        
                                    <span
                                        class="status"><?php echo $row->status ? "<i class=' text-success fa-solid fa-person-circle-check'></i> Approved" : "<i class='text-danger fa-solid fa-person-circle-xmark'></i> Pending"; ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="authority-col">
                                    <span class="position"><?php if($row->title != NULL) echo $row->title; else echo "<span class='error-value-not-found'>Not Set</span>" ?></span>
                                    <span
                                        class="is_profile_owner"><?php echo $row->is_profile_owner ? "<i class='text-success fa-solid fa-circle-check'></i> Profile Owner" : "<i class='text-danger fa-solid fa-circle-xmark'></i> No Profile"; ?></span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="action-col">
                                    <a href="edit_user?id=<?php echo $row->user_id; ?>"><i
                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                    <a href="edit_user?id=<?php echo $row->user_id; ?>&delete_user=true"
                                        onclick="return confirm('Are you sure you want to delete this user?');"><i
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
    ?>

</div>