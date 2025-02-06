<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Project Phases and Timeline</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Phase Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($phases as $phase) : ?>
            <tr>
                <td><?= $phase['name'] ?></td>
                <td><?= $phase['description'] ?></td>
                <td><?= $phase['start_date'] ?></td>
                <td><?= $phase['end_date'] ?></td>
                <td><?= $phase['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();