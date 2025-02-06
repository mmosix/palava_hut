<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractor Management</title>
</head>
<body>
    <h1>Contractor Management</h1>
    <table>
        <thead>
            <tr>
                <th>Contractor ID</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contractors as $contractor): ?>
            <tr>
                <td><?= $contractor['id'] ?></td>
                <td><?= $contractor['name'] ?></td>
                <td><?= $contractor['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
