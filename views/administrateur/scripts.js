// scripts.js

// Événements à afficher dans le calendrier
const events = [
    { title: 'Networking étudiants', date: '2024-11-20', category: 'Networking', description: 'Rencontrez d\'autres étudiants et échangez vos idées.' },
    { title: 'Soirée cinéma', date: '2024-11-22', category: 'Culturel', description: 'Projection d\'un film suivi d\'un débat.' },
    { title: 'Match de foot', date: '2024-11-25', category: 'Sport', description: 'Match amical entre étudiants.' },
    { title: 'Club de lecture', date: '2024-11-30', category: 'Lecture', description: 'Lecture collective du livre "1984".' },
];

// Affichage des événements
function displayEvents() {
    const eventsList = document.getElementById('eventsList');
    eventsList.innerHTML = '';

    const selectedCategory = document.getElementById('categoryFilter').value;

    events.filter(event => selectedCategory === 'all' || event.category === selectedCategory).forEach(event => {
        const eventCard = document.createElement('div');
        eventCard.classList.add('event-card');

        eventCard.innerHTML = `
            <div class="event-title">${event.title}</div>
            <div class="event-category">${event.category}</div>
            <div class="event-date">${event.date}</div>
            <div class="event-description">${event.description}</div>
        `;

        eventsList.appendChild(eventCard);
    });
}

// Filtrer les événements
document.getElementById('categoryFilter').addEventListener('change', displayEvents);

// Ajouter un événement
document.getElementById('eventForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('eventTitle').value;
    const date = document.getElementById('eventDate').value;
    const description = document.getElementById('eventDescription').value;
    const category = document.getElementById('eventCategory').value;

    events.push({ title, date, description, category });
    displayEvents();
    $('#addEventModal').modal('hide');
    document.getElementById('eventForm').reset();
});

// Initialiser l'affichage des événements
displayEvents();
