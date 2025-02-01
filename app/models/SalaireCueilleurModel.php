<?php

namespace App\Models;

use Flight;

class SalaireCueilleurModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSalaireCueilleurModel() {
        $query = "SELECT * FROM salaireCueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSalaireCueilleurModelById($id) {
        $query = "SELECT * FROM salaireCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addSalaireCueilleurModel($montantParKg) {
        $query = "INSERT INTO salaireCueilleur (montantParKg) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $montantParKg);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateSalaireCueilleurModel($id, $montantParKg) {
        $query = "UPDATE salaireCueilleur SET montantParKg = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $montantParKg);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    }

    public function deleteSalaireCueilleurModel($id) {
        $query = "DELETE FROM salaireCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM salaireCueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM salaireCueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM salaireCueilleur WHERE montantParKg LIKE ? OR id LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM salaireCueilleur LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM salaireCueilleur ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
