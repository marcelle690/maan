// admin.js

// Liste d'annonces simulée
let announcements = [
    { title: 'Networking étudiants', date: '2024-11-20', category: 'Networking', description: 'Rencontrez d\'autres étudiants et échangez vos idées.' },
    { title: 'Soirée cinéma', date: '2024-11-22', category: 'Culturel', description: 'Projection d\'un film suivi d\'un débat.' },
    { title: 'Match de foot', date: '2024-11-25', category: 'Sport', description: 'Match amical entre étudiants.' },
    { title: 'Club de lecture', date: '2024-11-30', category: 'Lecture', description: 'Lecture collective du livre "1984".' },
];

// Afficher les annonces dans la table
function displayAnnouncements() {
    const announcementTable = document.getElementById('announcementTable');
    announcementTable.innerHTML = '';

    announcements.forEach((announcement, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${announcement.title}</td>
            <td>${announcement.date}</td>
            <td>${announcement.category}</td>
            <td>${announcement.description}</td>
            <td>
                <button class="btn btn-warning" onclick="editAnnouncement(${index})">Modifier</button>
                <button class="btn btn-danger" onclick="deleteAnnouncement(${index})">Supprimer</button>
            </td>
        `;
        announcementTable.appendChild(row);
    });
}

// Ajouter une nouvelle annonce
document.getElementById('announcementForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('announcementTitle').value;
    const date = document.getElementById('announcementDate').value;
    const category = document.getElementById('announcementCategory').value;
    const description = document.getElementById('announcementDescription').value;

    announcements.push({ title, date, category, description });
    displayAnnouncements();
    $('#addAnnouncementModal').modal('hide');
    document.getElementById('announcementForm').reset();
});

// Modifier une annonce
function editAnnouncement(index) {
    const announcement = announcements[index];
    
    document.getElementById('announcementTitle').value = announcement.title;
    document.getElementById('announcementDate').value = announcement.date;
    document.getElementById('announcementCategory').value = announcement.category;
    document.getElementById('announcementDescription').value = announcement.description;

    $('#addAnnouncementModal').modal('show');
    
    announcements.splice(index, 1);
}

// Supprimer une annonce
function deleteAnnouncement(index) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')) {
        announcements.splice(index, 1);
        displayAnnouncements();
    }
}

// Initialiser l'affichage des annonces
displayAnnouncements();
