<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
</head>
<body>
    <h1>Task Management</h1>
    <table>
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Assigned To</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['title'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['assigned_to'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
