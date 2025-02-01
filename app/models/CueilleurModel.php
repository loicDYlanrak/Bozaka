<?php

namespace App\Models;

use Flight;

class CueilleurModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCueilleurModel() {
        $query = "SELECT * FROM cueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCueilleurModelById($id) {
        $query = "SELECT * FROM cueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addCueilleurModel($dateNaissance, $genre, $nom) {
        $query = "INSERT INTO cueilleur (dateNaissance, genre, nom) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $dateNaissance);
        $stmt->bindParam(2, $genre);
        $stmt->bindParam(3, $nom);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateCueilleurModel($id, $dateNaissance, $genre, $nom) {
        $query = "UPDATE cueilleur SET dateNaissance = ?, genre = ?, nom = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $dateNaissance);
        $stmt->bindParam(2, $genre);
        $stmt->bindParam(3, $nom);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteCueilleurModel($id) {
        $query = "DELETE FROM cueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM cueilleur";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM cueilleur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM cueilleur WHERE dateNaissance LIKE ? OR genre LIKE ? OR id LIKE ? OR nom LIKE ?";
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
        $query = "SELECT * FROM cueilleur LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM cueilleur ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
