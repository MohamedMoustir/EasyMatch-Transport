



async function fetchCities() {
    try {
        const response = await fetch("https://mohamedmoustir.github.io/api/");
        const data = await response.json();
        
        if (!data.cities || !Array.isArray(data.cities)) {
            throw new Error("Invalid data format");
        }

        const villeDepart = document.getElementById("ville_depart");
        const villeArrivee = document.getElementById("ville_arrivee");
        const destination = document.getElementById("destination");

        // Populate dropdowns
        const cities = data.cities.map(city => `<option value="${city.lat},${city.lon},${city.city},${city.id}">${city.city}</option>`).join('');
        
        villeDepart.innerHTML = `<option value="" disabled selected>Choisissez une ville de départ</option>` + cities;
        villeArrivee.innerHTML = `<option value="" disabled selected>Choisissez une ville d'arrivée</option>` + cities;
        destination.innerHTML = `<option value="" disabled selected>Choisissez une ville intermédiaire</option>` + cities;

    } catch (error) {
        console.error("Failed to fetch cities:", error);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    fetchCities();
    let currentStep = 1;
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep < 3) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    function showStep(step) {
        const steps = document.querySelectorAll('.step-content');
        const stepIndicators = document.querySelectorAll('.step');
        
        steps.forEach(s => s.classList.add('hidden'));
        stepIndicators.forEach(indicator => indicator.classList.remove('bg-purple-600', 'text-white'));

        const currentStepContent = document.querySelector(`.step-content[data-step="${step}"]`);
        const currentStepIndicator = document.querySelector(`.step[data-step="${step}"]`);

        currentStepContent.classList.remove('hidden');
        currentStepIndicator.classList.add('bg-purple-600', 'text-white');
    }

    showStep(currentStep);
});














// // paginaton
// let currentStep = 1;
// const steps = document.querySelectorAll('.step-content');
// const nextBtns = document.querySelectorAll('.next-btn');
// const prevBtns = document.querySelectorAll('.prev-btn');
// const stepIndicators = document.querySelectorAll('.step');

// function showStep(step) {
// 	steps.forEach(stepContent => stepContent.classList.add('hidden'));
// 	stepIndicators.forEach(indicator => indicator.classList.remove('bg-purple-600', 'text-white'));
// 	stepIndicators[step - 1].classList.add('bg-purple-600', 'text-white');
// 	steps[step - 1].classList.remove('hidden');
// }

// nextBtns.forEach(btn => {
// 	btn.addEventListener('click', () => {
// 		if (currentStep < steps.length) {
// 			currentStep++;
// 			showStep(currentStep);
// 		}
// 	});
// });

// prevBtns.forEach(btn => {
// 	btn.addEventListener('click', () => {
// 		if (currentStep > 1) {
// 			currentStep--;
// 			showStep(currentStep);
// 		}
// 	});
// });

// showStep(currentStep);