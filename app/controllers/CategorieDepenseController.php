<?php

namespace app\controllers;

use Flight;
use App\Models\CategorieDepenseModel;

class CategorieDepenseController {
    protected $categorieDepenseModel;

    public function __construct() {
        $this->categorieDepenseModel = new CategorieDepenseModel(Flight::db());
    }

    public function getAllCategorieDepenseController() {
        $categorieDepenses = $this->categorieDepenseModel->getAllCategorieDepenseModel();
        Flight::render('categorieDepenses', ['categorieDepenses' => $categorieDepenses]);
    }

    public function getCategorieDepenseControllerById($id) {
        $categorieDepense = $this->categorieDepenseModel->getCategorieDepenseModelById($id);
        Flight::render('categorieDepense', ['categorieDepense' => $categorieDepense]);
    }

    public function addCategorieDepenseController() {
        $nom = $_POST['nom'];
        $this->categorieDepenseModel->addCategorieDepenseModel($nom);
        Flight::redirect('/categorieDepenses');
    }

    public function editCategorieDepenseController($id) {
        $categorieDepense = $this->categorieDepenseModel->getCategorieDepenseModelById($id);
        Flight::render('edit_categorieDepense', ['categorieDepense' => $categorieDepense]);
    }

    public function updateCategorieDepenseController($id) {
        $nom = $_POST['nom'];
        $this->categorieDepenseModel->updateCategorieDepenseModel($id, $nom);
        Flight::redirect('/categorieDepenses');
    }

    public function deleteCategorieDepenseController($id) {
        $this->categorieDepenseModel->deleteCategorieDepenseModel($id);
        Flight::redirect('/categorieDepenses');
    }
    public function count() {
        $count = $this->categorieDepenseModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->categorieDepenseModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $categorieDepenses = $this->categorieDepenseModel->search($keyword);
        Flight::render('categorieDepenses', ['categorieDepenses' => $categorieDepenses]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $categorieDepenses = $this->categorieDepenseModel->paginate($limit, $offset);
        Flight::render('categorieDepenses', ['categorieDepenses' => $categorieDepenses]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $categorieDepenses = $this->categorieDepenseModel->orderBy($column, $direction);
        Flight::render('categorieDepenses', ['categorieDepenses' => $categorieDepenses]);
    }

    public function getLastInsertedId() {
        $id = $this->categorieDepenseModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
