<?php require_once '../include/aside.php'; ?>

<!-- Main Content -->
<main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Tableau de Bord</h1>
        <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 shadow-lg hover:shadow-xl">
            Rafraîchir
        </button>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Utilisateurs -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Total Utilisateurs</h3>
                    <p class="text-4xl font-bold text-gray-800 mt-2">120</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm text-gray-500">+5% depuis le mois dernier</span>
            </div>
        </div>

        <!-- Annonces en Attente -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Annonces en Attente</h3>
                    <p class="text-4xl font-bold text-yellow-600 mt-2">15</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm text-gray-500">+2 depuis hier</span>
            </div>
        </div>

        <!-- Transactions Réussies -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-600">Transactions Réussies</h3>
                    <p class="text-4xl font-bold text-green-600 mt-2">98</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm text-gray-500">+10% depuis le mois dernier</span>
            </div>
        </div>
    </div>

    <!-- Tableau des Utilisateurs -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Liste des Utilisateurs</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="border-b">
                        <th class="py-3 px-6 text-left text-gray-600">Nom</th>
                        <th class="py-3 px-6 text-left text-gray-600">Email</th>
                        <th class="py-3 px-6 text-left text-gray-600">Statut</th>
                        <th class="py-3 px-6 text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody id="userTable" class="divide-y divide-gray-200">
                    <!-- Rempli dynamiquement avec AJAX -->
                </tbody>
            </table>
        </div>
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