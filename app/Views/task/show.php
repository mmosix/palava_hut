<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Task Details</h1>
    <p><strong>Project:</strong> <?= $task['project_id'] ?></p>
    <p><strong>Assigned To:</strong> <?= $task['assigned_to'] ?></p>
    <p><strong>Description:</strong> <?= $task['description'] ?></p>
    <p><strong>Status:</strong> <?= $task['status'] ?></p>
    <p><strong>Due Date:</strong> <?= $task['due_date'] ?></p>
    <p><strong>Completed Date:</strong> <?= $task['completed_date'] ?></p>
    <a href="<?= site_url('task/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
    <form action="<?= site_url('task/delete/' . $task['id']) ?>" method="post" style="display:inline;">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
<?php
$this->endSection();