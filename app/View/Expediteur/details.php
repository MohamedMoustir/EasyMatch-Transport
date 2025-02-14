
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
     <!-- Leaflet Scripts -->
     <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <!-- Main Script -->
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/EasyMatch_Transports/public/assets/images/favicon.png">

    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        /* Barre supérieure */
        .top-bar {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 18px;
            z-index: 1000;
        }

        /* Carte */
        #map {
            width: 95%;
            height: 90vh;
            margin: 40px auto;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="px-14 py-3 flex items-center justify-between gap-5 shadow-md bg-white bg-opacity-90 shadow-lg fixed w-full z-50">
        <a href="index.php" class="flex items-center gap-1">
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

    <main class="px-14 pt-24 pb-10">
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Left Column - Details -->
            <div class="space-y-6">
                <!-- Cover Image -->
                <img src="https://images.unsplash.com/photo-1580674285054-bed31e145f59" 
                     alt="Cover" 
                     class="w-full h-96 object-cover rounded-lg shadow-lg">

                <!-- Title & Basic Info -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h1 class="text-3xl font-bold mb-4">Transport de colis Paris ➔ Lyon</h1>
                    <div class="flex items-center gap-4 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>
                            <span>Jean Dupont</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>Publié le 13/02/2025</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Description du trajet</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Je propose un transport sécurisé pour colis jusqu'à 50kg sur le trajet Paris-Lyon. 
                        Camion utilitaire avec compartiment fermé à clé. Possibilité de suivi GPS.
                    </p>
                </div>

                <!-- Route Details -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Détails du trajet</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-green-500 mr-3"></i>
                            <div>
                                <p class="font-semibold">Départ: Paris</p>
                                <p class="text-sm text-gray-600">15/02/2025 à 08:00</p>
                            </div>
                        </div>
                        <div class="border-l-2 border-gray-200 ml-5 pl-5 space-y-4">
                            <div class="relative">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full -left-7 top-3"></div>
                                <p>Arrêt à Fontainebleau (10:00-10:30)</p>
                            </div>
                            <div class="relative">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full -left-7 top-3"></div>
                                <p>Arrêt à Auxerre (12:30-13:00)</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-flag-checkered text-red-500 mr-3"></i>
                            <div>
                                <p class="font-semibold">Arrivée: Lyon</p>
                                <p class="text-sm text-gray-600">15/02/2025 à 15:00</p>
                            </div>
                        </div>
                    </div>


                    <!-- Add this in the Vehicle Details section -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <button onclick="openOrderModal()" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-box mr-2"></i>Passer commande
                        </button>
                    </div>

                    <!-- Order Modal -->
                    <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                        <div class="bg-white rounded-lg w-full max-w-md p-6 relative">
                            <button onclick="closeOrderModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                            
                            <h3 class="text-xl font-bold mb-4">Nouvelle commande</h3>
                            
                            <form action="/EasyMatch_Transports/public/CommandeController/createCommande" method="post" id="orderForm" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Dimensions du colis (cm³)</label>
                                    <input name="Dimensions" type="number" required 
                                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Ville de départ</label>
                                   
                                    <select name="Ville_départ" required class="w-full px-3 py-2 border rounded-lg"> 
                                    <?php foreach ($allvile as $ville) { ?>
        <option value="<?= htmlspecialchars($ville->id_ville) ?> ">
            <?= htmlspecialchars($ville->etape) ?>
        </option>
    <?php } ?>
                                        
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium mb-1">Ville d'arrivée</label>
                                    <select name="Ville_arrivee" required class="w-full px-3 py-2 border rounded-lg">
                                    <?php foreach ($allvile as $ville) { ?>
        <option value="<?= htmlspecialchars($ville->id_ville) ?>">
            <?= htmlspecialchars($ville->etape) ?>
        </option>
    <?php } ?>
                                    </select>
                                </div>

                                <input name="driver_id" type="hidden" name="driver_id" value="<?= $_GET['driver_id'] ?>">

                                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                                    Confirmer la demande
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Vehicle Details -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Véhicule</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="font-semibold">Marque:</p>
                            <p>Renault Master</p>
                        </div>
                        <div>
                            <p class="font-semibold">Volume coffre:</p>
                            <p>13m³ (L 3.5m x l 1.8m x H 2m)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Map -->
            <div class="sticky top-24 h-[calc(100vh-8rem)]">
                 <div class="top-bar">🗺️ Suivi en temps réel</div>

    <!-- Carte -->
    <div id="map"></div>
        </div>
    </main>



    <!-- Barre de titre -->
   
  
   
    <script src="/EasyMatch_Transports/public/assets/js/main.js"></script>



    <script>



$.ajax({
			url: '/EasyMatch_Transports/public/DetailsController/steperDetiles',
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response && response.success && Array.isArray(response.data)) {
					let html = '';
					initMap(response.data[0]);
					if (response.data.length === 0) {
						html = `<p class="text-gray-500 text-center">Aucune annonce disponible.</p>`;
					} else {
						response.data.forEach(item => {
							initMap(item);
							console.log(item);
						});
					}
					$('#items').html(html);
				} else {
					console.error("Erreur : Données invalides reçues du serveur.");
				}
			},
			error: function (xhr, status, error) {
				console.error("Erreur AJAX :", error);
			}
		});




		$.ajax({
			url: '/EasyMatch_Transports/public/conducteurController/stepper',
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response && response.success && Array.isArray(response.data)) {
					let html = '';
					initMap(response.data[0]);
					if (response.data.length === 0) {
						html = `<p class="text-gray-500 text-center">Aucune annonce disponible.</p>`;
					} else {
						response.data.forEach(item => {
							initMap(item);
							console.log(item);
						});
					}
					$('#items').html(html);
				} else {
					console.error("Erreur : Données invalides reçues du serveur.");
				}
			},
			error: function (xhr, status, error) {
				console.error("Erreur AJAX :", error);
			}
		});




		async function initMap(item) {
    try {
        console.log("Annonce reçue :", item);

        let A = { lat: parseFloat(item.ville_departlat), lon: parseFloat(item.ville_departlon) };
        let C = { lat: 34.0209, lon: -6.8416 }; 
        let D = { lat: 30.4278, lon: -9.5982 }; 
        let Z = { lat: parseFloat(item.v_arriveelat), lon: parseFloat(item.v_arriveelon) };

        console.log("Coordonnées des villes :", { A, C, D, Z });

        var map = L.map('map').setView([A.lat, A.lon], 6);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: '&copy; Esri, HERE, Garmin, FAO, NOAA',
            maxZoom: 18
        }).addTo(map);

		var taxiIcon = L.icon({
    iconUrl: '/EasyMatch_Transports/public/public/assets/images/6fd8c90131.png', 
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32]
});


        let villes = [
            { coords: A, nom: item.ville_depart_nom },
            { coords: C, nom: "Point C" },
            { coords: D, nom: "Point D" },
            { coords: Z, nom: item.ville_arrivee_nom }
        ];

        villes.forEach(ville => {
            let marker = L.marker([ville.coords.lat, ville.coords.lon], { icon: taxiIcon }).addTo(map);
            marker.bindPopup(`<b>${ville.nom}</b>`);
        });

        L.Routing.control({
            waypoints: [
                L.latLng(A.lat, A.lon),
                L.latLng(Z.lat, Z.lon)
            ],
            routeWhileDragging: true,
            lineOptions: {
                styles: [{ color: 'blue', weight: 5 }]
            }
        }).addTo(map);

        L.Routing.control({
            waypoints: [
                L.latLng(C.lat, C.lon),
                L.latLng(D.lat, D.lon)
            ],
            routeWhileDragging: true,
            lineOptions: {
                styles: [{ color: 'none', weight: 5 }]
            }
        }).addTo(map);

    } catch (error) {
        console.error("Erreur lors de l'initialisation de la carte :", error);
    }
    
}



        // Modal handling
        const orderModal = document.getElementById('orderModal');

        function openOrderModal() {
            orderModal.classList.remove('hidden');
            orderModal.classList.add('flex');
        }

        function closeOrderModal() {
            orderModal.classList.add('hidden');
            orderModal.classList.remove('flex');
        }

        // Close modal on outside click
        orderModal.addEventListener('click', (e) => {
            if (e.target === orderModal) closeOrderModal();
        });

</script>
</body>

</html>