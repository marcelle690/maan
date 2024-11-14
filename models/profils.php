<?php
class Profil {
    private $conn;
    private $table = 'Profils';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un profil
    public function create($user_id, $bio, $preferences_type_logement, $colocation, $proximite_universite, $proximite_magazin) {
        $query = "INSERT INTO " . $this->table . " (user_id, bio, preferences_type_logement, colocation, proximite_universite, proximite_magazin) VALUES (:user_id, :bio, :preferences_type_logement, :colocation, :proximite_universite, :proximite_magazin)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':preferences_type_logement', $preferences_type_logement);
        $stmt->bindParam(':colocation', $colocation, PDO::PARAM_BOOL);
        $stmt->bindParam(':proximite_universite', $proximite_universite, PDO::PARAM_BOOL);
        $stmt->bindParam(':proximite_magazin', $proximite_magazin, PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    // Lire un profil par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE profil_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un profil
    public function update($id, $bio, $preferences_type_logement, $colocation, $proximite_universite, $proximite_magazin) {
        $query = "UPDATE " . $this->table . " SET bio = :bio, preferences_type_logement = :preferences_type_logement, colocation = :colocation, proximite_universite = :proximite_universite, proximite_magazin = :proximite_magazin WHERE profil_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':preferences_type_logement', $preferences_type_logement);
        $stmt->bindParam(':colocation', $colocation, PDO::PARAM_BOOL);
        $stmt->bindParam(':proximite_universite', $proximite_universite, PDO::PARAM_BOOL);
        $stmt->bindParam(':proximite_magazin', $proximite_magazin, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Supprimer un profil
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE profil_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
