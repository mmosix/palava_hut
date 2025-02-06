<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Checks</title>
</head>
<body>
    <h1>Quality Checks</h1>
    <table>
        <thead>
            <tr>
                <th>Report ID</th>
                <th>Inspection ID</th>
                <th>Status</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($qualityReports as $report): ?>
            <tr>
                <td><?= $report['id'] ?></td>
                <td><?= $report['inspection_id'] ?></td>
                <td><?= $report['status'] ?></td>
                <td><?= $report['comments'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
