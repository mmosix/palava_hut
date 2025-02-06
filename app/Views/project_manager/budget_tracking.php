<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Budget Tracking</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Project ID</th>
            <th>Allocated Budget</th>
            <th>Amount Spent</th>
            <th>Remaining Balance</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($budgets as $budget) : ?>
            <tr>
                <td><?= $budget['project_id'] ?></td>
                <td><?= $budget['allocated_budget'] ?></td>
                <td><?= $budget['amount_spent'] ?></td>
                <td><?= $budget['remaining_balance'] ?></td>
                <td><?= $budget['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();