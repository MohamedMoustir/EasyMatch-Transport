
<?php require_once VIEWS_PATH.DS.'include'.DS.'aside.php'; ?>
    <h1 class="text-2xl font-bold mb-4">Liste des Annonces</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Titre</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Date</th>
            </tr>
        </thead>
        <tbody>
         

            <?php foreach($data as $annonce): ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?= $annonce['titre'] ?></td>
                    <td class="py-2 px-4 border-b"><?= $annonce['description'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
