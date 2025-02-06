<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Inspection</title>
</head>
<body>
    <h1>Schedule Inspection</h1>
    <table>
        <thead>
            <tr>
                <th>Inspection ID</th>
                <th>Project ID</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inspections as $inspection): ?>
            <tr>
                <td><?= $inspection['id'] ?></td>
                <td><?= $inspection['project_id'] ?></td>
                <td><?= $inspection['date'] ?></td>
                <td><?= $inspection['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
