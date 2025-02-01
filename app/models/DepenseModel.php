<?php

namespace App\Models;

use Flight;

class DepenseModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllDepenseModel() {
        $query = "SELECT * FROM depense";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDepenseModelById($id) {
        $query = "SELECT * FROM depense WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addDepenseModel($date, $categorieDepenseId, $montant) {
        $query = "INSERT INTO depense (date, categorieDepenseId, montant) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $categorieDepenseId);
        $stmt->bindParam(3, $montant);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateDepenseModel($id, $date, $categorieDepenseId, $montant) {
        $query = "UPDATE depense SET date = ?, categorieDepenseId = ?, montant = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $categorieDepenseId);
        $stmt->bindParam(3, $montant);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteDepenseModel($id) {
        $query = "DELETE FROM depense WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM depense";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM depense WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM depense WHERE date LIKE ? OR categorieDepenseId LIKE ? OR montant LIKE ? OR id LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->bindParam(4, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM depense LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM depense ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
