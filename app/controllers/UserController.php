<?php

namespace app\controllers;

use Flight;
use App\Models\UserModel;

class UserController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel(Flight::db());
    }

    public function showLogin() {
        Flight::render('login');
    }

    public function logUser() {
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $userCat = $_POST['userCat'];

        if ($userCat=="user") {
            $id=$this->userModel->getIdi($pwd, $email);
            $ex= $this->userModel->exists($id);
            if ($ex == true) {
                Flight::render('accueil');
            } else {
                Flight::render('login', ['message' => 'Identifiant de l utilisateur incorrect']);
            }
        } else {
            $id=$this->userModel->getIdii($pwd,"admin");
            $ex= $this->userModel->exists($id);
            if ($ex == true) {
                Flight::render('admin');
            } else {
                Flight::render('login', ['message' => 'Identifiant de administrateur incorrect']);
            }
        }
    }

    public function signup() {
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $this->userModel->addUserModel($pwd,$nom,$email);

        Flight::render('login',['message' => 'inscription effectuer']);
    }

    public function getAllUserController() {
        $users = $this->userModel->getAllUserModel();
        Flight::render('users', ['users' => $users]);
    }

    public function getUserControllerById($id) {
        $user = $this->userModel->getUserModelById($id);
        Flight::render('user', ['user' => $user]);
    }

    public function addUserController() {
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $this->userModel->addUserModel($pwd, $nom, $email);
        Flight::redirect('/users');
    }

    public function editUserController($id) {
        $user = $this->userModel->getUserModelById($id);
        Flight::render('edit_user', ['user' => $user]);
    }

    public function updateUserController($id) {
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $this->userModel->updateUserModel($id, $pwd, $nom, $email);
        Flight::redirect('/users');
    }

    public function deleteUserController($id) {
        $this->userModel->deleteUserModel($id);
        Flight::redirect('/users');
    }
    public function count() {
        $count = $this->userModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->userModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $users = $this->userModel->search($keyword);
        Flight::render('users', ['users' => $users]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $users = $this->userModel->paginate($limit, $offset);
        Flight::render('users', ['users' => $users]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $users = $this->userModel->orderBy($column, $direction);
        Flight::render('users', ['users' => $users]);
    }

    public function getLastInsertedId() {
        $id = $this->userModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
