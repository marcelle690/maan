<?php
class Echange {
    private $conn;
    private $table = 'Echanges';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un échange
    public function create($user_id, $titre, $description, $categorie, $etat, $attente_echange) {
        $query = "INSERT INTO " . $this->table . " (user_id, titre, description, categorie, etat, attente_echange) VALUES (:user_id, :titre, :description, :categorie, :etat, :attente_echange)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':attente_echange', $attente_echange);

        return $stmt->execute();
    }

    // Lire un échange par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE echange_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un échange
    public function update($id, $titre, $description, $categorie, $etat, $attente_echange) {
        $query = "UPDATE " . $this->table . " SET titre = :titre, description = :description, categorie = :categorie, etat = :etat, attente_echange = :attente_echange WHERE echange_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':attente_echange', $attente_echange);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un échange
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE echange_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
