<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Project Overview</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Assigned Manager</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?= $project['name'] ?></td>
                <td><?= $project['description'] ?></td>
                <td><?= $project['status'] ?></td>
                <td><?= $project['assigned_manager'] ?></td>
                <td>
                    <a href="<?= site_url('admin/projects/edit/' . $project['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/projects/delete/' . $project['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();