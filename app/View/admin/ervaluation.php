<?php require_once VIEWS_PATH . '/include/aside.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Évaluations Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen dark-mode">
        <h1 class="text-3xl font-bold mb-8 text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 animate__animated animate__fadeIn">
            Évaluations Utilisateur
        </h1>

        <!-- Evaluations Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-lg animate__animated animate__fadeIn">
            <table class="min-w-full">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                    <tr>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Évaluation</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Commentaire</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase">Date</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    <?php foreach($evaluations as $evaluation): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-6"><?= htmlspecialchars($evaluation['rating']) ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($evaluation['commentaire']) ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($evaluation['date_soumission']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>