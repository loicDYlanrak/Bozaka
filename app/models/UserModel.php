<?php

namespace App\Models;

use Flight;

class UserModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUserModel() {
        $query = "SELECT * FROM user";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserModelById($id) {
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getId($pwd, $nom, $email) {
        $query = "SELECT id FROM user WHERE pwd = ? AND nom = ? AND email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $email);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }

    
    public function getIdi($pwd, $email) {
        $query = "SELECT id FROM user WHERE pwd = ? AND email = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $email);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }

    public function getIdii( $pwd ,$nom) {
        $query = "SELECT id FROM user WHERE pwd = ? AND nom = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $nom);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }

    public function addUserModel($pwd, $nom, $email) {
        $query = "INSERT INTO user (pwd, nom, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $email);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateUserModel($id, $pwd, $nom, $email) {
        $query = "UPDATE user SET pwd = ?, nom = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function deleteUserModel($id) {
        $query = "DELETE FROM user WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function count() {
        $query = "SELECT COUNT(*) as total FROM user";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function exists($id) {
        $query = "SELECT COUNT(*) as total FROM user WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function search($keyword) {
        $query = "SELECT * FROM user WHERE id LIKE ? OR pwd LIKE ? OR nom LIKE ? OR email LIKE ?";
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
        $query = "SELECT * FROM user LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $limit, \PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function orderBy($column, $direction = 'ASC') {
        $query = "SELECT * FROM user ORDER BY " . $column . " " . $direction;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}
