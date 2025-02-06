<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Tasks</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Project</th>
                <th>Assigned To</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Completed Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?= $task['project_id'] ?></td>
                    <td><?= $task['assigned_to'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td><?= $task['status'] ?></td>
                    <td><?= $task['due_date'] ?></td>
                    <td><?= $task['completed_date'] ?></td>
                    <td>
                        <a href="<?= site_url('task/show/' . $task['id']) ?>" class="btn btn-info">View</a>
                        <a href="<?= site_url('task/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
                        <form action="<?= site_url('task/delete/' . $task['id']) ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
$this->endSection();