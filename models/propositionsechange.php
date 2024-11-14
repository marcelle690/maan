<?php
class PropositionEchange {
    private $conn;
    private $table = 'PropositionsEchange';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une proposition d'échange
    public function create($echange_id, $user_id, $objet_propose, $description_propose, $categorie_objet_propose, $etat_propose) {
        $query = "INSERT INTO " . $this->table . " (echange_id, user_id, objet_propose, description_propose, categorie_objet_propose, etat_propose) VALUES (:echange_id, :user_id, :objet_propose, :description_propose, :categorie_objet_propose, :etat_propose)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':echange_id', $echange_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':objet_propose', $objet_propose);
        $stmt->bindParam(':description_propose', $description_propose);
        $stmt->bindParam(':categorie_objet_propose', $categorie_objet_propose);
        $stmt->bindParam(':etat_propose', $etat_propose);

        return $stmt->execute();
    }

    // Lire une proposition d'échange par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE proposition_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une proposition d'échange
    public function update($id, $echange_id, $user_id, $objet_propose, $description_propose, $categorie_objet_propose, $etat_propose) {
        $query = "UPDATE " . $this->table . " SET echange_id = :echange_id, user_id = :user_id, objet_propose = :objet_propose, description_propose = :description_propose, categorie_objet_propose = :categorie_objet_propose, etat_propose = :etat_propose WHERE proposition_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':echange_id', $echange_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':objet_propose', $objet_propose);
        $stmt->bindParam(':description_propose', $description_propose);
        $stmt->bindParam(':categorie_objet_propose', $categorie_objet_propose);
        $stmt->bindParam(':etat_propose', $etat_propose);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer une proposition d'échange
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE proposition_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
