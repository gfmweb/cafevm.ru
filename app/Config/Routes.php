<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Admin;
use App\Controllers\SERVICE\YandexReviews;

$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/actions', 'ActionsController::index');
$routes->get('/actions/(:any)', 'ActionsController::reception');
$routes->get('/lk','Home::lk');
$routes->post('/register','Home::register');
$routes->post('/getInfo','Home::getInfo');
$routes->post('/bookingTable','BookingTableController::siteBooking');
$routes->post('/messageInfo','InfoMessageController::siteMessage');
$routes->get('/test', 'TELEGA\GroupBot::index');
$routes->post('/StaffIncome','TELEGA\IncomeStaff::index');
$routes->post('/ClientIncome','TELEGA\IncomeClients::index');
$routes->post('/addBonus','TELEGA\StaffWeb::getDiskont');
$routes->get('/test','TELEGA\TelegramController::index');
$routes->get('/staffTelega','TELEGA\StaffWeb::index');
$routes->post('/getUserQr','Home::getUserQR');
$routes->get('/admin/lk','Admin::index',['filter'=>'adminAuth']);
$routes->get('/admin/logout','Admin::logout');
$routes->get('/admin/login','Admin::login_view');
$routes->post('/admin/login','Admin::login');
$routes->get('/admin/lk/startaction','Admin::startAction',['filter'=>'adminAuth']);
$routes->get('/admin/lk/check','Admin::check',['filter'=>'adminAuth']);
$routes->post('/admin/changePassword','Admin::changePassword',['filter'=>'adminAuth']);

$routes->get('/sap','TELEGA\StaffWeb::index');
$routes->get('/skazka','SERVICE\YandexReviews::index');
$routes->get('/sk','SERVICE\YandexReviews::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
