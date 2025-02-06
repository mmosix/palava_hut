<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Project Manager Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <h3>Assigned Projects</h3>
        <p><!-- Display count of assigned projects --></p>
    </div>
    <div class="col-md-4">
        <h3>Pending Tasks</h3>
        <p><!-- Display count of pending tasks --></p>
    </div>
    <div class="col-md-4">
        <h3>Budget Overview</h3>
        <p><!-- Display budget overview --></p>
    </div>
</div>
<?php
$this->endSection();