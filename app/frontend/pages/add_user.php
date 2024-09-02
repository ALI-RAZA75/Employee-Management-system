<div class="inner-main animation-container page-add-user">
    <div class="lightning-container">
        <div class="lightning white"></div>
        <div class="lightning red"></div>
    </div>
    <div class="boom-container">
        <div class="shape circle big white"></div>
        <div class="shape circle white"></div>
        <div class="shape triangle big yellow"></div>
        <div class="shape disc white"></div>
        <div class="shape triangle blue"></div>
    </div>
    <div class="boom-container second">
        <div class="shape circle big white"></div>
        <div class="shape circle white"></div>
        <div class="shape disc white"></div>
        <div class="shape triangle blue"></div>
    </div>

    <div class="inner-main">

        <?php if ($successMessage): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data"
            style="max-width: 600px; background: #31324e; color: white;" class="mx-auto p-5 add-user-form">
            <div class="form-outline">
                <label class="form-label pt-3" for="form3Example1">Full name</label>
                <input type="text" id="form3Example1" name="name" class="form-control bg-transparent text-white" />
            </div>

            <div class="form-outline mb-1">
                <label class="form-label pt-3" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" name="email" class="form-control bg-transparent text-white" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label pt-3" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" name="password"
                    class="form-control bg-transparent text-white" />
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
                            <option value="<?php echo ($role->id); ?>"><?php echo ($role->role); ?>
                            </option>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label pt-3" for="form3Example1">Title</label>
                <input type="text" id="form3Example1" name="title" class="form-control bg-transparent text-white" />
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="1" id="isProfileOwner" name="is_profile_owner">
                <label class="form-check-label" for="isProfileOwner">Profile Owner</label>
            </div>

            <input data-mdb-ripple-init type="submit" style="background: white; color: black;"
                class="btn btn-primary btn-block mb-4" name="abc" value="Add User">
        </form>
    </div>
</div>