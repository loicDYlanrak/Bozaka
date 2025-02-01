<?php

namespace app\controllers;

use Flight;
use App\Models\SalaireCueilleurModel;

class SalaireCueilleurController {
    protected $salaireCueilleurModel;

    public function __construct() {
        $this->salaireCueilleurModel = new SalaireCueilleurModel(Flight::db());
    }

    public function getAllSalaireCueilleurController() {
        $salaireCueilleurs = $this->salaireCueilleurModel->getAllSalaireCueilleurModel();
        Flight::render('salaireCueilleurs', ['salaireCueilleurs' => $salaireCueilleurs]);
    }

    public function getSalaireCueilleurControllerById($id) {
        $salaireCueilleur = $this->salaireCueilleurModel->getSalaireCueilleurModelById($id);
        Flight::render('salaireCueilleur', ['salaireCueilleur' => $salaireCueilleur]);
    }

    public function addSalaireCueilleurController() {
        $montantParKg = $_POST['montantParKg'];
        $this->salaireCueilleurModel->addSalaireCueilleurModel($montantParKg);
        Flight::redirect('/salaireCueilleurs');
    }

    public function editSalaireCueilleurController($id) {
        $salaireCueilleur = $this->salaireCueilleurModel->getSalaireCueilleurModelById($id);
        Flight::render('edit_salaireCueilleur', ['salaireCueilleur' => $salaireCueilleur]);
    }

    public function updateSalaireCueilleurController($id) {
        $montantParKg = $_POST['montantParKg'];
        $this->salaireCueilleurModel->updateSalaireCueilleurModel($id, $montantParKg);
        Flight::redirect('/salaireCueilleurs');
    }

    public function deleteSalaireCueilleurController($id) {
        $this->salaireCueilleurModel->deleteSalaireCueilleurModel($id);
        Flight::redirect('/salaireCueilleurs');
    }
    public function count() {
        $count = $this->salaireCueilleurModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->salaireCueilleurModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $salaireCueilleurs = $this->salaireCueilleurModel->search($keyword);
        Flight::render('salaireCueilleurs', ['salaireCueilleurs' => $salaireCueilleurs]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $salaireCueilleurs = $this->salaireCueilleurModel->paginate($limit, $offset);
        Flight::render('salaireCueilleurs', ['salaireCueilleurs' => $salaireCueilleurs]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $salaireCueilleurs = $this->salaireCueilleurModel->orderBy($column, $direction);
        Flight::render('salaireCueilleurs', ['salaireCueilleurs' => $salaireCueilleurs]);
    }

    public function getLastInsertedId() {
        $id = $this->salaireCueilleurModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
