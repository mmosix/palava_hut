<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Edit Project</h1>
    <form action="<?= site_url('project/update/' . $project['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $project['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required><?= $project['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="client_id">Client:</label>
            <input type="text" name="client_id" id="client_id" class="form-control" value="<?= $project['client_id'] ?>" required>
        </div>
        <div class="form-group">
            <label for="contractor_id">Contractor:</label>
            <input type="text" name="contractor_id" id="contractor_id" class="form-control" value="<?= $project['contractor_id'] ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="<?= $project['status'] ?>" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $project['start_date'] ?>" required>
        </div>
        <div class="form-group">
            <label for="estimated_completion_date">Estimated Completion Date:</label>
            <input type="date" name="estimated_completion_date" id="estimated_completion_date" class="form-control" value="<?= $project['estimated_completion_date'] ?>" required>
        </div>
        <div class="form-group">
            <label for="actual_completion_date">Actual Completion Date:</label>
            <input type="date" name="actual_completion_date" id="actual_completion_date" class="form-control" value="<?= $project['actual_completion_date'] ?>" required>
        </div>
        <div class="form-group">
            <label for="budget">Budget:</label>
            <input type="text" name="budget" id="budget" class="form-control" value="<?= $project['budget'] ?>" required>
        </div>
        <div class="form-group">
            <label for="completion_percentage">Completion Percentage:</label>
            <input type="number" name="completion_percentage" id="completion_percentage" class="form-control" value="<?= $project['completion_percentage'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
<?php
$this->endSection();