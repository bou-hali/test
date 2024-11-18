<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Products;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Page d'accueil
$routes->get('/test', 'RouteController::index'); // Formulaire de sélection des stations
$routes->post("/station/resultat", 'RouteController::rechercherTrajet'); // Résultats des trajets


