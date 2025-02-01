<?php

namespace App\Models;

use Flight;

class ParcelleModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllParcelleModel() {
        $query = "SELECT * FROM parcelle";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getParcelleModelById($id) {
        $query = "SELECT * FROM parcelle WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addParcelleModel($numero, $surface, $varieteTheId) {
        $query = "INSERT INTO parcelle (numero, surface, varieteTheId) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $numero);
        $stmt->bindParam(2, $surface);
        $stmt->bindParam(3, $varieteTheId);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateParcelleModel($id, $numero, $surface, $varieteTheId) {
        $query = "UPDATE parcelle SET numero = ?, surface = ?, varieteTheId = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $numero);
        $stmt->bindParam(2, $surface);
        $stmt->bindParam(3, $varieteTheId);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteParcelleModel($id) {
        $query = "DELETE FROM parcelle WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM parcelle";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM parcelle WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM parcelle WHERE numero LIKE ? OR surface LIKE ? OR id LIKE ? OR varieteTheId LIKE ?";
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
        $query = "SELECT * FROM parcelle LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM parcelle ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
