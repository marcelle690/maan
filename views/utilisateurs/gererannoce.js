// admin-manage-announcements.js

// Simuler une liste d'annonces
let announcements = [
    { title: 'Chambre à louer', description: 'Chambre disponible dans une colocation.', type: 'Logement' },
    { title: 'Colocation étudiant', description: 'Recherche colocataire pour un appartement.', type: 'Colocation' },
    { title: 'Soirée cinéma', description: 'Soirée cinéma à l\'université.', type: 'Événement' }
];

// Fonction pour afficher les annonces
function displayAnnouncements() {
    const announcementTable = document.getElementById('announcementTable');
    announcementTable.innerHTML = ''; // Vider la table avant d'ajouter

    announcements.forEach((announcement, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${announcement.title}</td>
            <td>${announcement.description}</td>
            <td>${announcement.type}</td>
            <td>
                <button class="btn btn-warning" onclick="editAnnouncement(${index})">Modifier</button>
                <button class="btn btn-danger" onclick="deleteAnnouncement(${index})">Supprimer</button>
            </td>
        `;
        announcementTable.appendChild(row);
    });
}

// Fonction pour ajouter une annonce
document.getElementById('announcementForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const title = document.getElementById('announcementTitle').value;
    const description = document.getElementById('announcementDescription').value;
    const type = document.getElementById('announcementType').value;

    announcements.push({ title, description, type });

    // Réinitialiser le formulaire et fermer le modal
    document.getElementById('announcementForm').reset();
    $('#addAnnouncementModal').modal('hide');

    displayAnnouncements();
});

// Fonction pour modifier une annonce
function editAnnouncement(index) {
    const announcement = announcements[index];
    document.getElementById('editAnnouncementTitle').value = announcement.title;
    document.getElementById('editAnnouncementDescription').value = announcement.description;
    document.getElementById('editAnnouncementType').value = announcement.type;
    document.getElementById('editAnnouncementIndex').value = index;

    $('#editAnnouncementModal').modal('show');
}

// Fonction pour enregistrer les modifications de l'annonce
document.getElementById('editAnnouncementForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const index = document.getElementById('editAnnouncementIndex').value;
    const title = document.getElementById('editAnnouncementTitle').value;
    const description = document.getElementById('editAnnouncementDescription').value;
    const type = document.getElementById('editAnnouncementType').value;

    announcements[index] = { title, description, type };

    // Réinitialiser le formulaire et fermer le modal
    document.getElementById('editAnnouncementForm').reset();
    $('#editAnnouncementModal').modal('hide');

    displayAnnouncements();
});

// Fonction pour supprimer une annonce
function deleteAnnouncement(index) {
    announcements.splice(index, 1);
    displayAnnouncements();
}

// Initialiser l'affichage des annonces
displayAnnouncements();
