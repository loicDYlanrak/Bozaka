<?php
use app\controllers\VarieteTheController;
use app\controllers\ParcelleController;
use app\controllers\CueilleurController;
use app\controllers\CategorieDepenseController;
use app\controllers\SalaireCueilleurController;
use app\controllers\CueilletteController;
use app\controllers\DepenseController;
use app\controllers\RegenerationTheController;
use app\controllers\ConfigurationController;
use app\controllers\PaiementCueilleurController;
use app\controllers\UserController;

use flight\Engine;
use flight\net\Router;

/**
 * @var Router $router
 * @var Engine $app
 */

$VarieteTheController = new VarieteTheController();
$ParcelleController = new ParcelleController();
$CueilleurController = new CueilleurController();
$CategorieDepenseController = new CategorieDepenseController();
$SalaireCueilleurController = new SalaireCueilleurController();
$CueilletteController = new CueilletteController();
$DepenseController = new DepenseController();
$RegenerationTheController = new RegenerationTheController();
$ConfigurationController = new ConfigurationController();
$PaiementCueilleurController = new PaiementCueilleurController();
$UserController = new UserController();


$router->get('/', [$UserController, 'showLogin']);
$router->post('/log', [$UserController, 'logUser']);
$router->post('/signup', [$UserController, 'signup']);


$router->get('/users', [$UserController, 'getAllUserController']);
$router->get('/users/@id', [$UserController, 'getUserControllerById']);
$router->get('/users/count', [$UserController, 'count']);
$router->get('/users/exists/@id', [$UserController, 'exists']);
$router->get('/users/search/@keyword', [$UserController, 'search']);
$router->get('/users/paginate/@limit/@offset', [$UserController, 'paginate']);
$router->get('/users/orderBy/@column/@direction', [$UserController, 'orderBy']);
$router->get('/users/lastInsertedId', [$UserController, 'getLastInsertedId']);
$router->post('/users/add', [$UserController, 'addUserController']);
$router->get('/users/edit/@id', [$UserController, 'editUserController']);
$router->post('/users/update/@id', [$UserController, 'updateUserController']);
$router->get('/users/delete/@id', [$UserController, 'deleteUserController']);
$router->get('/varietethes', [$VarieteTheController, 'getAllVarieteTheController']);
$router->get('/varietethes/@id', [$VarieteTheController, 'getVarieteTheControllerById']);
$router->get('/varietethes/count', [$VarieteTheController, 'count']);
$router->get('/varietethes/exists/@id', [$VarieteTheController, 'exists']);
$router->get('/varietethes/search/@keyword', [$VarieteTheController, 'search']);
$router->get('/varietethes/paginate/@limit/@offset', [$VarieteTheController, 'paginate']);
$router->get('/varietethes/orderBy/@column/@direction', [$VarieteTheController, 'orderBy']);
$router->get('/varietethes/lastInsertedId', [$VarieteTheController, 'getLastInsertedId']);
$router->post('/varietethes/add', [$VarieteTheController, 'addVarieteTheController']);
$router->get('/varietethes/edit/@id', [$VarieteTheController, 'editVarieteTheController']);
$router->post('/varietethes/update/@id', [$VarieteTheController, 'updateVarieteTheController']);
$router->get('/varietethes/delete/@id', [$VarieteTheController, 'deleteVarieteTheController']);

$router->get('/parcelles', [$ParcelleController, 'getAllParcelleController']);
$router->get('/parcelles/@id', [$ParcelleController, 'getParcelleControllerById']);
$router->get('/parcelles/count', [$ParcelleController, 'count']);
$router->get('/parcelles/exists/@id', [$ParcelleController, 'exists']);
$router->get('/parcelles/search/@keyword', [$ParcelleController, 'search']);
$router->get('/parcelles/paginate/@limit/@offset', [$ParcelleController, 'paginate']);
$router->get('/parcelles/orderBy/@column/@direction', [$ParcelleController, 'orderBy']);
$router->get('/parcelles/lastInsertedId', [$ParcelleController, 'getLastInsertedId']);
$router->post('/parcelles/add', [$ParcelleController, 'addParcelleController']);
$router->get('/parcelles/edit/@id', [$ParcelleController, 'editParcelleController']);
$router->post('/parcelles/update/@id', [$ParcelleController, 'updateParcelleController']);
$router->get('/parcelles/delete/@id', [$ParcelleController, 'deleteParcelleController']);

$router->get('/cueilleurs', [$CueilleurController, 'getAllCueilleurController']);
$router->get('/cueilleurs/@id', [$CueilleurController, 'getCueilleurControllerById']);
$router->get('/cueilleurs/count', [$CueilleurController, 'count']);
$router->get('/cueilleurs/exists/@id', [$CueilleurController, 'exists']);
$router->get('/cueilleurs/search/@keyword', [$CueilleurController, 'search']);
$router->get('/cueilleurs/paginate/@limit/@offset', [$CueilleurController, 'paginate']);
$router->get('/cueilleurs/orderBy/@column/@direction', [$CueilleurController, 'orderBy']);
$router->get('/cueilleurs/lastInsertedId', [$CueilleurController, 'getLastInsertedId']);
$router->post('/cueilleurs/add', [$CueilleurController, 'addCueilleurController']);
$router->get('/cueilleurs/edit/@id', [$CueilleurController, 'editCueilleurController']);
$router->post('/cueilleurs/update/@id', [$CueilleurController, 'updateCueilleurController']);
$router->get('/cueilleurs/delete/@id', [$CueilleurController, 'deleteCueilleurController']);

$router->get('/categoriedepenses', [$CategorieDepenseController, 'getAllCategorieDepenseController']);
$router->get('/categoriedepenses/@id', [$CategorieDepenseController, 'getCategorieDepenseControllerById']);
$router->get('/categoriedepenses/count', [$CategorieDepenseController, 'count']);
$router->get('/categoriedepenses/exists/@id', [$CategorieDepenseController, 'exists']);
$router->get('/categoriedepenses/search/@keyword', [$CategorieDepenseController, 'search']);
$router->get('/categoriedepenses/paginate/@limit/@offset', [$CategorieDepenseController, 'paginate']);
$router->get('/categoriedepenses/orderBy/@column/@direction', [$CategorieDepenseController, 'orderBy']);
$router->get('/categoriedepenses/lastInsertedId', [$CategorieDepenseController, 'getLastInsertedId']);
$router->post('/categoriedepenses/add', [$CategorieDepenseController, 'addCategorieDepenseController']);
$router->get('/categoriedepenses/edit/@id', [$CategorieDepenseController, 'editCategorieDepenseController']);
$router->post('/categoriedepenses/update/@id', [$CategorieDepenseController, 'updateCategorieDepenseController']);
$router->get('/categoriedepenses/delete/@id', [$CategorieDepenseController, 'deleteCategorieDepenseController']);

$router->get('/salairecueilleurs', [$SalaireCueilleurController, 'getAllSalaireCueilleurController']);
$router->get('/salairecueilleurs/@id', [$SalaireCueilleurController, 'getSalaireCueilleurControllerById']);
$router->get('/salairecueilleurs/count', [$SalaireCueilleurController, 'count']);
$router->get('/salairecueilleurs/exists/@id', [$SalaireCueilleurController, 'exists']);
$router->get('/salairecueilleurs/search/@keyword', [$SalaireCueilleurController, 'search']);
$router->get('/salairecueilleurs/paginate/@limit/@offset', [$SalaireCueilleurController, 'paginate']);
$router->get('/salairecueilleurs/orderBy/@column/@direction', [$SalaireCueilleurController, 'orderBy']);
$router->get('/salairecueilleurs/lastInsertedId', [$SalaireCueilleurController, 'getLastInsertedId']);
$router->post('/salairecueilleurs/add', [$SalaireCueilleurController, 'addSalaireCueilleurController']);
$router->get('/salairecueilleurs/edit/@id', [$SalaireCueilleurController, 'editSalaireCueilleurController']);
$router->post('/salairecueilleurs/update/@id', [$SalaireCueilleurController, 'updateSalaireCueilleurController']);
$router->get('/salairecueilleurs/delete/@id', [$SalaireCueilleurController, 'deleteSalaireCueilleurController']);

$router->get('/cueillettes', [$CueilletteController, 'getAllCueilletteController']);
$router->get('/cueillettes/@id', [$CueilletteController, 'getCueilletteControllerById']);
$router->get('/cueillettes/count', [$CueilletteController, 'count']);
$router->get('/cueillettes/exists/@id', [$CueilletteController, 'exists']);
$router->get('/cueillettes/search/@keyword', [$CueilletteController, 'search']);
$router->get('/cueillettes/paginate/@limit/@offset', [$CueilletteController, 'paginate']);
$router->get('/cueillettes/orderBy/@column/@direction', [$CueilletteController, 'orderBy']);
$router->get('/cueillettes/lastInsertedId', [$CueilletteController, 'getLastInsertedId']);
$router->post('/cueillettes/add', [$CueilletteController, 'addCueilletteController']);
$router->get('/cueillettes/edit/@id', [$CueilletteController, 'editCueilletteController']);
$router->post('/cueillettes/update/@id', [$CueilletteController, 'updateCueilletteController']);
$router->get('/cueillettes/delete/@id', [$CueilletteController, 'deleteCueilletteController']);

$router->get('/depenses', [$DepenseController, 'getAllDepenseController']);
$router->get('/depenses/@id', [$DepenseController, 'getDepenseControllerById']);
$router->get('/depenses/count', [$DepenseController, 'count']);
$router->get('/depenses/exists/@id', [$DepenseController, 'exists']);
$router->get('/depenses/search/@keyword', [$DepenseController, 'search']);
$router->get('/depenses/paginate/@limit/@offset', [$DepenseController, 'paginate']);
$router->get('/depenses/orderBy/@column/@direction', [$DepenseController, 'orderBy']);
$router->get('/depenses/lastInsertedId', [$DepenseController, 'getLastInsertedId']);
$router->post('/depenses/add', [$DepenseController, 'addDepenseController']);
$router->get('/depenses/edit/@id', [$DepenseController, 'editDepenseController']);
$router->post('/depenses/update/@id', [$DepenseController, 'updateDepenseController']);
$router->get('/depenses/delete/@id', [$DepenseController, 'deleteDepenseController']);

$router->get('/regenerationthes', [$RegenerationTheController, 'getAllRegenerationTheController']);
$router->get('/regenerationthes/@id', [$RegenerationTheController, 'getRegenerationTheControllerById']);
$router->get('/regenerationthes/count', [$RegenerationTheController, 'count']);
$router->get('/regenerationthes/exists/@id', [$RegenerationTheController, 'exists']);
$router->get('/regenerationthes/search/@keyword', [$RegenerationTheController, 'search']);
$router->get('/regenerationthes/paginate/@limit/@offset', [$RegenerationTheController, 'paginate']);
$router->get('/regenerationthes/orderBy/@column/@direction', [$RegenerationTheController, 'orderBy']);
$router->get('/regenerationthes/lastInsertedId', [$RegenerationTheController, 'getLastInsertedId']);
$router->post('/regenerationthes/add', [$RegenerationTheController, 'addRegenerationTheController']);
$router->get('/regenerationthes/edit/@id', [$RegenerationTheController, 'editRegenerationTheController']);
$router->post('/regenerationthes/update/@id', [$RegenerationTheController, 'updateRegenerationTheController']);
$router->get('/regenerationthes/delete/@id', [$RegenerationTheController, 'deleteRegenerationTheController']);

$router->get('/configurations', [$ConfigurationController, 'getAllConfigurationController']);
$router->get('/configurations/@id', [$ConfigurationController, 'getConfigurationControllerById']);
$router->get('/configurations/count', [$ConfigurationController, 'count']);
$router->get('/configurations/exists/@id', [$ConfigurationController, 'exists']);
$router->get('/configurations/search/@keyword', [$ConfigurationController, 'search']);
$router->get('/configurations/paginate/@limit/@offset', [$ConfigurationController, 'paginate']);
$router->get('/configurations/orderBy/@column/@direction', [$ConfigurationController, 'orderBy']);
$router->get('/configurations/lastInsertedId', [$ConfigurationController, 'getLastInsertedId']);
$router->post('/configurations/add', [$ConfigurationController, 'addConfigurationController']);
$router->get('/configurations/edit/@id', [$ConfigurationController, 'editConfigurationController']);
$router->post('/configurations/update/@id', [$ConfigurationController, 'updateConfigurationController']);
$router->get('/configurations/delete/@id', [$ConfigurationController, 'deleteConfigurationController']);

$router->get('/paiementcueilleurs', [$PaiementCueilleurController, 'getAllPaiementCueilleurController']);
$router->get('/paiementcueilleurs/@id', [$PaiementCueilleurController, 'getPaiementCueilleurControllerById']);
$router->get('/paiementcueilleurs/count', [$PaiementCueilleurController, 'count']);
$router->get('/paiementcueilleurs/exists/@id', [$PaiementCueilleurController, 'exists']);
$router->get('/paiementcueilleurs/search/@keyword', [$PaiementCueilleurController, 'search']);
$router->get('/paiementcueilleurs/paginate/@limit/@offset', [$PaiementCueilleurController, 'paginate']);
$router->get('/paiementcueilleurs/orderBy/@column/@direction', [$PaiementCueilleurController, 'orderBy']);
$router->get('/paiementcueilleurs/lastInsertedId', [$PaiementCueilleurController, 'getLastInsertedId']);
$router->post('/paiementcueilleurs/add', [$PaiementCueilleurController, 'addPaiementCueilleurController']);
$router->get('/paiementcueilleurs/edit/@id', [$PaiementCueilleurController, 'editPaiementCueilleurController']);
$router->post('/paiementcueilleurs/update/@id', [$PaiementCueilleurController, 'updatePaiementCueilleurController']);
$router->get('/paiementcueilleurs/delete/@id', [$PaiementCueilleurController, 'deletePaiementCueilleurController']);

/*$router->group('/api', function() use ($router, $app) {
	$Api_Example_Controller = new ApiExampleController($app);
	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
});*/