<?php

namespace app\controllers;

use Flight;
use App\Models\RegenerationTheModel;

class RegenerationTheController {
    protected $regenerationTheModel;

    public function __construct() {
        $this->regenerationTheModel = new RegenerationTheModel(Flight::db());
    }

    public function getAllRegenerationTheController() {
        $regenerationThes = $this->regenerationTheModel->getAllRegenerationTheModel();
        Flight::render('regenerationThes', ['regenerationThes' => $regenerationThes]);
    }

    public function getRegenerationTheControllerById($id) {
        $regenerationThe = $this->regenerationTheModel->getRegenerationTheModelById($id);
        Flight::render('regenerationThe', ['regenerationThe' => $regenerationThe]);
    }

    public function addRegenerationTheController() {
        $mois = $_POST['mois'];
        $this->regenerationTheModel->addRegenerationTheModel($mois);
        Flight::redirect('/regenerationThes');
    }

    public function editRegenerationTheController($id) {
        $regenerationThe = $this->regenerationTheModel->getRegenerationTheModelById($id);
        Flight::render('edit_regenerationThe', ['regenerationThe' => $regenerationThe]);
    }

    public function updateRegenerationTheController($id) {
        $mois = $_POST['mois'];
        $this->regenerationTheModel->updateRegenerationTheModel($id, $mois);
        Flight::redirect('/regenerationThes');
    }

    public function deleteRegenerationTheController($id) {
        $this->regenerationTheModel->deleteRegenerationTheModel($id);
        Flight::redirect('/regenerationThes');
    }
    public function count() {
        $count = $this->regenerationTheModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->regenerationTheModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $regenerationThes = $this->regenerationTheModel->search($keyword);
        Flight::render('regenerationThes', ['regenerationThes' => $regenerationThes]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $regenerationThes = $this->regenerationTheModel->paginate($limit, $offset);
        Flight::render('regenerationThes', ['regenerationThes' => $regenerationThes]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $regenerationThes = $this->regenerationTheModel->orderBy($column, $direction);
        Flight::render('regenerationThes', ['regenerationThes' => $regenerationThes]);
    }

    public function getLastInsertedId() {
        $id = $this->regenerationTheModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
