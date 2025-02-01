<?php

namespace App\Models;

use Flight;

class PaiementCueilleurModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPaiementCueilleurModel() {
        $query = "SELECT * FROM paiementCueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPaiementCueilleurModelById($id) {
        $query = "SELECT * FROM paiementCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addPaiementCueilleurModel($date, $poidsTotal, $bonus, $cueilleurId, $malus, $montantPaiement) {
        $query = "INSERT INTO paiementCueilleur (date, poidsTotal, bonus, cueilleurId, malus, montantPaiement) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $poidsTotal);
        $stmt->bindParam(3, $bonus);
        $stmt->bindParam(4, $cueilleurId);
        $stmt->bindParam(5, $malus);
        $stmt->bindParam(6, $montantPaiement);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updatePaiementCueilleurModel($id, $date, $poidsTotal, $bonus, $cueilleurId, $malus, $montantPaiement) {
        $query = "UPDATE paiementCueilleur SET date = ?, poidsTotal = ?, bonus = ?, cueilleurId = ?, malus = ?, montantPaiement = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $poidsTotal);
        $stmt->bindParam(3, $bonus);
        $stmt->bindParam(4, $cueilleurId);
        $stmt->bindParam(5, $malus);
        $stmt->bindParam(6, $montantPaiement);
        $stmt->bindParam(7, $id);
        return $stmt->execute();
    }

    public function deletePaiementCueilleurModel($id) {
        $query = "DELETE FROM paiementCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM paiementCueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM paiementCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM paiementCueilleur WHERE date LIKE ? OR poidsTotal LIKE ? OR bonus LIKE ? OR cueilleurId LIKE ? OR id LIKE ? OR malus LIKE ? OR montantPaiement LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->bindParam(4, $keyword);
        $stmt->bindParam(5, $keyword);
        $stmt->bindParam(6, $keyword);
        $stmt->bindParam(7, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM paiementCueilleur LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM paiementCueilleur ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
