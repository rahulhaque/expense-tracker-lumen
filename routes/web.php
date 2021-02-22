<?php

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
    return 'Server is running! 🙂';
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->post('/auth/login', 'AuthController@login');
    $router->patch('/auth/refresh', 'AuthController@refresh');
    $router->post('/auth/register', 'RegisterController@store');
    $router->post('/auth/logout', 'AuthController@logout');

});

$router->group(['prefix' => 'api/v1', 'middleware' => ['auth:api']], function () use ($router) {

    $router->get('/user', 'UserController@index');
    $router->put('/user/password', 'UserController@password');
    $router->put('/user/update', 'UserController@updateProfile');
    $router->get('/user/profile', 'AuthController@self');
    $router->get('/user/{id}', 'UserController@show');
    $router->put('/user/{id}', 'UserController@update');

    $router->get('/expense/category', 'ExpenseCategoryController@index');
    $router->post('/expense/category', 'ExpenseCategoryController@store');
    $router->get('/expense/category/{id}', 'ExpenseCategoryController@show');
    $router->put('/expense/category/{id}', 'ExpenseCategoryController@update');
    $router->delete('/expense/category/{id}', 'ExpenseCategoryController@destroy');

    $router->get('/income/category', 'IncomeCategoryController@index');
    $router->post('/income/category', 'IncomeCategoryController@store');
    $router->get('/income/category/{id}', 'IncomeCategoryController@show');
    $router->put('/income/category/{id}', 'IncomeCategoryController@update');
    $router->delete('/income/category/{id}', 'IncomeCategoryController@destroy');

    $router->get('/expense', 'ExpenseController@index');
    $router->post('/expense', 'ExpenseController@store');
    $router->get('/expense/summary', 'ExpenseController@summary');
    $router->get('/expense/{id}', 'ExpenseController@show');
    $router->put('/expense/{id}', 'ExpenseController@update');
    $router->delete('/expense/{id}', 'ExpenseController@destroy');

    $router->get('/income', 'IncomeController@index');
    $router->post('/income', 'IncomeController@store');
    $router->get('/income/summary', 'IncomeController@summary');
    $router->get('/income/{id}', 'IncomeController@show');
    $router->put('/income/{id}', 'IncomeController@update');
    $router->delete('/income/{id}', 'IncomeController@destroy');

    $router->get('/currency', 'CurrencyController@index');
    $router->put('/currency/{id}', 'CurrencyController@update');

    $router->get('/report/expense/months/summary', 'ReportController@monthlyExpenseSummary');
    $router->get('/report/income/months/summary', 'ReportController@monthlyIncomeSummary');
    $router->get('/report/transaction', 'ReportController@transaction');

    $router->get('/chart/income-expense/category', 'ChartController@incomeExpenseCategories');
    $router->get('/chart/income-expense/month-wise', 'ChartController@incomeExpenseDataMonthWise');
    $router->get('/chart/income-expense/category-wise', 'ChartController@incomeExpenseDataMonthAndCategoryWise');

});
