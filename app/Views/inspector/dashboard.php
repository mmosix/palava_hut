<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Inspector Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <h3>Total Inspections</h3>
        <p><!-- Display total inspections count --></p>
    </div>
    <div class="col-md-4">
        <h3>Pending Approvals</h3>
        <p><!-- Display pending approvals count --></p>
    </div>
    <div class="col-md-4">
        <h3>Compliance Issues</h3>
        <p><!-- Display compliance issues count --></p>
    </div>
</div>
<?php
$this->endSection();