<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Annonces</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="p-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Annonces</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Titre</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Prix</th>
                <th class="py-2 px-4 border-b">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annonces as $annonce): ?>
            <tr>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($annonce['titre']) ?></td>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($annonce['description']) ?></td>
                <td class="py-2 px-4 border-b"><?= htmlspecialchars($annonce['prix']) ?> DH</td>
                <td class="py-2 px-4 border-b"><?= $annonce['date_creation'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
