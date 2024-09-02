<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_id = $_POST['project-id'];
    $profile_owner_id = $_POST['profile-owner-id'];
    $withdraw_amount = $_POST['withdraw-amount'];
    $amount_receiver = $_POST['amount-receiver'];
    $details = $_POST['details'];
    $withdraw_date = $_POST['withdraw-date'];

    if (empty($project_id) || empty($profile_owner_id) || empty($withdraw_amount) || empty($amount_receiver) || empty($details) || empty($withdraw_date)) {
        die("Please fill out all fields.");
    }

    $fields = [
        'project_id' => $project_id,
        'withdrawn_by' => $profile_owner_id,
        'withdraw_amount' => $withdraw_amount,
        'amount_receiver' => $amount_receiver,
        'Detail' => $details,
        'date' => $withdraw_date,
    ];

    if ($db->insert('withdrawl', $fields)) {
        echo "Withdrawal recorded successfully.";
    } else {
        echo "Error recording the withdrawal: " . $db->error();
    }
}

