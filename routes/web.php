<?php
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

$adminRoute = config('tukecx.admin_route');

$moduleRoute = 'files';

/**
 * Admin routes
 */
Route::group([
    'prefix' => $adminRoute . '/' . $moduleRoute,
    'middleware' => 'has-permission:view-files,upload-files,edit-files,delete-files'
], function (Router $router) use ($adminRoute, $moduleRoute) {
    $router->get('', 'ElfinderController@getIndex')
        ->name('admin::elfinder.index.get');

    $router->get('/stand-alone', 'ElfinderController@getStandAlone')
        ->name('admin::elfinder.stand-alone.get');

    $router->get('/elfinder-view', 'ElfinderController@getElfinderView')
        ->name('admin::elfinder.popup.get');

    $router->any('/connector', 'ElfinderController@anyConnector')
        ->name('admin::elfinder.connect');
});
