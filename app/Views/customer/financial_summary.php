<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Financial Summary</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Total Budget Allocated</th>
            <th>Amount Spent to Date</th>
            <th>Remaining Balance</th>
            <th>Payment Milestones</th>
            <th>Invoice History</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><!-- Display total budget --></td>
            <td><!-- Display amount spent --></td>
            <td><!-- Display remaining balance --></td>
            <td><!-- Display payment milestones --></td>
            <td><!-- Display invoice history --></td>
        </tr>
    </tbody>
</table>
<?php
$this->endSection();