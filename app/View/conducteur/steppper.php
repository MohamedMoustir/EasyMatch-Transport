<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Geolocation with Routing</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="icon" type="image/png" href="/EasyMatch_Transports/public/assets/images/favicon.png">

	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		#map {
			width: 100%;
			height: 100vh;
		}
	</style>
</head>

<body>
	<div id="items"></div>
	<div id="map"></div>

	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

	<script src="/EasyMatch_Transports/public/assets/js/main.js"></script>


	<script>

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

        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Leaflet &copy; OpenStreetMap contributors',
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
                styles: [{ color: 'red', weight: 5 }]
            }
        }).addTo(map);

    } catch (error) {
        console.error("Erreur lors de l'initialisation de la carte :", error);
    }
}

	</script>
</body>

</html>