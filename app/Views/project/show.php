<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Project Details</h1>
    <p><strong>Name:</strong> <?= $project['name'] ?></p>
    <p><strong>Description:</strong> <?= $project['description'] ?></p>
    <p><strong>Client:</strong> <?= $project['client_id'] ?></p>
    <p><strong>Contractor:</strong> <?= $project['contractor_id'] ?></p>
    <p><strong>Status:</strong> <?= $project['status'] ?></p>
    <p><strong>Start Date:</strong> <?= $project['start_date'] ?></p>
    <p><strong>Estimated Completion Date:</strong> <?= $project['estimated_completion_date'] ?></p>
    <p><strong>Actual Completion Date:</strong> <?= $project['actual_completion_date'] ?></p>
    <p><strong>Budget:</strong> <?= $project['budget'] ?></p>
    <p><strong>Completion Percentage:</strong> <?= $project['completion_percentage'] ?>%</p>
    <a href="<?= site_url('project/edit/' . $project['id']) ?>" class="btn btn-warning">Edit</a>
    <form action="<?= site_url('project/delete/' . $ project['id']) ?>" method="post" style="display:inline;">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
<?php
$this->endSection();
