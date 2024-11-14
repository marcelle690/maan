// admin-manage-users.js

// Simuler une liste d'utilisateurs
let users = [
    { name: 'Alice Dupont', email: 'alice.dupont@example.com', role: 'Utilisateur' },
    { name: 'Bob Martin', email: 'bob.martin@example.com', role: 'Contributeur' },
    { name: 'Charlie Dubois', email: 'charlie.dubois@example.com', role: 'Administrateur' }
];

// Fonction pour afficher les utilisateurs
function displayUsers() {
    const userTable = document.getElementById('userTable');
    userTable.innerHTML = ''; // Vider la table avant d'ajouter

    users.forEach((user, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.role}</td>
            <td>
                <button class="btn btn-warning" onclick="editUser(${index})">Modifier</button>
                <button class="btn btn-danger" onclick="deleteUser(${index})">Supprimer</button>
            </td>
        `;
        userTable.appendChild(row);
    });
}

// Fonction pour ajouter un utilisateur
document.getElementById('userForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('userName').value;
    const email = document.getElementById('userEmail').value;
    const role = document.getElementById('userRole').value;

    users.push({ name, email, role });

    // Réinitialiser le formulaire et fermer le modal
    document.getElementById('userForm').reset();
    $('#addUserModal').modal('hide');

    displayUsers();
});

// Fonction pour modifier un utilisateur
function editUser(index) {
    const user = users[index];
    document.getElementById('editUserName').value = user.name;
    document.getElementById('editUserEmail').value = user.email;
    document.getElementById('editUserRole').value = user.role;
    document.getElementById('editUserIndex').value = index;

    $('#editUserModal').modal('show');
}

// Fonction pour enregistrer les modifications de l'utilisateur
document.getElementById('editUserForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const index = document.getElementById('editUserIndex').value;
    const name = document.getElementById('editUserName').value;
    const email = document.getElementById('editUserEmail').value;
    const role = document.getElementById('editUserRole').value;

    users[index] = { name, email, role };

    // Réinitialiser le formulaire et fermer le modal
    document.getElementById('editUserForm').reset();
    $('#editUserModal').modal('hide');

    displayUsers();
});

// Fonction pour supprimer un utilisateur
function deleteUser(index) {
    users.splice(index, 1);
    displayUsers();
}

// Initialiser l'affichage des utilisateurs
displayUsers();
