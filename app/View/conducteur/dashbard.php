<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Modern</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="bg-slate-900">

    <!-- Sidebar avec effet gradient animé -->
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sidebar Blanc</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 flex">

        <!-- Sidebar -->
        <div class="fixed w-72 h-full bg-white shadow-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    ColiVoiturage Pro
                </h2>
            </div>
            <nav class="mt-8">
                <a href="#"
                    class="px-6 py-4 flex items-center space-x-4 text-gray-800 hover:bg-gray-200 transition-all duration-300 border-l-4 border-transparent hover:border-blue-500">
                    <span class="text-lg">🗺️</span>
                    <span class="font-medium">Itinéraires</span>
                </a>
                <a href="#"
                    class="px-6 py-4 flex items-center space-x-4 text-gray-800 hover:bg-gray-200 transition-all duration-300 border-l-4 border-transparent hover:border-blue-500">
                    <span class="text-lg">📦</span>
                    <span class="font-medium">Mes Colis</span>
                </a>
                <a href="#"
                    class="px-6 py-4 flex items-center space-x-4 text-gray-800 hover:bg-gray-200 transition-all duration-300 border-l-4 border-transparent hover:border-blue-500">
                    <span class="text-lg">⭐</span>
                    <span class="font-medium">Évaluations</span>
                </a>
            </nav>
        </div>

    </body>

    </html>



    <!-- Main Content avec effet glassmorphism -->
    <div class="ml-72 p-8 min-h-screen bg-gradient-to-br from-slate-900 to-slate-800">
        <!-- Header avec effet glassmorphism -->
        <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-6 mb-8 shadow-xl border border-white/10">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                <div class="flex space-x-4">
                    <button class="p-3 bg-white/5 rounded-xl hover:bg-white/10 transition-all duration-300">
                        <span class="text-white text-xl">🔔</span>
                    </button>
                    <button class="p-3 bg-white/5 rounded-xl hover:bg-white/10 transition-all duration-300">
                        <span class="text-white text-xl">👤</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Stepper avec effet néon -->
        <section class="bg-[#1a1f2e] min-h-screen p-8">
    <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-8 mb-8 shadow-xl border border-white/10">
        <h2 class="text-2xl font-bold text-white mb-6">Nouvel Itinéraire</h2>
        
        <!-- Progress Bar -->
        <div class="flex justify-between items-center mb-8">
            <div class="step-indicator flex items-center w-full">
                <div class="step w-12 h-12 bg-purple-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/50" data-step="1">1</div>
                <div class="flex-1 h-1 mx-4 bg-gradient-to-r from-purple-600 to-blue-600"></div>
                <div class="step w-12 h-12 bg-white/10 text-white rounded-xl flex items-center justify-center" data-step="2">2</div>
                <div class="flex-1 h-1 mx-4 bg-white/10"></div>
                <div class="step w-12 h-12 bg-white/10 text-white rounded-xl flex items-center justify-center" data-step="3">3</div>
            </div>
        </div>

        <form action="/EasyMatch_Transports/public/ConducteurController/createVilleandEtap" id="addForm" method="POST">
            <!-- Step 1 -->
            <div class="step-content" data-step="1">
                <h2 class="text-2xl font-bold text-white mb-4">Informations Générales</h2>

                <div class="relative">
                    <!-- Ville de départ -->
                    <select name="city" id="ville_depart" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4">
                        <option value="" disabled selected>Choisissez une ville de départ</option>
                    </select>

                    <!-- Date de départ -->
                    <input type="datetime-local" name="date_depart" id="date_depart" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4" placeholder="Date de départ">

                    <!-- Date d'arrivée -->
                    <input type="datetime-local" name="date_arrivee" id="date_arrivee" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4" placeholder="Date d'arrivée">

                    <!-- Types de colis acceptés -->
                    <select name="type" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4">
                        <option value="" disabled selected>Choisissez un type de colis</option>
                        <option value="small">Petit</option>
                        <option value="medium">Moyen</option>
                        <option value="large">Grand</option>
                    </select>

                    <!-- Capacité du véhicule -->
                    <select name="véhicule" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4">
                        <option value="" disabled selected>Choisissez une capacité</option>
                        <option value="small">Petit</option>
                        <option value="medium">Moyen</option>
                        <option value="large">Grand</option>
                    </select>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="button" class="next-btn px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl hover:opacity-90">Suivant</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step-content hidden" data-step="2">
                <h2 class="text-2xl font-bold text-white mb-4">Villes Intermédiaires</h2>

                <div class="relative">
                    <select name="destination" id="destination" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4">
                        <option value="" disabled selected>Choisissez une ville intermédiaire</option>
                    </select>
                </div>

                <!-- Ordre des étapes -->
                <input type="number" name="ordre" id="ordre" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4" placeholder="Ordre de l'étape">
                
                <div class="mt-8 flex justify-between">
                    <button type="button" class="prev-btn px-6 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-600">Retour</button>
                    <button type="button" class="next-btn px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl hover:opacity-90">Suivant</button>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step-content hidden" data-step="3">
                <h2 class="text-2xl font-bold text-white mb-4">Destination Finale</h2>
                
                <!-- Ville d'arrivée -->
                <div class="relative">
                    <select name="ville_arrivee" id="ville_arrivee" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-600 mt-4">
                        <option value="" disabled selected>Choisissez une ville d'arrivée</option>
                    </select>
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" class="prev-btn px-6 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-600">Retour</button>
                    <button type="submit" name="Terminer" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl hover:opacity-90">Terminer</button>
                </div>
            </div>
        </form>
    </div>
</section>





<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- <script>
   $(document).ready(function() {
 
    $('.next-btn').click(function() {
        const currentStep = $(this).closest('.step-content');
        const nextStep = currentStep.next('.step-content');
        
        currentStep.addClass('hidden');
        nextStep.removeClass('hidden');
    });

 
    $('.prev-btn').click(function() {
        const currentStep = $(this).closest('.step-content');
        const prevStep = currentStep.prev('.step-content');
        
        currentStep.addClass('hidden');
        prevStep.removeClass('hidden');
    });

    
    $('#addForm').submit(function(e) {
        e.preventDefault();

       
        const formData = new FormData(this);

        $.ajax({
            url: '/EasyMatch_Transports/public/ConducteurController/createVilleandEtap',
            method: 'POST',
            data: formData,
            processData: false,  
            contentType: false,  
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#addForm')[0].reset();
                
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès!',
                        text: 'Les informations ont été enregistrées avec succès.'
                    });
                } else {
                 
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: response.message || 'Une erreur est survenue.'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX:", error);
               
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Une erreur est survenue lors de la communication avec le serveur.'
                });
            }
        });
    });
});
</script> -->

 


        <section class="bg-slate-900 p-8">
            <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-8 shadow-xl border border-white/10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-white">Demandes Récentes</h2>
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 bg-white/5 rounded-lg text-gray-400 hover:bg-white/10 transition-all">
                            Filtrer
                        </button>
                        <button class="px-4 py-2 bg-white/5 rounded-lg text-gray-400 hover:bg-white/10 transition-all">
                            Trier
                        </button>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Demande #1 -->
                    <div
                        class="group p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-all duration-300 border border-white/10 hover:border-purple-500/50">
                        <div class="flex justify-between items-start">
                            <div class="space-y-4">
                                <div>
                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-xl font-medium text-white">Demande #1</h3>
                                        <span
                                            class="px-3 py-1 bg-blue-500/20 text-blue-400 text-sm rounded-full">Urgent</span>
                                    </div>
                                    <p class="text-gray-400 mt-1">Paris → Lyon</p>
                                </div>

                                <div class="grid grid-cols-2 gap-4 max-w-xl">
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Date de livraison</p>
                                        <p class="text-white">24 Feb 2025</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Type de colis</p>
                                        <p class="text-white">Moyen (5-10kg)</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Prix proposé</p>
                                        <p class="text-white">45 €</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Distance</p>
                                        <p class="text-white">465 km</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-3">
                                <button
                                    class="px-6 py-3 bg-green-500/20 text-green-400 rounded-xl hover:bg-green-500 hover:text-white transition-all duration-300 flex items-center justify-center space-x-2">
                                    <span>✓</span>
                                    <span>Accepter</span>
                                </button>
                                <button
                                    class="px-6 py-3 bg-red-500/20 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center justify-center space-x-2">
                                    <span>×</span>
                                    <span>Refuser</span>
                                </button>
                                <button
                                    class="px-6 py-3 bg-white/5 text-gray-400 rounded-xl hover:bg-white/10 hover:text-white transition-all duration-300">
                                    Détails
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Demande #2 -->
                    <div
                        class="group p-6 bg-white/5 rounded-xl hover:bg-white/10 transition-all duration-300 border border-white/10 hover:border-purple-500/50">
                        <div class="flex justify-between items-start">
                            <div class="space-y-4">
                                <div>
                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-xl font-medium text-white">Demande #2</h3>
                                        <span
                                            class="px-3 py-1 bg-purple-500/20 text-purple-400 text-sm rounded-full">Standard</span>
                                    </div>
                                    <p class="text-gray-400 mt-1">Lyon → Marseille</p>
                                </div>

                                <div class="grid grid-cols-2 gap-4 max-w-xl">
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Date de livraison</p>
                                        <p class="text-white">26 Feb 2025</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Type de colis</p>
                                        <p class="text-white">Petit (< 5kg)</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Prix proposé</p>
                                        <p class="text-white">35 €</p>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-lg">
                                        <p class="text-gray-400 text-sm">Distance</p>
                                        <p class="text-white">315 km</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-3">
                                <button
                                    class="px-6 py-3 bg-green-500/20 text-green-400 rounded-xl hover:bg-green-500 hover:text-white transition-all duration-300 flex items-center justify-center space-x-2">
                                    <span>✓</span>
                                    <span>Accepter</span>
                                </button>
                                <button
                                    class="px-6 py-3 bg-red-500/20 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center justify-center space-x-2">
                                    <span>×</span>
                                    <span>Refuser</span>
                                </button>
                                <button
                                    class="px-6 py-3 bg-white/5 text-gray-400 rounded-xl hover:bg-white/10 hover:text-white transition-all duration-300">
                                    Détails
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 1;
    const totalSteps = 3;

    function updateStep(step) {
        console.log("Changement vers l'étape :", step);

        document.querySelectorAll('.step-content').forEach((content) => {
            content.classList.toggle('hidden', content.dataset.step != step);
        });

        document.querySelectorAll('.step').forEach((el) => {
            el.classList.toggle('bg-purple-600', el.dataset.step == step);
            el.classList.toggle('text-white', el.dataset.step == step);
            el.classList.toggle('bg-white/10', el.dataset.step != step);
        });

        currentStep = step;
    }

    document.querySelectorAll('.next-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep < totalSteps) {
                updateStep(currentStep + 1);
            }
        });
    });

    document.querySelectorAll('.prev-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 1) {
                updateStep(currentStep - 1);
            }
        });
    });

    updateStep(currentStep);
});

            </script>
            <script src="/EasyMatch_Transports/public/assets/js/main.js"></script>

</body>


</html>
</div>