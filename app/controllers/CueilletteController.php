<?php

namespace app\controllers;

use Flight;
use App\Models\CueilletteModel;

class CueilletteController {
    protected $cueilletteModel;

    public function __construct() {
        $this->cueilletteModel = new CueilletteModel(Flight::db());
    }

    public function getAllCueilletteController() {
        $cueillettes = $this->cueilletteModel->getAllCueilletteModel();
        Flight::render('cueillettes', ['cueillettes' => $cueillettes]);
    }

    public function getCueilletteControllerById($id) {
        $cueillette = $this->cueilletteModel->getCueilletteModelById($id);
        Flight::render('cueillette', ['cueillette' => $cueillette]);
    }

    public function addCueilletteController() {
        $date = $_POST['date'];
        $parcelleId = $_POST['parcelleId'];
        $poids = $_POST['poids'];
        $cueilleurId = $_POST['cueilleurId'];
        $this->cueilletteModel->addCueilletteModel($date, $parcelleId, $poids, $cueilleurId);
        Flight::redirect('/cueillettes');
    }

    public function editCueilletteController($id) {
        $cueillette = $this->cueilletteModel->getCueilletteModelById($id);
        Flight::render('edit_cueillette', ['cueillette' => $cueillette]);
    }

    public function updateCueilletteController($id) {
        $date = $_POST['date'];
        $parcelleId = $_POST['parcelleId'];
        $poids = $_POST['poids'];
        $cueilleurId = $_POST['cueilleurId'];
        $this->cueilletteModel->updateCueilletteModel($id, $date, $parcelleId, $poids, $cueilleurId);
        Flight::redirect('/cueillettes');
    }

    public function deleteCueilletteController($id) {
        $this->cueilletteModel->deleteCueilletteModel($id);
        Flight::redirect('/cueillettes');
    }
    public function count() {
        $count = $this->cueilletteModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->cueilletteModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $cueillettes = $this->cueilletteModel->search($keyword);
        Flight::render('cueillettes', ['cueillettes' => $cueillettes]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $cueillettes = $this->cueilletteModel->paginate($limit, $offset);
        Flight::render('cueillettes', ['cueillettes' => $cueillettes]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $cueillettes = $this->cueilletteModel->orderBy($column, $direction);
        Flight::render('cueillettes', ['cueillettes' => $cueillettes]);
    }

    public function getLastInsertedId() {
        $id = $this->cueilletteModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
