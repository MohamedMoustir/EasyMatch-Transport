<!-- Announcement Details Hero -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12">
  <div class="container mx-auto px-4">
    <div class="flex items-center space-x-2 text-sm mb-4">
      <a href="#" class="hover:text-blue-200">Accueil</a>
      <span>→</span>
      <a href="#" class="hover:text-blue-200">Annonces</a>
      <span>→</span>
      <span>Détails</span>
    </div>
    
    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 mt-4">
      <div class="flex flex-col md:flex-row justify-between gap-6">
        <div class="space-y-4">
          <div class="flex items-center space-x-3">
            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">En cours</span>
            <span class="text-blue-200">ID: #TRS-789045</span>
          </div>
          <h1 class="text-3xl font-bold">Transport Casablanca → Paris</h1>
          <div class="flex items-center space-x-4 text-blue-200">
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span>Départ: 25 Feb 2025</span>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <span>Durée: 2-3 jours</span>
            </div>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <button class="bg-white text-blue-900 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50">
            Contacter
          </button>
          <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-500">
            Réserver
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-8">
      <!-- Journey Details -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6">Détails du trajet</h2>
        <div class="relative pb-12">
          <!-- Timeline Line -->
          <div class="absolute left-8 top-8 bottom-0 w-0.5 bg-gray-200"></div>
          
          <!-- Departure -->
          <div class="flex items-center mb-8 relative">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mr-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Casablanca</h3>
              <p class="text-gray-600">25 Feb 2025, 09:00</p>
              <p class="text-sm text-gray-500">Point de départ: Aéroport Mohammed V</p>
            </div>
          </div>

          <!-- Destination -->
          <div class="flex items-center relative">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mr-4">
              <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Paris</h3>
              <p class="text-gray-600">27 Feb 2025, 15:00</p>
              <p class="text-sm text-gray-500">Point d'arrivée: Aéroport Charles de Gaulle</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Package Details -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6">Détails du colis</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-gray-50 rounded-lg p-4">
            <div class="text-gray-500 text-sm mb-1">Poids maximum</div>
            <div class="font-semibold text-lg">25 kg</div>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
            <div class="text-gray-500 text-sm mb-1">Dimensions max.</div>
            <div class="font-semibold text-lg">60 x 40 x 40 cm</div>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
            <div class="text-gray-500 text-sm mb-1">Type de transport</div>
            <div class="font-semibold text-lg">Aérien</div>
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Description</h2>
        <p class="text-gray-600 leading-relaxed">
          Transport rapide et sécurisé de Casablanca vers Paris. Voyage régulier, possibilité de transporter tous types de colis respectant les dimensions indiquées. Service professionnel avec suivi en temps réel. Idéal pour les envois urgents.
        </p>
      </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-8">
      <!-- Price Card -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6">Tarification</h2>
        <div class="space-y-4">
          <div class="flex justify-between items-center pb-4 border-b">
            <span class="text-gray-600">Prix par kg</span>
            <span class="font-semibold text-xl">50 €</span>
          </div>
          <div class="flex justify-between items-center pb-4 border-b">
            <span class="text-gray-600">Frais de service</span>
            <span class="font-semibold text-xl">10 €</span>
          </div>
          <div class="bg-blue-50 p-4 rounded-lg">
            <div class="flex justify-between items-center text-blue-900">
              <span class="font-medium">Total (pour 1kg)</span>
              <span class="font-bold text-xl">60 €</span>
            </div>
          </div>
        </div>
        <button class="w-full bg-blue-600 text-white mt-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
          Réserver maintenant
        </button>
      </div>

      <!-- Transporteur Info -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6">Transporteur</h2>
        <div class="flex items-center space-x-4 mb-6">
          <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
          <div>
            <h3 class="font-semibold">Ahmed K.</h3>
            <div class="flex items-center text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
              </svg>
              <span class="ml-1 text-gray-600">4.8 (156 avis)</span>
            </div>
          </div>
        </div>
        <div class="space-y-4">
          <div class="flex items-center space-x-2 text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Identité vérifiée</span>
          </div>
          <div class="flex items-center space-x-2 text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Membre depuis 2023</span>
          </div>
        </div>
        <button class="w-full mt-6 bg-white text-blue-600 py-3 rounded-lg font-semibold border border-blue-600 hover:bg-blue-50">
          Contacter
        </button>
      </div>

      <!-- Similar Announcements -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold mb-6">Annonces similaires</h2>
        <div class="space-y-4">
          <a href="#" class="block hover:bg-gray-50 p-4 rounded-lg">
            <div class="flex justify-between items-start mb-2">
              <div>
                <h3 class="font-semibold">Casablanca → Lyon</h3>
                <p class="text-sm text-gray-600">26 Feb 2025</p>
              </div>
              <span class="text-blue-600 font-semibold">45€/kg</span>
            </div>
          </a>
          <a href="#" class="block hover:bg-gray-50 p-4 rounded-lg">
            <div class="flex justify-between items-start mb-2">
              <div>
                <h3 class="font-semibold">Casablanca → Marseille</h3>
                <p class="text-sm text-gray-600">28 Feb 2025</p>
              </div>
              <span class="text-blue-600 font-semibold">40€/kg</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>