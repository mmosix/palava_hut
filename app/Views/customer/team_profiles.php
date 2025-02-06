<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Profiles</title>
</head>
<body>
    <h1>Team Profiles</h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profiles as $profile): ?>
            <tr>
                <td><?= $profile['user_id'] ?></td>
                <td><?= $profile['name'] ?></td>
                <td><?= $profile['role'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
