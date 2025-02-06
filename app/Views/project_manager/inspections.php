<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Inspections</h1>
<a href="<?= site_url('project-manager/inspections/create') ?>" class="btn btn-primary">Schedule Inspection</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Inspection ID</th>
            <th>Project</th>
            <th>Inspector</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inspections as $inspection) : ?>
            <tr>
                <td><?= $inspection['id'] ?></td>
                <td><?= $inspection['project_id'] ?></td>
                <td><?= $inspection['inspector_id'] ?></td>
                <td><?= $inspection['inspection_date'] ?></td>
                <td><?= $inspection['status'] ?></td>
                <td>
                    <a href="<?= site_url('project-manager/inspections/edit/' . $inspection['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('project-manager/inspections/delete/' . $inspection['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();