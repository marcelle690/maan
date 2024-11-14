<?php

class Database
{
    private $host = "localhost";       // Adresse du serveur MySQL
    private $db_name = "nom_base";     // Nom de la base de données
    private $username = "utilisateur"; // Nom d'utilisateur MySQL
    private $password = "motdepasse";  // Mot de passe MySQL
    private $conn;

    // Méthode pour obtenir la connexion à la base de données
    public function getConnection()
    {
        $this->conn = null;

        try {
            // Créer une instance PDO pour se connecter à la base de données
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Afficher un message d'erreur si la connexion échoue
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
