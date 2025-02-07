<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
</head>
<body>
    <h1>Documents</h1>
    <table>
        <thead>
            <tr>
                <th>Document ID</th>
                <th>Project ID</th>
                <th>File Path</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
            <tr>
                <td><?= $document['document_id'] ?></td>
                <td><?= $document['project_id'] ?></td>
                <td><a href="<?= $document['file_path'] ?>"><?= $document['file_path'] ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
