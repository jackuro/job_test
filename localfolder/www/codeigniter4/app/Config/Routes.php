<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


// CRUD RESTful branch Routes
$routes->get('branch-list', 'BranchCrud::index');
$routes->get('branch-form', 'BranchCrud::create');
$routes->post('submit-form', 'BranchCrud::store');
$routes->get('edit-view/(:num)', 'BranchCrud::singleBranch/$1');
$routes->post('update', 'BranchCrud::update');
$routes->get('delete/(:num)', 'BranchCrud::delete/$1');

// CRUD RESTful client Routes
$routes->get('client-list', 'ClientCrud::index');
$routes->get('client-form', 'ClientCrud::createClient');
$routes->post('submit-form-client', 'ClientCrud::storeClient');
$routes->get('client-view/(:num)', 'ClientCrud::singleClient/$1');
$routes->post('update-client', 'ClientCrud::updateClient');
$routes->get('delete-client/(:num)', 'ClientCrud::deleteClient/$1');

$routes->get('transfer-balance', 'ClientCrud::transferBalance');
$routes->post('update-client-balance', 'ClientCrud::updateClientBalance');

$routes->get('branch-report1', 'ReportCrud::index');
$routes->get('branch-report2', 'ReportCrud::report');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
