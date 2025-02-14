<?php require_once VIEWS_PATH.DS.'include'.DS.'aside.php'; ?>
<div class="p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">Liste des Annonces</h1>
    <?php if(count($data)>0){ ?>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                <tr>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Titre</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Description</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Date</th>
                    <th class="py-3 px-5 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php foreach($data as $annonce): ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-5"><?= htmlspecialchars($annonce['titre']) ?></td>
                        <td class="py-3 px-5"><?= htmlspecialchars($annonce['description']) ?></td>
                        <td class="py-3 px-5"><?= htmlspecialchars($annonce['date_publication']) ?></td>
                        <td class="py-3 px-5">
                            <a href="view details_annonce.php?id=<?= $annonce['id_annonce'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">view brdetails</a>
                            <a href="/EasyMatch_Transports/public/AnnonceController/delete/<?= $annonce['id_annonce'] ?>" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');" 
                               class="text-red-500 hover:text-red-700">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php }else{ ?>
      
        <div class="flex flex-col items-center justify-center min-h-[400px] bg-white rounded-lg shadow-md p-8">
                <div class="w-24 h-24 mb-6 bg-indigo-100 rounded-full flex items-center justify-center">
                <div class="text-6xl mb-6">
                    🚚
                </div>
                </div>
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Aucune annonce disponible</h2>
                <p class="text-gray-500 text-center">Commencez par créer votre première annonce</p>
               
            </div>
        
    <?php } ?>
</div>
</body>
</html>