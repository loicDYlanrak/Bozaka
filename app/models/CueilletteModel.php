<?php

namespace App\Models;

use Flight;

class CueilletteModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCueilletteModel() {
        $query = "SELECT * FROM cueillette";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCueilletteModelById($id) {
        $query = "SELECT * FROM cueillette WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addCueilletteModel($date, $parcelleId, $poids, $cueilleurId) {
        $query = "INSERT INTO cueillette (date, parcelleId, poids, cueilleurId) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $parcelleId);
        $stmt->bindParam(3, $poids);
        $stmt->bindParam(4, $cueilleurId);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateCueilletteModel($id, $date, $parcelleId, $poids, $cueilleurId) {
        $query = "UPDATE cueillette SET date = ?, parcelleId = ?, poids = ?, cueilleurId = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $parcelleId);
        $stmt->bindParam(3, $poids);
        $stmt->bindParam(4, $cueilleurId);
        $stmt->bindParam(5, $id);
        return $stmt->execute();
    }

    public function deleteCueilletteModel($id) {
        $query = "DELETE FROM cueillette WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM cueillette";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM cueillette WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM cueillette WHERE date LIKE ? OR parcelleId LIKE ? OR poids LIKE ? OR cueilleurId LIKE ? OR id LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->bindParam(4, $keyword);
        $stmt->bindParam(5, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM cueillette LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM cueillette ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
