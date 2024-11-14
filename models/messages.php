<?php
class Message {
    private $conn;
    private $table = 'Messages';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Envoyer un message
    public function create($expediteur_id, $destinataire_id, $contenu) {
        $query = "INSERT INTO " . $this->table . " (expediteur_id, destinataire_id, contenu) VALUES (:expediteur_id, :destinataire_id, :contenu)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':expediteur_id', $expediteur_id);
        $stmt->bindParam(':destinataire_id', $destinataire_id);
        $stmt->bindParam(':contenu', $contenu);

        return $stmt->execute();
    }

    // Lire un message par ID
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE message_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer un message
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE message_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
