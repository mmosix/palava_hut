<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Task Management</h1>
<a href="<?= site_url('project-manager/tasks/create') ?>" class="btn btn-primary">Add Task</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Task ID</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['project_id'] ?></td>
                <td><?= $task['assigned_to'] ?></td>
                <td><?= $task['description'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['due_date'] ?></td>
                <td>
                    <a href="<?= site_url('project-manager/tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('project-manager/tasks/delete/' . $task['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();