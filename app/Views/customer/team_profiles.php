<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Team and Service Provider Profiles</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Contact Details</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teamMembers as $member) : ?>
            <tr>
                <td><?= $member['name'] ?></td>
                <td><?= $member['role'] ?></td>
                <td><!-- Display contact details --></td>
                <td>
                    <a href="<?= site_url('customer/team/' . $member['id']) ?>" class="btn btn-info">View Profile</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$this->endSection();