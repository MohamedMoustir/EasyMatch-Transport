<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Geolocation with Routing</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
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
	<div id="map"></div>

	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

	<script src="/EasyMatch_Transports/public/assets/js/main.js"></script>

	<script >

async function initMap() {
	try {

		let cityA = { lat: 33.5731, lon: -7.5898 };
		let cityB = { lat: 34.0209, lon: -6.8416 };
		let cityC = { lat: 34.0209, lon: -6.8416 };
		let cityD = { lat: 30.4278, lon: -9.5982 };

		var map = L.map('map').setView([cityA.lat, cityA.lon], 6);

		L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			attribution: 'Leaflet &copy; OpenStreetMap contributors',
			maxZoom: 18
		}).addTo(map);

		var taxiIcon = L.icon({
			iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Taxi_icon.svg/1024px-Taxi_icon.svg.png',
			iconSize: [32, 32],
			iconAnchor: [16, 32],
			popupAnchor: [0, -32]
		});

		// Add a marker for City A (Casablanca)
		var marker = L.marker([cityA.lat, cityA.lon], { icon: taxiIcon }).addTo(map);
		marker.bindPopup('<b>Casablanca</b><br>Start of the route.');

		// Routing from cityA to cityB (blue route)
		L.Routing.control({
			waypoints: [
				L.latLng(cityA.lat, cityA.lon),
				L.latLng(cityB.lat, cityB.lon)
			],
			routeWhileDragging: true,
			lineOptions: {
				styles: [{ color: 'blue', weight: 5 }]
			}
		}).addTo(map);

		// Routing from cityC to cityD (orange route)
		L.Routing.control({
			waypoints: [
				L.latLng(cityC.lat, cityC.lon),
				L.latLng(cityD.lat, cityD.lon)
			],
			routeWhileDragging: true,
			lineOptions: {
				styles: [{ color: 'orange', weight: 5 }]
			}
		}).addTo(map);

	} catch (error) {
		console.error(error);
		console.log('An error occurred while initializing the map.');
	}
}

// Initialize the map
initMap();

	</script>
</body>

</html>
