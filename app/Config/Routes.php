<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

service('auth')->routes($routes);

//--WEB: SITE(General/Public):
//=============================================================================================
$routes->get('/', 'PageController::index');

//--WEB: ADMIN:
//=============================================================================================
$routes->group('admin', ["namespace" => "App\Controllers\admin"], function($routes){ //, 'filter'=>'mhzfilter:guest'

    //--Admin >> User Manage:
    $routes->group('', static function($routes){ //['filter'=>'mhzfilter:auth'], 
        $routes->get('user', 'UserController::index',['as'=>'admin.user']);
        // $routes->get('logout', 'AdminController::logoutHandler',['as'=>'admin.logout']);
        // $routes->get('profile', 'AdminController::profile',['as'=>'admin.profile']);
    });

    //--Admin >> Category Manage:
    $routes->group('', static function($routes){ //['filter'=>'mhzfilter:auth'], 
        $routes->get('category', 'CategoryController::index',['as'=>'admin.category']);
    });

    //--Admin >> Product Manage:
    $routes->get('product', 'ProductController::index');
});

//--API:
//=============================================================================================
$routes->group("api", ["namespace" => "App\Controllers\api"], function ($routes) {

    //--API >> Auth:
    //----------------------------------------------------------------------------------------

    $routes->get("test", "AuthController::test", ["filter" => "apiauth"]); // 

    $routes->get("invalid-access", "AuthController::accessDenied");

    // Post
    $routes->post("register", "AuthController::register");

    // Post
    $routes->post("login", "AuthController::login");

    // Get
    $routes->get("profile", "AuthController::profile", ["filter" => "apiauth"]);

    // Get
    $routes->get("logout", "AuthController::logout", ["filter" => "apiauth"]);
    // $routes->post('forgot', 'AuthController::forgot', ['filter' => 'apiauth']);
    // $routes->post('reset-password-email', 'Auth::resetPasswordViaEmail', ['filter' => 'isSignIn']);
    // $routes->post('reset-password-sms', 'Auth::resetPasswordViaSms', ['filter' => 'isSignIn']);
    // $routes->post('activate-account-email', 'Auth::activateAccountViaEmail', ['filter' => 'isSignIn']);
    // $routes->post('send-activate-email', 'Auth::sendActivateCodeViaEmail', ['filter' => 'isSignIn']);
    // $routes->post('activate-account-sms', 'Auth::activateAccountViaSms', ['filter' => 'isSignIn']);
    // $routes->post('send-activate-sms', 'Auth::sendActivateCodeViaSms', ['filter' => 'isSignIn']);


    //--API >> Product:
    //----------------------------------------------------------------------------------------
    // $routes->resource('product', ['controller' => '\App\Controllers\api\ProductController', "filter" => "apiauth"]);
    
    //--OR--
    // $routes->group('', static function($routes){
    //     $routes->resource('product', ['controller' => 'ProductController']);
    // });

    //--OR--
    $routes->resource('product', ['controller' => 'ProductController', "filter" => "apiauth"]);

    // --OR--
    // $routes->group('product', function ($routes) {
    //     $routes->get('/', '\App\Controllers\ProductController::index');
    //     $routes->get('/show', '\App\Controllers\ProductController::show');
    // });
});

//--WEB: GUEST / NOAUTH:
//=============================================================================================
//--Bacanya: 
//---Kalo mo masuk ke link 'Login' , maka ada filter 'guest'
//---di filter 'guest', ada rule: Klo Udah 'Loggedin', maka akan di arahkan ke link yg lain
// $routes->group('', ["namespace" => "App\Controllers", 'filter'=>'mhzfilter:guest'], function($routes){
//     $routes->get('login', 'AuthController::loginForm',['as'=>'login']);
    // $routes->post('login', 'AuthController::loginHandler',['as'=>'login.handler']);
    // $routes->match(['get', 'post'], 'register', 'AuthController::register', ['as'=>'register']);
    // $routes->match(['get', 'post'], 'login', 'User::login', ['filter' => 'noauth']);
    // $routes->get('forgot-password', 'AuthController::forgotForm',['as'=>'forgot']);
    // $routes->post('send-reset-password-link', 'AuthController::sendResetPasswordLink');
    // $routes->get('reset-password/(:any)', 'AuthController::resetPassword/$1',['as'=>'reset-password']);
// });


//--NOTES--
//-- Alternative for route without Routes/group 
// $routes->resource('api/product', ['controller' => '\App\Controllers\ProductController', "filter" => "apiauth"]);