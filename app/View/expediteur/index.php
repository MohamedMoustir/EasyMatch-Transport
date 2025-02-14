<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annonces Expediteur</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!-- Navbar Section -->
<nav class="px-14 py-3 flex items-center justify-between gap-5 shadow-md bg-white bg-opacity-90 shadow-lg fixed w-full z-50">
    <a href="/EasyMatch_Transports/public/HomeController/index" class="flex items-center gap-1">
        <img class="w-20" src="C:\xampp\htdocs\EasyMatch_Transports\app\View\expediteur\logoo.png" alt="Logo de EasyMatch">
    </a>
    <div class="flex items-center justify-between gap-10">
        <ul class="flex items-center gap-5 text-md">
            <li class="text-xl duration-500 hover:text-blue-600"><a href="#"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
            <li class="text-xl duration-500 hover:text-blue-600"><a href="#"><i class="fa-solid fa-bell"></i></a></li>
        </ul>
        <a href="#"><img class="w-10" src="user.png" alt="User Profile"></a>
    </div>
</nav>

<!-- Hero Section -->
<div class="relative bg-gray-50 min-h-[600px] overflow-hidden">
  <div class="container mx-auto px-4 py-20">
    <div class="grid md:grid-cols-2 gap-8 items-center">
      <!-- Left Content -->
      <div class="space-y-6">
        <span class="text-blue-600 font-semibold uppercase tracking-wider">
          FASTEST & SECURE LOGISTICS
        </span>
        <h1 class="text-4xl md:text-6xl font-bold text-navy-900 leading-tight">
          We Deliver Your<br>Product Anywhere!
        </h1>
        <p class="text-gray-600 text-lg max-w-lg">
          When An Unknown Printer Took A Galley Of Type And Company Need Scra Make It Better Future To Make Attempt Type
          Specimen.
        </p>
        <button
          class="bg-blue-700 text-white px-8 py-4 rounded-md hover:bg-blue-800 transition flex items-center space-x-2 text-lg">
          Explore Our Services
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </button>
      </div>

      <!-- Right Image -->
      <div class="relative">
        <img
          src="https://logistex.netlify.app/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbanner_img01.3e27d8b5.png&w=640&q=75"
          alt="Delivery Person" class="relative z-10">
        <div class="absolute top-10 right-0 z-20">
          <img
            src="https://logistex.netlify.app/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbanner_img02.85bfcdcc.png&w=640&q=75"
            alt="Container" class="w-64">
        </div>
      </div>
    </div>
  </div>

  <!-- Background Pattern -->
  <div class="absolute top-0 left-0 w-full h-full z-0">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
  </div>
</div>
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">Trouvez votre transport maintenant</h1>
      <p class="text-xl mb-8">Plus de 1000+ annonces de transport disponibles</p>
      <div class="flex gap-4 justify-center">
        <button class="bg-white text-blue-700 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50">
          Publier une annonce
        </button>
        <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-500">
          Chercher un transport
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-gray-100">
  <div class="container mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg p-6 -mt-16">
      <div class="grid md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Départ</label>
          <select
            class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 hover:ring-2 hover:ring-blue-300 transition">
            <option>Toutes les villes</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Arrivée</label>
          <select
            class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 hover:ring-2 hover:ring-blue-300 transition">
            <option>Toutes les villes</option>
          </select>
        </div>
        <div class="flex items-end">
          <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
            Rechercher
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Latest Announcements -->
<section class="py-12">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-8">Dernières Annonces</h2>


    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card 1 -->
      <?php foreach ($gridAnnonce as $annonce):
        ?>
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition">
          <div class="p-6">
            <img src="../../public/assets/images/<?= $annonce['couverture'] ?>" alt="Casablanca to Paris"
              class="w-full h-32 object-cover mb-4 rounded-lg">
            <div class="flex justify-between items-start mb-4">
              <div>
                <h3 class="font-semibold text-lg mb-2"><?= $annonce['ville_depart_nom'] ?> →
                  <?= $annonce['ville_arrivee_nom'] ?>
                </h3>
                <p class="text-gray-600">Départ: <?=date("d M Y", strtotime($annonce['date_depart']));?></p>
              </div>
              <button
                class="flex items-center bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full border border-green-300 hover:bg-green-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Vérifié
              </button>

            </div>
            <div class="space-y-3">
              <div class="flex items-center text-gray-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
                <span>Max: 25kg</span>
              </div>
              <div class="flex items-center text-gray-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Prix: 50€/kg</span>
              </div>
            </div>
            <button class="w-full mt-6 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
              <a href="/EasyMatch_Transports/public/DetailsController/get/<?= $annonce['id_annonce'] ?>">Consulter Détails</a>
            </button>
          </div>
        </div>
      <?php endforeach; ?>


    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12 space-x-2">
      <a class="px-4 py-2 border rounded-lg hover:bg-gray-50"
        href="?page-nr=<?= max(1, (isset($_GET['page-nr']) ? $_GET['page-nr'] : 0) - 1) ?>">Précédent</a>

      <?php for ($count = 1; $count <= $pages; $count++): ?>

        <button class="px-4 py-2 border rounded-lg bg-blue-600 text-white"><?= $count ?></button>

      <?php endfor; ?>
      <a class="px-4 py-2 border rounded-lg hover:bg-gray-50" onclick="loadData()"
        href="?page-nr=<?= min($pages, (isset($_GET['page-nr']) ? $_GET['page-nr'] : 0) + 1) ?>">Suivant</a>

    </div>
  </div>
</section>


<!-- Stats Section -->
<section class="bg-blue-900 text-white py-16">
  <div class="container mx-auto px-4">
    <div class="grid md:grid-cols-4 gap-8 text-center">
      <div>
        <div class="text-4xl font-bold mb-2">1500+</div>
        <div class="text-blue-200">Annonces actives</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">8500+</div>
        <div class="text-blue-200">Utilisateurs satisfaits</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">15+</div>
        <div class="text-blue-200">Pays desservis</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">24/7</div>
        <div class="text-blue-200">Support client</div>
      </div>
    </div>
  </div>
</section>

<!-- Footer Section -->
<footer class="bg-blue-900 text-white py-10">
  <div class="container mx-auto px-4">
    <div class="grid md:grid-cols-4 gap-8 text-center">
      <!-- About Section -->
      <div>
        <h3 class="text-xl font-semibold mb-4">À propos</h3>
        <p class="text-gray-300 text-sm">Nous sommes une entreprise spécialisée dans la logistique, offrant des
          solutions de transport rapides et sécurisées pour vos colis à travers le monde.</p>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
        <ul class="space-y-2 text-gray-300">
          <li><a href="#" class="hover:text-blue-300">Home</a></li>
          <li><a href="#" class="hover:text-blue-300">About Us</a></li>
          <li><a href="#" class="hover:text-blue-300">Services</a></li>
          <li><a href="#" class="hover:text-blue-300">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Information -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Contact</h3>
        <p class="text-gray-300 text-sm">Vous pouvez nous joindre à l'adresse suivante:</p>
        <p class="text-gray-300 text-sm">Email: <a href="mailto:support@logistex.com"
            class="text-blue-300">support@logistex.com</a></p>
        <p class="text-gray-300 text-sm">Téléphone: <a href="tel:(205)555-0100" class="text-blue-300">(205) 555-0100</a>
        </p>
      </div>

      <!-- Social Media -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Suivez-nous</h3>
        <div class="flex justify-center space-x-4">
          <a href="#" class="text-gray-300 hover:text-blue-300"><svg class="w-6 h-6" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-3 9 3v6l-9 3-9-3V9z" />
            </svg></a>
          <a href="#" class="text-gray-300 hover:text-blue-300"><svg class="w-6 h-6" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-3 9 3v6l-9 3-9-3V9z" />
            </svg></a>
          <a href="#" class="text-gray-300 hover:text-blue-300"><svg class="w-6 h-6" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-3 9 3v6l-9 3-9-3V9z" />
            </svg></a>
        </div>
      </div>
    </div>
    <div class="text-center mt-8">
      <p class="text-gray-300 text-sm">© 2025 Logistex, Tous droits réservés.</p>
    </div>
  </div>
</footer>
</body>
</html>





<!-- Navigation -->

