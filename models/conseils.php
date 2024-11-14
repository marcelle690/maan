<?php
class Conseil {
    private $conn;
    private $table = 'Conseils';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un conseil
    public function create($user_id, $titre, $description, $categorie, $source, $lien_externe) {
        $query = "INSERT INTO " . $this->table . " (user_id, titre, description, categorie, source, lien_externe) VALUES (:user_id, :titre, :description, :categorie, :source, :lien_externe)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':source', $source);
        $stmt->bindParam(':lien_externe', $lien_externe);

        return $stmt->execute();
    }

    // Lire un conseil par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE conseil_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un conseil
    public function update($id, $titre, $description, $categorie, $source, $lien_externe) {
        $query = "UPDATE " . $this->table . " SET titre = :titre, description = :description, categorie = :categorie, source = :source, lien_externe = :lien_externe WHERE conseil_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':source', $source);
        $stmt->bindParam(':lien_externe', $lien_externe);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un conseil
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE conseil_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
