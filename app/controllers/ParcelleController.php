<?php

namespace app\controllers;

use Flight;
use App\Models\ParcelleModel;

class ParcelleController {
    protected $parcelleModel;

    public function __construct() {
        $this->parcelleModel = new ParcelleModel(Flight::db());
    }

    public function getAllParcelleController() {
        $parcelles = $this->parcelleModel->getAllParcelleModel();
        Flight::render('parcelles', ['parcelles' => $parcelles]);
    }

    public function getParcelleControllerById($id) {
        $parcelle = $this->parcelleModel->getParcelleModelById($id);
        Flight::render('parcelle', ['parcelle' => $parcelle]);
    }

    public function addParcelleController() {
        $numero = $_POST['numero'];
        $surface = $_POST['surface'];
        $varieteTheId = $_POST['varieteTheId'];
        $this->parcelleModel->addParcelleModel($numero, $surface, $varieteTheId);
        Flight::redirect('/parcelles');
    }

    public function editParcelleController($id) {
        $parcelle = $this->parcelleModel->getParcelleModelById($id);
        Flight::render('edit_parcelle', ['parcelle' => $parcelle]);
    }

    public function updateParcelleController($id) {
        $numero = $_POST['numero'];
        $surface = $_POST['surface'];
        $varieteTheId = $_POST['varieteTheId'];
        $this->parcelleModel->updateParcelleModel($id, $numero, $surface, $varieteTheId);
        Flight::redirect('/parcelles');
    }

    public function deleteParcelleController($id) {
        $this->parcelleModel->deleteParcelleModel($id);
        Flight::redirect('/parcelles');
    }
    public function count() {
        $count = $this->parcelleModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->parcelleModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $parcelles = $this->parcelleModel->search($keyword);
        Flight::render('parcelles', ['parcelles' => $parcelles]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $parcelles = $this->parcelleModel->paginate($limit, $offset);
        Flight::render('parcelles', ['parcelles' => $parcelles]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $parcelles = $this->parcelleModel->orderBy($column, $direction);
        Flight::render('parcelles', ['parcelles' => $parcelles]);
    }

    public function getLastInsertedId() {
        $id = $this->parcelleModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
