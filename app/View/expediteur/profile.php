<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'annonce - EasyMatch</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="px-14 py-3 flex items-center justify-between gap-5 shadow-md bg-white bg-opacity-90 shadow-lg fixed w-full z-50">
        <a href="/EasyMatch_Transports/public/HomeController/index" class="flex items-center gap-1">
            <img class="w-20" src="logoo.png" alt="Logo de EasyMatch">
        </a>
        <div class="flex items-center justify-between gap-10">
            <ul class="flex items-center gap-5 text-md">
                <li class="text-xl duration-500 hover:text-blue-600"><a href="#"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
                <li class="text-xl duration-500 hover:text-blue-600"><a href="#"><i class="fa-solid fa-bell"></i></a></li>
            </ul>
            <a href="#"><img class="w-10" src="user.png" alt="User Profile"></a>
        </div>
    </nav>

    <main class="p-24 flex items-center justify-center">
        <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg overflow-hidden p-6 animate-fade-in">
            <!-- Section Profil -->
            <div class="flex items-center space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-blue-500" src="https://via.placeholder.com/80" alt="Photo Profil">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        John Doe 
                        <span class="ml-2 bg-blue-500 text-white px-2 py-1 rounded-full text-sm">Vérifié</span>
                    </h2>
                    <p class="text-gray-500">Développeur Web</p>
                    <p class="text-gray-500 text-sm">john.doe@email.com</p>
                    <p class="text-gray-500 text-sm">+33 6 12 34 56 78</p>
                </div>
            </div>

            <!-- Reviews -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Avis</h3>
                <div class="mt-3 space-y-4">
                    <div class="bg-gray-50 p-3 rounded-lg shadow">
                        <div class="flex items-center space-x-2">
                            <div class="text-yellow-400">5 Etoiles</div>
                            <span class="text-sm text-gray-600">par Alice</span>
                        </div>
                        <p class="text-gray-700 mt-1">Super expérience, très professionnel !</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-lg shadow">
                        <div class="flex items-center space-x-2">
                            <div class="text-yellow-400">4 Etoiles</div>
                            <span class="text-sm text-gray-600">par Marc</span>
                        </div>
                        <p class="text-gray-700 mt-1">Bon travail mais peut s'améliorer.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
    </style>
</body>
</html>