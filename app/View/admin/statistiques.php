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
                    <li><a href="<?= '/EasyMatch_Transports/public/UserController' ?>"" class="block p-2 hover:bg-gray-200 rounded">👥 Gérer Utilisateurs</a></li>
                    <li><a href="<?= '/EasyMatch_Transports/public/AnnonceController/getAllannocesAdmin' ?>"" class="block p-2 hover:bg-blue-200 rounded">🚚 Annonces</a></li>
                    <li><a href="#" class="block p-2 hover:bg-green-200 rounded">📈 Statistiques</a></li>
                </ul>
            </nav>
        </aside>

    <main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tableau de Bord</h1>
            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 shadow-lg hover:shadow-xl">
                Rafraîchir
            </button>
        </div>

        <!-- Graphique et Statistiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Graphique des Transactions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Statistiques des Transactions</h2>
                <canvas id="transactionChart"></canvas>
            </div>

            <!-- Statistiques supplémentaires -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Statistiques Globales</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Annonces Actives</span>
                        <span class="font-bold text-blue-500">45</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Transactions Moyennes</span>
                        <span class="font-bold text-green-500">$120</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Utilisateurs Actifs</span>
                        <span class="font-bold text-purple-500">85</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('transactionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Réussies', 'En attente'],
                datasets: [{
                    label: 'Transactions',
                    data: [98, 15],
                    backgroundColor: ['#10B981', '#F59E0B'],
                    borderRadius: 8, // Rounded bars
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Transactions Réussies vs En Attente'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#E5E7EB',
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>