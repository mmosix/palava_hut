<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Contractor Management</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Contractor ID</th>
            <th>Name</th>
            <th>Contact Info</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contractors as $contractor) : ?>
            <tr>
                <td><?= $contractor['id'] ?></td>
                <td><?= $contractor['name'] ?></td>
                <td><?= $contractor['contact_info'] ?></td>
                <td><?= $contractor['status'] ?></td>
                <td>
                    <a href="<?= site_url('project-manager/contractors/edit/' . $contractor['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('project-manager/contractors/delete/' . $contractor['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();