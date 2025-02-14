<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="statsChart" class="hidden"></canvas>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-100">
    
    <!-- Sidebar Toggle Button -->
    
    
    <!-- Sidebar -->
    <div class="flex">
        <aside id="sidebar" class="w-64 bg-white shadow-md h-screen p-5">
            <h2 class="text-xl font-bold mb-4">EasyMatch Admin</h2>
            <nav>
                <ul class="space-y-2">
                    <li><a href="" class="block p-2 hover:bg-orange-200 rounded">📊 Tableau de Bord</a></li>
                    <li><a href="<?= URLROOT.DS.'UserController' ?>"" class="block p-2 hover:bg-gray-200 rounded">👥 Gérer Utilisateurs</a></li>
                    <li><a href="<?= URLROOT.DS.'AnnonceController'.DS.'getAllannocesAdmin' ?>"" class="block p-2 hover:bg-blue-200 rounded">🚚 Annonces</a></li>
                    <li><a href="#" class="block p-2 hover:bg-green-200 rounded">📈 Statistiques</a></li>
                </ul>
            </nav>
        </aside>
       

    

