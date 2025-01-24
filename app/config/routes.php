<?php

use app\controllers\ApiExampleController;

use app\controllers\UserController;
use app\controllers\PropertyController;
use app\controllers\HomeController;
use app\controllers\AdminController;

use flight\Engine;
use flight\net\Router;
// use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$HomeController = new HomeController();
$UserController = new UserController();
$AdminController = new AdminController();
$router->get('/', [$UserController, 'accueil']);
$router->get('/register', [$UserController, 'goInscription']);
$router->get('/login', [$UserController, 'showLoginForm']);
$router->get('/deconnexion', [$UserController, 'logout']);

$router->post('/login', [$UserController, 'login']);
$router->post('/register', [$UserController, 'register']);

$router->get('/ajoutHabitation', [$AdminController,'goAjoutHabitation']);
$router->post('/ajoutHabitation', [$AdminController,'ajoutHabitation']);

$router->get('/loginAdmin', [$AdminController,'goLoginAdmin']);
$router->post('/loginAdmin', [$AdminController,'connectAdmin']);

$router->get('/modifier/@id', [$PropertyController, 'goModifierHabitation']);
$router->post('/modifier', [$PropertyController, 'modifierHabitation']);

$router->get('/supprimer/@id', [$PropertyController, 'supprimerHabitation']);
$router->get('/updateHabitation', [$AdminController,'goUpdateHabitation']);
$router->post('/updateHabitation', [$AdminController,'updateHabitation']);


$PropertyController = new PropertyController();
$router->get('/accueil', [$PropertyController, 'getAllProperty']);
$router->get('/detail/@id', [$PropertyController, 'detailProperty']);
$router->post('/reserve', [$PropertyController, 'reserveProperty']);
$router->get('/search', [$PropertyController, 'searchProperty']);
$router->get('/reservations', [$PropertyController, 'showReservations']);


// $AdminController = new AdminController();
$router->get('/hello-world/@name', function($name) {
	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
});

/*$router->group('/api', function() use ($router, $app) {
	$Api_Example_Controller = new ApiExampleController($app);
	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
});*/