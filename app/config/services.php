<?php

use flight\Engine;
use flight\database\PdoWrapper;
use flight\debug\database\PdoQueryCapture;
use Tracy\Debugger;

/**
 * @var array $config This comes from the returned array at the bottom of the config.php file
 * @var Engine $app
 */

// Définir le DSN pour MySQL
$dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8mb4';

// Vous pouvez utiliser SQLite si nécessaire (décommentez la ligne suivante)
 // $dsn = 'sqlite:' . $config['database']['file_path'];

// En fonction de l'environnement, utiliser un wrapper de base de données ou un débogueur de requêtes
$pdoClass = Debugger::$showBar === true ? PdoQueryCapture::class : PdoWrapper::class;

// Enregistrer le service 'db' avec la connexion PDO
$app->register('db', $pdoClass, [$dsn, $config['database']['user'] ?? null, $config['database']['password'] ?? null]);

// Vous pouvez aussi enregistrer d'autres services ici (par exemple, Redis, Google OAuth, etc.)
