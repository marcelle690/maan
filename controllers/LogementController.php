<?php
require_once 'Logement.php';  // Inclure le modèle Logement

class LogementController {
    private $logementModel;

    public function __construct($db) {
        // Instancier le modèle Logement avec la connexion DB
        $this->logementModel = new Logement($db);
    }

    // Méthode pour afficher les logements filtrés
    public function filtrerLogements() {
        // Récupérer les critères de filtrage envoyés par le formulaire
        $type = isset($_POST['typeLogement']) && $_POST['typeLogement'] != "Type de logement" ? $_POST['typeLogement'] : null;
        $prix_max = isset($_POST['budget']) && !empty($_POST['budget']) ? $_POST['budget'] : null;
        $proximite_universite = isset($_POST['proximite']) && !empty($_POST['proximite']) ? $_POST['proximite'] : null;

        // Appeler la méthode filter du modèle pour récupérer les logements filtrés
        $logements = $this->logementModel->filter($type, $prix_max, $proximite_universite);

        // Passer les résultats à la vue
        require 'views/logementsView.php';
    }
} 



// Gérer l'action de création d'annonce
if (isset($_GET['action']) && $_GET['action'] == 'creer_annonce') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $type = $_POST['type'];
        $adresse = $_POST['adresse'];
        $prix = $_POST['prix'];
        $proximite_universite = $_POST['proximite_universite'];
        $proximite_magazin = $_POST['proximite_magazin'];
        $description = $_POST['description'];
        $proprietaire_id = 1;  // Remplacer par l'ID du propriétaire, si disponible
        $status = 'approuvé'; // Vous pouvez définir un statut par défaut ou à valider par un admin

        // Créer une instance de Logement
        $logement = new Logement($conn);
        if ($logement->create($type, $adresse, $prix, $proximite_universite, $proximite_magazin, $description, $proprietaire_id, $status)) {
            // Rediriger ou afficher un message de succès
            header("Location: annonces.php?success=1");
        } else {
            echo "Une erreur est survenue lors de la création de l'annonce.";
        }
    }
}

?>
