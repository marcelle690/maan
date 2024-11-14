<?php
class Logement {
    private $conn;
    private $table = 'Logements';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un logement
    public function create($type, $adresse, $prix, $proximite_universite, $proximite_magazin, $description, $proprietaire_id, $status) {
        $query = "INSERT INTO " . $this->table . " (type, adresse, prix, proximite_universite, proximite_magazin, description, proprietaire_id, status) VALUES (:type, :adresse, :prix, :proximite_universite, :proximite_magazin, :description, :proprietaire_id, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':proximite_universite', $proximite_universite);
        $stmt->bindParam(':proximite_magazin', $proximite_magazin);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':proprietaire_id', $proprietaire_id);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    // Lire un logement par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE logement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un logement
    public function update($id, $type, $adresse, $prix, $proximite_universite, $proximite_magazin, $description, $status) {
        $query = "UPDATE " . $this->table . " SET type = :type, adresse = :adresse, prix = :prix, proximite_universite = :proximite_universite, proximite_magazin = :proximite_magazin, description = :description, status = :status WHERE logement_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':proximite_universite', $proximite_universite);
        $stmt->bindParam(':proximite_magazin', $proximite_magazin);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un logement
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE logement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
