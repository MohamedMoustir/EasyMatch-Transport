<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-4">Créer un compte</h1>
        
        <form method="POST" action="../../Controllers/UserController.php/add" class="space-y-4">
                <input type="hidden" name="action" value="add">

            <input type="text" name="nom" placeholder="Nom" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <input type="text" name="prenom" placeholder="Prénom" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <input type="tel" name="phone" placeholder="Téléphone" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <input type="email" name="email" placeholder="Email" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <input type="password" name="password" placeholder="Mot de passe" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <select name="role" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                <option value="Expediteur">Expéditeur</option>
                <option value="Conducteur">Conducteur</option>
            </select>
            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-colors">
                S'inscrire
            </button>
        </form>
    </div>
</body>
</html>
