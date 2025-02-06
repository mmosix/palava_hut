<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Projects</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Client</th>
                <th>Contractor</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>Estimated Completion Date</th>
                <th>Actual Completion Date</th>
                <th>Budget</th>
                <th>Completion Percentage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project) : ?>
                <tr>
                    <td><?= $project['name'] ?></td>
                    <td><?= $project['description'] ?></td>
                    <td><?= $project['client_id'] ?></td>
                    <td><?= $project['contractor_id'] ?></td>
                    <td><?= $project['status'] ?></td>
                    <td><?= $project['start_date'] ?></td>
                    <td><?= $project['estimated_completion_date'] ?></td>
                    <td><?= $project['actual_completion_date'] ?></td>
                    <td><?= $project['budget'] ?></td>
                    <td><?= $project['completion_percentage'] ?></td>
                    <td>
                        <a href="<?= site_url('project/show/' . $project['id']) ?>" class="btn btn-info">View</a>
                        <a href="<?= site_url('project/edit/' . $project['id']) ?>" class="btn btn-warning">Edit</a>
                        <form action="<?= site_url('project/delete/' . $project['id']) ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
$this->endSection();