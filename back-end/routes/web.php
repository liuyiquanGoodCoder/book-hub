<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
//home
//login
Route::get('/login', function () {
    return view('/Home/login');
});
//seller
//store management
Route::get('/storeinfo', function ()
{
    return view('/Seller/storeinfo');
});
Route::get('/updatestore', function ()
{
    return view('/Seller/updatestore');
});
//books management
Route::get('/booksinfo', function ()
{
    return view('/Seller/booksinfo');
});
Route::get('/updatebooks', function ()
{
    return view('/Seller/updatebooks');
});
//services management
Route::get('/myservices', function ()
{
    return view('/Seller/myservices');
});
//business
Route::get('/mybusiness', function ()
{
    return view('/Seller/mybusiness');
});
//neworders
Route::get('/neworders', function ()
{
    return view('/Seller/neworders');
});
//HR
//employee management
Route::get('/employeeinfo', function ()
{
    return view('/HR/employeeinfo');
});
Route::get('/updateemployeeinfo', function ()
{
    return view('/HR/updateemployeeinfo');
});
//performance
Route::get('/performance', function ()
{
    return view('/HR/performance');
});
//resumes
Route::get('/resumes', function ()
{
    return view('/HR/resumes');
});
//training projects
Route::get('/training', function ()
{
    return view('/HR/training');
});
//M/S
//store management
Route::get('/stores', function ()
{
    return view('/MS/stores');
});
//projects management
Route::get('/projects', function ()
{
    return view('/MS/projects');
});
Route::get('/projectrecords', function ()
{
    return view('/MS/projectrecords');
});
//business
Route::get('/business', function ()
{
    return view('/MS/business');
});
//A/F
//payroll
Route::get('/payroll', function ()
{
    return view('/AF/payroll');
});
//expenditure
Route::get('/expenditure', function ()
{
    return view('/AF/expenditure');
});
//income
Route::get('/income', function ()
{
    return view('/AF/income');
});
