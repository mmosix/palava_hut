<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Customer Project Overview</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project ID</th>
            <th>Address</th>
            <th>Status</th>
            <th>Completion Percentage</th>
            <th>Estimated Completion Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?= $project['name'] ?></td>
                <td><?= $project['id'] ?></td>
                <td><!-- Display project address --></td>
                <td><?= $project['status'] ?></td>
                <td><?= $project['completion_percentage'] ?>%</td>
                <td><?= $project['estimated_completion_date'] ?></td>
                <td>
                    <a href="<?= site_url('customer/project/' . $project['id']) ?>" class="btn btn-info">View Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();