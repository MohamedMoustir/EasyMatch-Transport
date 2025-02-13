<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Annonce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="p-8">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Annonce</h1>

    <form action="../controllers/AnnonceController.php" method="POST" class="bg-white shadow-md rounded p-6">
        <input type="hidden" name="ajouterAnnonce" value="1">
        
        <label class="block mb-2">Titre :</label>
        <input type="text" name="titre" required class="border p-2 w-full mb-4">

        <label class="block mb-2">Description :</label>
        <textarea name="description" required class="border p-2 w-full mb-4"></textarea>

        <label class="block mb-2">Prix (DH) :</label>
        <input type="number" name="prix" required class="border p-2 w-full mb-4">

        <input type="hidden" name="conducteur_id" value="1">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</body>
</html>
