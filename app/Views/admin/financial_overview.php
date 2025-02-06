<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Financial Overview</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Invoice ID</th>
            <th>Project</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <td><?= $invoice['id'] ?></td>
                <td><?= $invoice['project_id'] ?></td>
                <td><?= $invoice['amount'] ?></td>
                <td><?= $invoice['status'] ?></td>
                <td>
                    <a href="<?= site_url('admin/financials/edit/' . $invoice['id']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/financials/delete/' . $invoice['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();