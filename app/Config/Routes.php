<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('app/mission/(:num)'                   , 'App::mission/$1');
$routes->get('app/missionform'                      , 'App::missionform');
$routes->get('app/missionform/(:num)'               , 'App::missionform/$1');
$routes->get('app/missiontargetform/(:num)'         , 'App::missiontargetform/$1');
$routes->get('app/missiontargetform/(:num)/(:num)'  , 'App::missiontargetform/$1/$2');
$routes->get('app/mediaform/(:num)'                 , 'App::mediaform/$1');
$routes->get('app/mediaform/(:num)/(:num)'          , 'App::mediaform/$1/$2');
$routes->get('app/imageresize/(:num)'               , 'App::imageresize/$1');
$routes->get('app/devices'                          , 'App::devices');


//SPECIAL ROUTES
$routes->get('api/mission/kml',                     'Api\Mission::kml');
$routes->get('api/gpslog/kml/(:num)',               'Api\Gpslog::kml/$1');
$routes->get('api/missiontarget/kml/(:num)',        'Api\Missiontarget::kml/$1');
$routes->get('api/missiontarget/mission/(:num)',    'Api\Missiontarget::mission/$1');
$routes->post('api/media/upload/(:num)',            'Api\Media::upload/$1');
$routes->get('api/media/mission/(:num)',            'Api\Media::mission/$1');

//RESTAPI ROUTING
$routes->resource('api/mission',                    ['controller' => 'Api\Mission']);
$routes->resource('api/missiontarget',              ['controller' => 'Api\Missiontarget']);
$routes->resource('api/gpslog',                     ['controller'  => 'Api\Gpslog']);
$routes->resource('api/media',                      ['controller'  => 'Api\Media']);


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
