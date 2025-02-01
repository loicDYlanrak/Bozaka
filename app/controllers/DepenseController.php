<?php

namespace app\controllers;

use Flight;
use App\Models\DepenseModel;

class DepenseController {
    protected $depenseModel;

    public function __construct() {
        $this->depenseModel = new DepenseModel(Flight::db());
    }

    public function getAllDepenseController() {
        $depenses = $this->depenseModel->getAllDepenseModel();
        Flight::render('depenses', ['depenses' => $depenses]);
    }

    public function getDepenseControllerById($id) {
        $depense = $this->depenseModel->getDepenseModelById($id);
        Flight::render('depense', ['depense' => $depense]);
    }

    public function addDepenseController() {
        $date = $_POST['date'];
        $categorieDepenseId = $_POST['categorieDepenseId'];
        $montant = $_POST['montant'];
        $this->depenseModel->addDepenseModel($date, $categorieDepenseId, $montant);
        Flight::redirect('/depenses');
    }

    public function editDepenseController($id) {
        $depense = $this->depenseModel->getDepenseModelById($id);
        Flight::render('edit_depense', ['depense' => $depense]);
    }

    public function updateDepenseController($id) {
        $date = $_POST['date'];
        $categorieDepenseId = $_POST['categorieDepenseId'];
        $montant = $_POST['montant'];
        $this->depenseModel->updateDepenseModel($id, $date, $categorieDepenseId, $montant);
        Flight::redirect('/depenses');
    }

    public function deleteDepenseController($id) {
        $this->depenseModel->deleteDepenseModel($id);
        Flight::redirect('/depenses');
    }
    public function count() {
        $count = $this->depenseModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->depenseModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $depenses = $this->depenseModel->search($keyword);
        Flight::render('depenses', ['depenses' => $depenses]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $depenses = $this->depenseModel->paginate($limit, $offset);
        Flight::render('depenses', ['depenses' => $depenses]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $depenses = $this->depenseModel->orderBy($column, $direction);
        Flight::render('depenses', ['depenses' => $depenses]);
    }

    public function getLastInsertedId() {
        $id = $this->depenseModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
