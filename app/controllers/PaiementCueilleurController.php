<?php

namespace app\controllers;

use Flight;
use App\Models\PaiementCueilleurModel;

class PaiementCueilleurController {
    protected $paiementCueilleurModel;

    public function __construct() {
        $this->paiementCueilleurModel = new PaiementCueilleurModel(Flight::db());
    }

    public function getAllPaiementCueilleurController() {
        $paiementCueilleurs = $this->paiementCueilleurModel->getAllPaiementCueilleurModel();
        Flight::render('paiementCueilleurs', ['paiementCueilleurs' => $paiementCueilleurs]);
    }

    public function getPaiementCueilleurControllerById($id) {
        $paiementCueilleur = $this->paiementCueilleurModel->getPaiementCueilleurModelById($id);
        Flight::render('paiementCueilleur', ['paiementCueilleur' => $paiementCueilleur]);
    }

    public function addPaiementCueilleurController() {
        $date = $_POST['date'];
        $poidsTotal = $_POST['poidsTotal'];
        $bonus = $_POST['bonus'];
        $cueilleurId = $_POST['cueilleurId'];
        $malus = $_POST['malus'];
        $montantPaiement = $_POST['montantPaiement'];
        $this->paiementCueilleurModel->addPaiementCueilleurModel($date, $poidsTotal, $bonus, $cueilleurId, $malus, $montantPaiement);
        Flight::redirect('/paiementCueilleurs');
    }

    public function editPaiementCueilleurController($id) {
        $paiementCueilleur = $this->paiementCueilleurModel->getPaiementCueilleurModelById($id);
        Flight::render('edit_paiementCueilleur', ['paiementCueilleur' => $paiementCueilleur]);
    }

    public function updatePaiementCueilleurController($id) {
        $date = $_POST['date'];
        $poidsTotal = $_POST['poidsTotal'];
        $bonus = $_POST['bonus'];
        $cueilleurId = $_POST['cueilleurId'];
        $malus = $_POST['malus'];
        $montantPaiement = $_POST['montantPaiement'];
        $this->paiementCueilleurModel->updatePaiementCueilleurModel($id, $date, $poidsTotal, $bonus, $cueilleurId, $malus, $montantPaiement);
        Flight::redirect('/paiementCueilleurs');
    }

    public function deletePaiementCueilleurController($id) {
        $this->paiementCueilleurModel->deletePaiementCueilleurModel($id);
        Flight::redirect('/paiementCueilleurs');
    }
    public function count() {
        $count = $this->paiementCueilleurModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->paiementCueilleurModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $paiementCueilleurs = $this->paiementCueilleurModel->search($keyword);
        Flight::render('paiementCueilleurs', ['paiementCueilleurs' => $paiementCueilleurs]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $paiementCueilleurs = $this->paiementCueilleurModel->paginate($limit, $offset);
        Flight::render('paiementCueilleurs', ['paiementCueilleurs' => $paiementCueilleurs]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $paiementCueilleurs = $this->paiementCueilleurModel->orderBy($column, $direction);
        Flight::render('paiementCueilleurs', ['paiementCueilleurs' => $paiementCueilleurs]);
    }

    public function getLastInsertedId() {
        $id = $this->paiementCueilleurModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
