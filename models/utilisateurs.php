<?php
class Utilisateur {
    private $conn;
    private $table = 'Utilisateurs';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un utilisateur
    public function create($nom, $prenom, $email, $mot_de_passe, $role) {
        $query = "INSERT INTO " . $this->table . " (nom, prenom, email, mot_de_passe, role) VALUES (:nom, :prenom, :email, :mot_de_passe, :role)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', password_hash($mot_de_passe, PASSWORD_DEFAULT));
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    // Lire un utilisateur par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un utilisateur
    public function update($id, $nom, $prenom, $email, $role) {
        $query = "UPDATE " . $this->table . " SET nom = :nom, prenom = :prenom, email = :email, role = :role WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un utilisateur
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
