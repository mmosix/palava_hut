<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Overview</title>
</head>
<body>
    <h1>Financial Overview</h1>
    <p>Total Revenue: <?= $totalRevenue ?></p>
    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= $invoice['id'] ?></td>
                <td><?= $invoice['amount'] ?></td>
                <td><?= $invoice['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
