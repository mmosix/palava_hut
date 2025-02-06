<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Edit User</h1>
    <form action="<?= site_url('user/update/' . $user['id']) ?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <input type="text" name="role" id="role" class="form-control" value="<?= $user['role'] ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="<?= $user['status'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
<?php
$this->endSection();