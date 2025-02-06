<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Inspection Reports</h1>
<a href="<?= site_url('inspector/reports/create') ?>" class="btn btn-primary">Upload Report</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Report ID</th>
            <th>Inspection ID</th>
            <th>Project</th>
            <th>Inspector</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report) : ?>
            <tr>
                <td><?= $report['id'] ?></td>
                <td><?= $report['inspection_id'] ?></td>
                <td><?= $report['project_id'] ?></td>
                <td><?= $report['inspector_id'] ?></td>
                <td><?= $report['date'] ?></td>
                <td>
                    <a href="<?= site_url('inspector/reports/edit/' . $report['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('inspector/reports/delete/' . $report['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();