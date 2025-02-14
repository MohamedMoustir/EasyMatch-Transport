<?php
require_once '../../Controllers/UserController.php';
// $controller = new UserController();
// $users = $controller->userModel->getAllUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<h2>Liste des Utilisateurs</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['nom']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['status']; ?></td>
            <td>
                <a href="../../Controllers/UserController.php?action=verify&id=<?= $user['id']; ?>">✔️ Vérifier</a>
                <a href="../../Controllers/UserController.php?action=suspend&id=<?= $user['id']; ?>">🚫 Suspendre</a>
                <a href="../../Controllers/UserController.php?action=delete&id=<?= $user['id']; ?>" onclick="return confirm('Êtes-vous sûr ?')">❌ Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
