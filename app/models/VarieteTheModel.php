<?php

namespace App\Models;

use Flight;

class VarieteTheModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllVarieteTheModel() {
        $query = "SELECT * FROM varieteThe";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getVarieteTheModelById($id) {
        $query = "SELECT * FROM varieteThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addVarieteTheModel($img, $occupation, $prixVente, $nom, $rendement) {
        $query = "INSERT INTO varieteThe (img, occupation, prixVente, nom, rendement) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $img);
        $stmt->bindParam(2, $occupation);
        $stmt->bindParam(3, $prixVente);
        $stmt->bindParam(4, $nom);
        $stmt->bindParam(5, $rendement);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateVarieteTheModel($id, $img, $occupation, $prixVente, $nom, $rendement) {
        $query = "UPDATE varieteThe SET img = ?, occupation = ?, prixVente = ?, nom = ?, rendement = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $img);
        $stmt->bindParam(2, $occupation);
        $stmt->bindParam(3, $prixVente);
        $stmt->bindParam(4, $nom);
        $stmt->bindParam(5, $rendement);
        $stmt->bindParam(6, $id);
        return $stmt->execute();
    }

    public function deleteVarieteTheModel($id) {
        $query = "DELETE FROM varieteThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM varieteThe";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM varieteThe WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM varieteThe WHERE img LIKE ? OR occupation LIKE ? OR prixVente LIKE ? OR id LIKE ? OR nom LIKE ? OR rendement LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->bindParam(4, $keyword);
        $stmt->bindParam(5, $keyword);
        $stmt->bindParam(6, $keyword);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginate($limit, $offset) {
        $query = "SELECT * FROM varieteThe LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM varieteThe ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
