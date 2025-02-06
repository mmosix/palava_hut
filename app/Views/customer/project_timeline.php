<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Timeline</title>
</head>
<body>
    <h1>Project Timeline</h1>
    <table>
        <thead>
            <tr>
                <th>Phase</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeline as $phase): ?>
            <tr>
                <td><?= $phase['name'] ?></td>
                <td><?= $phase['start_date'] ?></td>
                <td><?= $phase['end_date'] ?></td>
                <td><?= $phase['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
