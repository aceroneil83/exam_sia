<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});




//<-- get all books

$router->get('/books',['uses' => 'UserController@get']); //get all books

$router->get('/books', 'UserController@index'); //<-- get all books

$router->get('/getbook/{id}', 'UserController@getID'); // get books by id

$router->post('/addbook', 'UserController@add'); // create a new book

$router->patch('/updatebook/{id}', 'UserController@update'); // Update book record based on book id 

$router->delete('/deletebook/{id}', 'UserController@delete'); // Delete book record based on book id

// userjob routes
$router->get('/usersjob','UserJobController@index');
$router->get('/userjob/{id}','UserJobController@show'); // get user by id
$router->get('/userjobs','UserJobController@get'); // get user by id