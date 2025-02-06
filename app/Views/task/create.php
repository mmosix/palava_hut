<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Create Task</h1>
    <form action="<?= site_url('task/store') ?>" method="post">
        <div class="form-group">
            <label for="project_id">Project:</label>
            <input type="text" name="project_id" id="project_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigned To:</label>
            <input type="text" name="assigned_to" id="assigned_to" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="completed_date">Completed Date:</label>
            <input type="date" name="completed_date" id="completed_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
<?php
$this->endSection();