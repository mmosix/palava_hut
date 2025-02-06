<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>User Details</h1>
    <p><strong>Username:</strong> <?= $user['username'] ?></p>
    <p><strong>Email:</strong> <?= $user['email'] ?></p>
    <p><strong>Role:</strong> <?= $user['role'] ?></p>
    <p><strong>Status:</strong> <?= $user['status'] ?></p>
    <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
    <form action="<?= site_url('user/delete/' . $user['id']) ?>" method="post" style="display:inline;">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
<?php
$this->endSection();