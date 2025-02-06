<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['status'] ?></td>
                    <td>
                        <a href="<?= site_url('user/show/' . $user['id']) ?>" class="btn btn-info">View</a>
                        <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
                        <form action="<?= site_url('user/delete/' . $user['id']) ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
$this->endSection();