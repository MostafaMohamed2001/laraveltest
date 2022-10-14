<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('invoices', 'InvoicesController');
Route::resource('sections', 'SectionsController');
Route::resource('products', 'ProductsController');
Route::get('section/{id}','InvoicesController@getproducts');

Route::get('InvoicesDetails/{id}','InvoicesDetailsController@edit');
Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');
Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');
Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');
//process in invoicess
Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');


/////
Route::resource('Archive', 'InvoiceAchiveController');

Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');
Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');
Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');
Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');
Route::get('export_invoices', 'InvoicesController@export');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

    });
    Route::get('invoices_report', 'Invoices_Report@index');
    Route::post('Search_invoices', 'Invoices_Report@Search_invoices');
    
    Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

    // Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');

    // Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');

Route::get('/{page}',[App\Http\Controllers\AdminController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



