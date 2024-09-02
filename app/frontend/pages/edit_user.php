<div class="inner-main page-add-user">

    <form action="" method="post" enctype="multipart/form-data"
        style="max-width: 600px; background: #31324e; color: white;" class="mx-auto p-5 add-user-form">
        <div class="form-outline">
            <label class="form-label pt-3" for="form3Example1">Full name</label>
            <input type="text" id="form3Example1" name="name" class="form-control bg-transparent text-white"
                value="<?php echo $user ? htmlspecialchars($user->name) : ''; ?>" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label pt-3" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" name="email" class="form-control bg-transparent text-white"
                value="<?php echo $user ? htmlspecialchars($user->email) : ''; ?>" />

        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password (leave blank to keep current password)</label>
            <input type="password" id="form2Example2" name="password" class="form-control bg-transparent text-white" />

        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Profile Image</label>
            <input class="form-control bg-transparent text-white" type="file" id="formFile" name="fileToUpload">
        </div>

        <div class="mb-3">
            <label for="userTypeSelect" class="form-label">User Type</label>
            <select class="form-select" id="userTypeSelect" name="user_roles_id">
                <?php if (!empty($user_roles)): ?>
                    <?php foreach ($user_roles as $role): ?>
                        <option value="<?php echo $role->id; ?>" <?php echo ($user && $user->user_roles_id == $role->id) ? 'selected' : ''; ?>>
                            <?php echo $role->role; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
                <label class="form-label pt-3" for="form3Example1">Title</label>
                <input type="text" value="<?php echo $user ? htmlspecialchars($user->title) : ''; ?>" id="form3Example1" name="title" class="form-control bg-transparent text-white" />
            </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="isProfileOwner">Profile Owner</label>
            <input class="form-check-input" type="checkbox" value="1" id="isProfileOwner" name="is_profile_owner" <?php echo ($user && $user->is_profile_owner) ? 'checked' : ''; ?>>

        </div>

        <input type="hidden" name="id" value="<?php echo $user ? $user->id : ''; ?>">
        <input data-mdb-ripple-init type="submit" style="background: transparent; color: white;"
            class="btn btn-primary btn-block mb-4" name="abc" value="Update User">
    </form>
</div>