<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulaire d'Évaluation</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full relative">
      <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Évaluation du Service</h1>

      <!-- Formulaire -->
      <form id="reviewForm" action="<?= BASE_URL ?>/ReviewController" method="POST">

      <div id="stars" class="flex justify-center gap-2 mb-4"></div>

        <input type="hidden" name="rating" id="rating" value="0">

        <div class="space-y-2">
          <label for="comment" class="block text-sm font-medium text-gray-700">Commentaire</label>
          <textarea id="comment" name="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Partagez votre expérience..." required></textarea>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-3 rounded-md hover:bg-indigo-700">
          Envoyer l'évaluation
        </button>
      </form>
    </div>
  </div>

  <script>
    let currentRating = 0;

    // Fonction pour créer les étoiles
    function createStarRating() {
      const starsContainer = document.getElementById('stars');
      for (let i = 1; i <= 5; i++) {
        const star = document.createElement('button');
        star.type = 'button';
        star.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-colors duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>`;
        
        // Événements pour modifier l'apparence des étoiles au survol et au clic
        star.addEventListener('mouseover', () => updateStars(i, true));
        star.addEventListener('mouseout', () => updateStars(currentRating, false));
        star.addEventListener('click', () => {
          currentRating = i;
          document.getElementById('rating').value = currentRating; // Met à jour la valeur du champ caché
          updateStars(i, false);
        });

        starsContainer.appendChild(star);
      }
    }

    // Fonction pour mettre à jour l'apparence des étoiles
    function updateStars(rating, isHover) {
      const stars = document.querySelectorAll('#stars button svg');
      stars.forEach((star, index) => {
        if (index < rating) {
          star.classList.add('text-yellow-400', 'fill-yellow-400');
          star.classList.remove('text-gray-300');
        } else {
          star.classList.remove('text-yellow-400', 'fill-yellow-400');
          star.classList.add('text-gray-300');
        }
      });
    }

    // Initialisation des étoiles lors du chargement de la page
    document.addEventListener('DOMContentLoaded', createStarRating);
  </script>
</body>
</html>
