<?php
class Evenement {
    private $conn;
    private $table = 'Evenements';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un événement
    public function create($user_id, $titre, $description, $date, $lieu, $type_evenement) {
        $query = "INSERT INTO " . $this->table . " (user_id, titre, description, date, lieu, type_evenement) VALUES (:user_id, :titre, :description, :date, :lieu, :type_evenement)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':type_evenement', $type_evenement);

        return $stmt->execute();
    }

    // Lire un événement par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE evenement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un événement
    public function update($id, $titre, $description, $date, $lieu, $type_evenement) {
        $query = "UPDATE " . $this->table . " SET titre = :titre, description = :description, date = :date, lieu = :lieu, type_evenement = :type_evenement WHERE evenement_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':type_evenement', $type_evenement);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un événement
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE evenement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
