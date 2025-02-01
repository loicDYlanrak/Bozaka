<?php

namespace App\Models;

use Flight;

class ConfigurationModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllConfigurationModel() {
        $query = "SELECT * FROM configuration";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getConfigurationModelById($id) {
        $query = "SELECT * FROM configuration WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addConfigurationModel($poidsMinimalJournalier, $bonus, $malus) {
        $query = "INSERT INTO configuration (poidsMinimalJournalier, bonus, malus) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $poidsMinimalJournalier);
        $stmt->bindParam(2, $bonus);
        $stmt->bindParam(3, $malus);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateConfigurationModel($id, $poidsMinimalJournalier, $bonus, $malus) {
        $query = "UPDATE configuration SET poidsMinimalJournalier = ?, bonus = ?, malus = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $poidsMinimalJournalier);
        $stmt->bindParam(2, $bonus);
        $stmt->bindParam(3, $malus);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteConfigurationModel($id) {
        $query = "DELETE FROM configuration WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM configuration";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM configuration WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM configuration WHERE poidsMinimalJournalier LIKE ? OR bonus LIKE ? OR id LIKE ? OR malus LIKE ?";
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
        $query = "SELECT * FROM configuration LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM configuration ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
