<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Project Updates</h1>
<a href="<?= site_url('project-manager/updates/create') ?>" class="btn btn-primary">Add Update</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Update ID</th>
            <th>Project</th>
            <th>Update Text</th>
            <th>Update Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($updates as $update) : ?>
            <tr>
                <td><?= $update['id'] ?></td>
                <td><?= $update['project_id'] ?></td>
                <td><?= $update['update_text'] ?></td>
                <td><?= $update['update_date'] ?></td>
                <td>
                    <a href="<?= site_url('project-manager/updates/edit/' . $update['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('project-manager/updates/delete/' . $update['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();