<?php require_once VIEWS_PATH.DS.'include'.DS.'aside.php'; ?>
<div class="p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">Gérer Utilisateurs</h1>

    <div class="flex justify-end mb-4">
        <a href="add_user.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ajouter Utilisateur</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-green-500 to-blue-500 text-white">
                <tr>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Nom</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Email</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Rôle</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php foreach($users as $user): ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-5"><?= htmlspecialchars($user['prenom'].' '.$user['nom']) ?></td>
                        <td class="py-3 px-5"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="py-3 px-5"><?= htmlspecialchars($user['role']) ?></td>
                        <td class="py-3 px-5">
                            <a href="edit_user.php?id=<?= $user['id_user'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                            <a href="/EasyMatch_Transports/public/UserController/deleteUser/<?= $user['id_user'] ?>" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" 
                               class="text-red-500 hover:text-red-700">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>