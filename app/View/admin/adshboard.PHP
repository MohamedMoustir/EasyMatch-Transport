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
<canvas id="statsChart"></canvas>
</head>
<body class="bg-gray-100">
    
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-white shadow-md h-screen p-5">
            <h2 class="text-xl font-bold mb-4">EasyMatch Admin</h2>
            <nav>
                <ul class="space-y-2">
                    <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">📊 Tableau de Bord</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Utilisateurs</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">🚚 Annonces</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">📈 Statistiques</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Tableau de Bord</h1>

            <!-- Statistiques -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold">Total Utilisateurs</h3>
                    <p class="text-2xl font-semibold">120</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold">Annonces en Attente</h3>
                    <p class="text-2xl font-semibold text-yellow-500">15</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold">Transactions Réussies</h3>
                    <p class="text-2xl font-semibold text-green-500">98</p>
                </div>
            </div>

            <!-- Tableau des Utilisateurs -->
            <div class="mt-6">
                <h2 class="text-xl font-bold">Liste des Utilisateurs</h2>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">
                        <!-- Rempli dynamiquement avec AJAX -->
                    </tbody>
                </table>
            </div>

            <!-- Graphique -->
            <div class="mt-6">
                <h2 class="text-xl font-bold">Statistiques des Transactions</h2>
                <canvas id="transactionChart"></canvas>
            </div>
        </main>
    </div>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('transactionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Réussies', 'En attente'],
                datasets: [{
                    label: 'Transactions',
                    data: [98, 15],
                    backgroundColor: ['green', 'orange']
                }]
            }
        });

       
fetch("dashboardController.php?action=getStats")
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById("statsChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Annonces", "Transactions", "Utilisateurs"],
                datasets: [{
                    label: "Nombre total",
                    data: [data.annonces, data.transactions, data.users],
                    backgroundColor: ["blue", "green", "red"]
                }]
            }
        });
    });

    fetch("../controllers/DashboardController.php?action=getStats")
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById("statsChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Annonces", "Transactions", "Utilisateurs"],
                datasets: [{
                    label: "Nombre total",
                    data: [data.annonces, data.transactions, data.users],
                    backgroundColor: ["blue", "green", "red"]
                }]
            }
        });
    })


    </script>

</body>
</html>
