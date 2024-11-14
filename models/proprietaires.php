<?php
class Proprietaire {
    private $conn;
    private $table = 'Proprietaires';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un propriétaire
    public function create($nom, $prenom, $telephone, $email, $adresse_contact) {
        $query = "INSERT INTO " . $this->table . " (nom, prenom, telephone, email, adresse_contact) VALUES (:nom, :prenom, :telephone, :email, :adresse_contact)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse_contact', $adresse_contact);

        return $stmt->execute();
    }

    // Lire un propriétaire par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE proprietaire_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un propriétaire
    public function update($id, $nom, $prenom, $telephone, $email, $adresse_contact) {
        $query = "UPDATE " . $this->table . " SET nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, adresse_contact = :adresse_contact WHERE proprietaire_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse_contact', $adresse_contact);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un propriétaire
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE proprietaire_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
