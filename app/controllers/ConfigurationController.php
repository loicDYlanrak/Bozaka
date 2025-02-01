<?php

namespace app\controllers;

use Flight;
use App\Models\ConfigurationModel;

class ConfigurationController {
    protected $configurationModel;

    public function __construct() {
        $this->configurationModel = new ConfigurationModel(Flight::db());
    }

    public function getAllConfigurationController() {
        $configurations = $this->configurationModel->getAllConfigurationModel();
        Flight::render('configurations', ['configurations' => $configurations]);
    }

    public function getConfigurationControllerById($id) {
        $configuration = $this->configurationModel->getConfigurationModelById($id);
        Flight::render('configuration', ['configuration' => $configuration]);
    }

    public function addConfigurationController() {
        $poidsMinimalJournalier = $_POST['poidsMinimalJournalier'];
        $bonus = $_POST['bonus'];
        $malus = $_POST['malus'];
        $this->configurationModel->addConfigurationModel($poidsMinimalJournalier, $bonus, $malus);
        Flight::redirect('/configurations');
    }

    public function editConfigurationController($id) {
        $configuration = $this->configurationModel->getConfigurationModelById($id);
        Flight::render('edit_configuration', ['configuration' => $configuration]);
    }

    public function updateConfigurationController($id) {
        $poidsMinimalJournalier = $_POST['poidsMinimalJournalier'];
        $bonus = $_POST['bonus'];
        $malus = $_POST['malus'];
        $this->configurationModel->updateConfigurationModel($id, $poidsMinimalJournalier, $bonus, $malus);
        Flight::redirect('/configurations');
    }

    public function deleteConfigurationController($id) {
        $this->configurationModel->deleteConfigurationModel($id);
        Flight::redirect('/configurations');
    }
    public function count() {
        $count = $this->configurationModel->count();
        Flight::json(['count' => $count]);
    }

    public function exists($id) {
        $exists = $this->configurationModel->exists($id);
        Flight::json(['exists' => $exists]);
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $configurations = $this->configurationModel->search($keyword);
        Flight::render('configurations', ['configurations' => $configurations]);
    }

    public function paginate() {
        $limit = $_GET['limit'] ?? 10;
        $offset = $_GET['offset'] ?? 0;
        $configurations = $this->configurationModel->paginate($limit, $offset);
        Flight::render('configurations', ['configurations' => $configurations]);
    }

    public function orderBy() {
        $column = $_GET['column'] ?? 'id';
        $direction = $_GET['direction'] ?? 'ASC';
        $configurations = $this->configurationModel->orderBy($column, $direction);
        Flight::render('configurations', ['configurations' => $configurations]);
    }

    public function getLastInsertedId() {
        $id = $this->configurationModel->getLastInsertedId();
        Flight::json(['lastInsertedId' => $id]);
    }
}
