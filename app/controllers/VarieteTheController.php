<?php

namespace app\controllers;

use Flight;
use App\Models\VarieteTheModel;

class VarieteTheController {
    protected $varieteTheModel;

    public function __construct() {
        $this->varieteTheModel = new VarieteTheModel(Flight::db());
    }

    public function getAllVarieteTheController() {
        $varieteThes = $this->varieteTheModel->getAllVarieteTheModel();
        Flight::render('varieteThes', ['varieteThes' => $varieteThes]);
    }

    public function getVarieteTheControllerById($id) {
        $varieteThe = $this->varieteTheModel->getVarieteTheModelById($id);
        Flight::render('varieteThe', ['varieteThe' => $varieteThe]);
    }

    public function addVarieteTheController() {
        $img = $_POST['img'];
        $occupation = $_POST['occupation'];
        $prixVente = $_POST['prixVente'];
        $nom = $_POST['nom'];
        $rendement = $_POST['rendement'];
        $this->varieteTheModel->addVarieteTheModel($img, $occupation, $prixVente, $nom, $rendement);
        Flight::redirect('/varieteThes');
    }

    public function editVarieteTheController($id) {
        $varieteThe = $this->varieteTheModel->getVarieteTheModelById($id);
        Flight::render('edit_varieteThe', ['varieteThe' => $varieteThe]);
    }

    public function updateVarieteTheController($id) {
        $img = $_POST['img'];
        $occupation = $_POST['occupation'];
        $prixVente = $_POST['prixVente'];
        $nom = $_POST['nom'];
        $rendement = $_POST['rendement'];
        $this->varieteTheModel->updateVarieteTheModel($id, $img, $occupation, $prixVente, $nom, $rendement);
        Flight::redirect('/varieteThes');
    }

    public function deleteVarieteTheController($id) {
        $this->varieteTheModel->deleteVarieteTheModel($id);
        Flight::redirect('/varieteThes');
    }
    public function count() {
        $count = $this->varieteTheModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->varieteTheModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $varieteThes = $this->varieteTheModel->search($keyword);
        Flight::render('varieteThes', ['varieteThes' => $varieteThes]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $varieteThes = $this->varieteTheModel->paginate($limit, $offset);
        Flight::render('varieteThes', ['varieteThes' => $varieteThes]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $varieteThes = $this->varieteTheModel->orderBy($column, $direction);
        Flight::render('varieteThes', ['varieteThes' => $varieteThes]);
    }

    public function getLastInsertedId() {
        $id = $this->varieteTheModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
