<?php

namespace App\Models;

use Flight;

class RegenerationTheModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRegenerationTheModel() {
        $query = "SELECT * FROM regenerationThe";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getRegenerationTheModelById($id) {
        $query = "SELECT * FROM regenerationThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addRegenerationTheModel($mois) {
        $query = "INSERT INTO regenerationThe (mois) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $mois);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateRegenerationTheModel($id, $mois) {
        $query = "UPDATE regenerationThe SET mois = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $mois);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    }

    public function deleteRegenerationTheModel($id) {
        $query = "DELETE FROM regenerationThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM regenerationThe";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM regenerationThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM regenerationThe WHERE id LIKE ? OR mois LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM regenerationThe LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM regenerationThe ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
