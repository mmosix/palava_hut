<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Quality Checks</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Inspection ID</th>
            <th>Project</th>
            <th>Inspector</th>
            <th>Status</th>
            <th>Comments</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($qualityChecks as $check) : ?>
            <tr>
                <td><?= $check['inspection_id'] ?></td>
                <td><?= $check['project_id'] ?></td>
                <td><?= $check['inspector_id'] ?></td>
                <td><?= $check['status'] ?></td>
                <td><?= $check['comments'] ?></td>
                <td>
                    <a href="<?= site_url('inspector/quality-checks/edit/' . $check['inspection_id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('inspector/quality-checks/delete/' . $check['inspection_id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();