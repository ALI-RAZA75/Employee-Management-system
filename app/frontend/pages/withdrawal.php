<div class="inner-main page-withdrawal">
    <form action="" method="post" enctype="multipart/form-data"
        style="max-width: 600px; background: #31324e; color: white;" class="mx-auto p-5 add-withdrawal">
        <div class="form-outline">
            <label class="form-label pt-3" for="project-id">Projects</label>
            <select id="project-id" name="project-id" class="form-control bg-transparent text-white">
                <?php
                $projects = $db->query("SELECT id, title FROM projects")->results();
                foreach ($projects as $project) {
                    echo "<option value='{$project->id}'>{$project->title}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline">
            <label class="form-label pt-3" for="profile-owner-id">Full name</label>
            <select id="profile-owner-id" name="profile-owner-id" class="form-control bg-transparent text-white">
                <?php
                foreach ($all_users_id_name as $key => $value):
                    echo '<option value="' . $key . '">' . $value . '</option>';
                endforeach; ?>
            </select>
        </div>
        <div class="form-outline">
            <label class="form-label pt-3" for="withdraw-amount">Withdraw Amount</label>
            <input type="text" id="withdraw-amount" name="withdraw-amount"
                class="form-control bg-transparent text-white" />
        </div>
        <div class="form-outline">
            <label class="form-label pt-3" for="amount-receiver">Amount Receiver</label>
            <select id="amount-receiver" name="amount-receiver" class="form-control bg-transparent text-white">
                <?php
                foreach ($all_users_id_name as $key => $value):
                    echo '<option value="' . $key . '">' . $value . '</option>';
                endforeach; ?>
            </select>
        </div>
        <div class="form-outline">
            <label class="form-label pt-3" for="details">Details</label>
            <input type="text" id="details" name="details" class="form-control bg-transparent text-white" />
        </div>
        <div class="form-outline mt-4 col-4 ">
            <label class="form-label" for="withdraw-date">Withdraw Date</label>
            <input type="date" id="withdraw-date" name="withdraw-date"
                class="form-control p-2 bg-transparent text-white" />
        </div>
        <input data-mdb-ripple-init type="submit" style="background: transparent; color: white;"
            class="btn btn-primary btn-block mt-4" name="abc" value="Withdraw">
    </form>
</div>