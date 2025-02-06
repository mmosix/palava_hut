<?php
$this->extend('layouts/default');

$this->section('content');
?>
<h1>Finance and Loan Information</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Loan Amount</th>
            <th>Repayment Schedule</th>
            <th>Financing Partner</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><!-- Display loan amount --></td>
            <td><!-- Display repayment schedule --></td>
            <td><!-- Display financing partner details --></td>
        </tr>
    </tbody>
</table>
<?php
$this->endSection();