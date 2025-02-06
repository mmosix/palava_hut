<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Updates</title>
</head>
<body>
    <h1>Real-Time Updates</h1>
    <table>
        <thead>
            <tr>
                <th>Update ID</th>
                <th>Project ID</th>
                <th>Update Text</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($updates as $update): ?>
            <tr>
                <td><?= $update['id'] ?></td>
                <td><?= $update['project_id'] ?></td>
                <td><?= $update['update_text'] ?></td>
                <td><?= $update['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
