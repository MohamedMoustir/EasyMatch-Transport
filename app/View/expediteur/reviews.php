<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire d'Évaluation</title>
    <script src="https://cdn.tailwindcss.com"></script>

  </head>
  <body>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
      <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full relative">
        <button
          type="button"
          id="closeButton"
          class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-150"
          aria-label="Fermer le formulaire"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 6L18 18" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>

        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
          Évaluation du Service
        </h1>
        
        <form id="reviewForm" class="space-y-6">
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Note
            </label>
            <div id="stars" class="flex justify-center gap-2">
              <!-- Stars will be inserted here by JavaScript -->
            </div>
          </div>

          <div class="space-y-2">
            <label for="comment" class="block text-sm font-medium text-gray-700">
              Commentaire
            </label>
            <textarea
              id="comment"
              rows="4"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
              placeholder="Partagez votre expérience..."
              required
            ></textarea>
          </div>

          <button
            type="submit"
            class="w-full flex items-center justify-center gap-2 bg-indigo-600 text-white px-4 py-3 rounded-md hover:bg-indigo-700 transition-colors duration-150"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 2L11 13" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Envoyer l'évaluation
          </button>
        </form>
      </div>
    </div>

    <script>
      // Star rating functionality
      let currentRating = 0;
      let hoverRating = 0;

      function createStarRating() {
        const starsContainer = document.getElementById('stars');
        if (!starsContainer) return;

        for (let i = 1; i <= 5; i++) {
          const star = document.createElement('button');
          star.type = 'button';
          star.className = 'focus:outline-none';
          star.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-colors duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
          </svg>`;

          star.addEventListener('mouseover', () => updateStars(i, true));
          star.addEventListener('mouseout', () => updateStars(currentRating, false));
          star.addEventListener('click', () => {
            currentRating = i;
            updateStars(i, false);
          });

          starsContainer.appendChild(star);
        }
      }

      function updateStars(rating, isHover) {
        const stars = document.querySelectorAll('#stars button svg');
        stars.forEach((star, index) => {
          if (index < rating) {
            star.classList.add('text-yellow-400', 'fill-yellow-400');
          } else {
            star.classList.remove('text-yellow-400', 'fill-yellow-400');
            star.classList.add('text-gray-300');
          }
        });
        if (isHover) {
          hoverRating = rating;
        }
      }

      function resetForm() {
        currentRating = 0;
        updateStars(0, false);
        document.getElementById('comment').value = '';
      }

      // Form submission and close button
      document.addEventListener('DOMContentLoaded', () => {
        createStarRating();

        const form = document.getElementById('reviewForm');
        const closeButton = document.getElementById('closeButton');

        form?.addEventListener('submit', (e) => {
          e.preventDefault();
          const comment = document.getElementById('comment').value;
          
          // Handle form submission
          console.log({ rating: currentRating, comment });
          alert('Merci pour votre évaluation !');
          
          // Reset form
          resetForm();
        });

        closeButton?.addEventListener('click', () => {
          if (confirm('Voulez-vous vraiment annuler votre évaluation ?')) {
            resetForm();
          }
        });
      });
    </script>

    <script type="module" src="/src/main.tsx"></script>
  </body>
</html>