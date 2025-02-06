<?php
$this->extend('layouts/default');

$this->section('content');
?>
    <h1>Reports</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Report Type</th>
                <th>Data</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report) : ?>
                <tr>
                    <td><?= $report['report_type'] ?></td>
                    <td><?= $report['data'] ?></td>
                    <td><?= $report['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('report/generateProjectReport') ?>" class="btn btn-primary">Generate Project Report</a>
    <a href="<?= site_url('report/generateTaskReport') ?>" class="btn btn-primary">Generate Task Report</a>
    <a href="<?= site_url('report/generateUser ActivityReport') ?>" class="btn btn-primary">Generate User Activity Report</a>
    <a href="<?= site_url('report/generateFinancialReport') ?>" class="btn btn-primary">Generate Financial Report</a>
<?php
$this->endSection();