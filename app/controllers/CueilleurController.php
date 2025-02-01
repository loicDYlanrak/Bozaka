<?php

namespace app\controllers;

use Flight;
use App\Models\CueilleurModel;

class CueilleurController {
    protected $cueilleurModel;

    public function __construct() {
        $this->cueilleurModel = new CueilleurModel(Flight::db());
    }

    public function getAllCueilleurController() {
        $cueilleurs = $this->cueilleurModel->getAllCueilleurModel();
        Flight::render('cueilleurs', ['cueilleurs' => $cueilleurs]);
    }

    public function getCueilleurControllerById($id) {
        $cueilleur = $this->cueilleurModel->getCueilleurModelById($id);
        Flight::render('cueilleur', ['cueilleur' => $cueilleur]);
    }

    public function addCueilleurController() {
        $dateNaissance = $_POST['dateNaissance'];
        $genre = $_POST['genre'];
        $nom = $_POST['nom'];
        $this->cueilleurModel->addCueilleurModel($dateNaissance, $genre, $nom);
        Flight::redirect('/cueilleurs');
    }

    public function editCueilleurController($id) {
        $cueilleur = $this->cueilleurModel->getCueilleurModelById($id);
        Flight::render('edit_cueilleur', ['cueilleur' => $cueilleur]);
    }

    public function updateCueilleurController($id) {
        $dateNaissance = $_POST['dateNaissance'];
        $genre = $_POST['genre'];
        $nom = $_POST['nom'];
        $this->cueilleurModel->updateCueilleurModel($id, $dateNaissance, $genre, $nom);
        Flight::redirect('/cueilleurs');
    }

    public function deleteCueilleurController($id) {
        $this->cueilleurModel->deleteCueilleurModel($id);
        Flight::redirect('/cueilleurs');
    }
    public function count() {
        $count = $this->cueilleurModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->cueilleurModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $cueilleurs = $this->cueilleurModel->search($keyword);
        Flight::render('cueilleurs', ['cueilleurs' => $cueilleurs]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $cueilleurs = $this->cueilleurModel->paginate($limit, $offset);
        Flight::render('cueilleurs', ['cueilleurs' => $cueilleurs]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $cueilleurs = $this->cueilleurModel->orderBy($column, $direction);
        Flight::render('cueilleurs', ['cueilleurs' => $cueilleurs]);
    }

    public function getLastInsertedId() {
        $id = $this->cueilleurModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
