<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Summary</title>
</head>
<body>
    <h1>Financial Summary</h1>
    <p>Total Budget Allocated: <?= $financials['total_budget'] ?></p>
    <p>Amount Spent to Date: <?= $financials['amount_spent'] ?></p>
    <p>Remaining Balance: <?= $financials['remaining_balance'] ?></p>
    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($financials['invoices'] as $invoice): ?>
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
