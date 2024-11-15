<?php
        session_start();
        require 'db.php'; // Inclure le fichier de connexion à la base de données

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['username'];
            $mot_de_passe = $_POST['password'];

            $query = "SELECT * FROM users WHERE mdp = '$mot_de_passe' and username='$fname'";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                $professeur = $result->fetch_assoc();

                if ($professeur['mdp']) {
                  
                    header('Location: aut.html');
                    exit();
                } else {
                    echo "Nom ou mot de passe incorrect";
                }
            } else {
                echo "Nom ou mot de passe incorrect a";
            }
        }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Authentification</title>
    <!-- Lien vers le CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers le fichier CSS personnalisé -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg rounded auth-card">
            <h2 class="text-center mb-4">Connexion</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Entrer votre nom d'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name='connect'>Se connecter</button>
            </form>
            <div class="text-center mt-3">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>

    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>
</html>
