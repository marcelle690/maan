<?php
class Preoccupation {
    private $conn;
    private $table = 'Preoccupations';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une préoccupation
    public function create($user_id, $titre, $description, $categorie, $statut) {
        $query = "INSERT INTO " . $this->table . " (user_id, titre, description, categorie, statut) VALUES (:user_id, :titre, :description, :categorie, :statut)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':statut', $statut);

        return $stmt->execute();
    }

    // Lire une préoccupation par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE preoccupation_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une préoccupation
    public function update($id, $titre, $description, $categorie, $statut) {
        $query = "UPDATE " . $this->table . " SET titre = :titre, description = :description, categorie = :categorie, statut = :statut WHERE preoccupation_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer une préoccupation
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE preoccupation_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
