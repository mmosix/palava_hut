<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Admin Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <h3>Active Projects</h3>
        <p><!-- Display active projects count --></p>
    </div>
    <div class="col-md-4">
        <h3>Pending Approvals</h3>
        <p><!-- Display pending approvals count --></p>
    </div>
    <div class="col-md-4">
        <h3>Financial Transactions</h3>
        <p><!-- Display financial transactions count --></p>
    </div>
</div>
<div class="row">
    <h3>User Analytics</h3>
    <p><!-- Display user analytics --></p>
</div>
<?php
$this->endSection();