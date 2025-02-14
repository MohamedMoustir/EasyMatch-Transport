<?php require_once VIEWS_PATH . '/include/aside.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .dark-mode {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        .dark-mode .bg-white {
            background-color: #2d3748;
        }
        .dark-mode .text-gray-700 {
            color: #e2e8f0;
        }
        .dark-mode .hover\:bg-gray-50:hover {
            background-color: #4a5568;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen dark-mode">
        <h1 class="text-3xl font-bold mb-8 text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 animate__animated animate__fadeIn">
            Gérer Utilisateurs
        </h1>

        <!-- Add User Button and Search Bar -->
        <div class="flex justify-between items-center mb-6 animate__animated animate__fadeIn">
            <!-- Add User Button -->
            <a href="/EasyMatch_Transports/public/UserController/addUser" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 shadow-lg hover:shadow-xl">
                Ajouter Utilisateur
            </a>
            <!-- Search Bar -->
            <input type="text" placeholder="Rechercher..." class="px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Loading Spinner -->
        <div id="loadingSpinner" class="flex justify-center items-center h-64 animate__animated animate__fadeIn">
            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
        </div>

        <!-- User Table -->
        <div id="userTableContainer" class="overflow-x-auto bg-white rounded-xl shadow-lg animate__animated animate__fadeIn hidden">
            <table class="min-w-full">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                    <tr>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Nom</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Email</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Rôle</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Évaluations</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    <?php foreach($users as $user): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-6"><?= htmlspecialchars($user['nom']) ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($user['role']) ?></td>
                            <td class="py-4 px-6">
                                <a href="/EasyMatch_Transports/public/UserController/viewEvaluations/<?= $user['id_user'] ?>" class="text-indigo-500 hover:text-indigo-700">Voir Évaluations</a>
                            </td>
                            <td class="py-4 px-6">
                                <a href="/EasyMatch_Transports/public/UserController/validateUser/<?= $user['id_user'] ?>" class="text-green-500 hover:text-green-700 mr-4">Valider</a>
                                <a href="/EasyMatch_Transports/public/UserController/suspendUser/<?= $user['id_user'] ?>" class="text-yellow-500 hover:text-yellow-700 mr-4">Suspendre</a>
                                <a href="/EasyMatch_Transports/public/UserController/verifyUser/<?= $user['id_user'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Vérifier</a>
                                <a href="javascript:void(0);" onclick="openDeleteModal(<?= $user['id_user'] ?>)" class="text-red-500 hover:text-red-700">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-6 animate__animated animate__fadeIn">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-l-md">Précédent</a>
                <a href="#" class="px-4 py-2 bg-white border-t border-b border-gray-300 text-gray-700 hover:bg-gray-50">1</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-r-md">Suivant</a>
            </nav>
        </div>
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-bold mb-4">Confirmer la suppression</h3>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
            <div class="flex justify-end space-x-4">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Annuler</button>
                <button id="confirmDeleteButton" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Supprimer</button>
            </div>
        </div>
    </div>

    <!-- Dark Mode Toggle -->
    <button id="themeToggle" class="fixed bottom-4 right-4 p-3 bg-gray-800 text-white rounded-full shadow-lg hover:bg-gray-700">
        <svg id="themeIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    </button>

    <script>
        // Delete Modal Functions
        function openDeleteModal(userId) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').onclick = () => {
                window.location.href = `/EasyMatch_Transports/public/UserController/deleteUser/${userId}`;
            };
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>';
            } else {
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>';
            }
        });

        // Simulate Loading
        setTimeout(() => {
            document.getElementById('loadingSpinner').style.display = 'none';
            document.getElementById('userTableContainer').classList.remove('hidden');
        }, 2000); // Simulate 2 seconds loading time
    </script>
</body>
</html>