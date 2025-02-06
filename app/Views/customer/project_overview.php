<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Overview</title>
</head>
<body>
    <h1>Project Overview</h1>
    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Completion Percentage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= $project['id'] ?></td>
                <td><?= $project['name'] ?></td>
                <td><?= $project['status'] ?></td>
                <td><?= $project['completion_percentage'] ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
