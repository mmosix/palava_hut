<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Manage Users</h1>
<a href="<?= site_url('admin/users/create') ?>" class="btn btn-primary">Add User</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['status'] ?></td>
                <td>
                    <a href="<?= site_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/users/delete/' . $user['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();