<?php require_once VIEWS_PATH.DS.'include'.DS.'aside.php'; ?>

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
