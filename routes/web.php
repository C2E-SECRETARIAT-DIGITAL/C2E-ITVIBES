<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return get_loaded_extensions();
});

// routes/web.php



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    // Routes  Enregistrement d'étudiant
    Route::get('/vibes/student/create', 'App\Http\Controllers\EtudiantController@create')->name('create.student');
    Route::post('/vibes/students/store', 'App\Http\Controllers\EtudiantController@store')->name('store.student');
    Route::get('/vibes/students/sendticket/{id}', 'App\Http\Controllers\EtudiantController@sendTicket')->name('ticket.send');

    Route::get('/vibes/user/create', 'App\Http\Controllers\UserController@createU')->name('create.user');
    Route::post('/vibes/user/store', 'App\Http\Controllers\UserController@storeU')->name('store.user');

    Route::get('/vibes/student/get/ticket/{id}', 'App\Http\Controllers\EtudiantController@generatePDF')->name('get.ticket');
    Route::post('/vibes/students/soumission', 'App\Http\Controllers\EtudiantController@Soumission')->name('qrcode.Soumission');

    Route::get('Gestionnaire', 'App\Http\Controllers\ExcelController@index')->name('excel.view');
    Route::post('importExcel', 'App\Http\Controllers\ExcelController@importExcel')->name('importExcel');

    Route::get('exportExcel/{type}', 'App\Http\Controllers\ExcelController@exportExcel')->name('exportExcel');


    Route::post('DeleteAllStudent', 'App\Http\Controllers\ExcelController@DeleteAllStudent')->name('delete.allStudent');


    //User
    Route::get('/vibes/student/liste', 'App\Http\Controllers\EtudiantController@index')->name('liste.student');
    Route::get('/vibes/user/liste', 'App\Http\Controllers\UserController@index')->name('liste.user');
    
    Route::post('DeleteUser/{id}', 'App\Http\Controllers\UserController@DeleteUser')->name('delete.user');
    // Affaire de mail

    Route::get('send-mail','App\Http\Controllers\EtudiantController@sendTicketMail')->name('send.TicketMail');

});