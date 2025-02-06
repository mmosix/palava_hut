<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Support Tickets</h1>
<a href="<?= site_url('admin/support/create') ?>" class="btn btn-primary">Create Ticket</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ticket ID</th>
            <th>User</th>
            <th>Issue</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $ticket) : ?>
            <tr>
                <td><?= $ticket['id'] ?></td>
                <td><?= $ticket['user_id'] ?></td>
                <td><?= $ticket['issue'] ?></td>
                <td><?= $ticket['status'] ?></td>
                <td>
                    <a href="<?= site_url('admin/support/edit/' . $ticket['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/support/delete/' . $ticket['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();