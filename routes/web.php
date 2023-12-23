<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CollectedController;
use App\Http\Controllers\Admin\CollectionPendingListController;
use App\Http\Controllers\Admin\CustomerListController;
use App\Http\Controllers\Admin\CustomerLoginController;
use App\Http\Controllers\Admin\CustomerSystemController;
use App\Http\Controllers\Admin\EmployeeListController;
use App\Http\Controllers\Admin\ListOfRouteController;
use App\Http\Controllers\Admin\ListRouteController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\admin\RouteListController;
use App\Http\Controllers\Admin\SignUpController;
use App\Http\Controllers\Admin\UnassignedListController;
use App\Http\Controllers\Admin\SampleCollectionRequestController;
use App\Http\Controllers\Admin\SampleMengmentLoginController;
use App\Http\Controllers\Admin\SampleMengmentSignupController;
use Illuminate\Support\Facades\Route;

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

//customer_login
Route::get('/customer-login', [CustomerLoginController::class, 'index'])->name('cust_login');
Route::post('/customer-login', [CustomerLoginController::class, 'login'])->name('customer.login');

// Customer System
Route::get('/customer-system', [CustomerSystemController::class, 'index'])->name('cust_system');
Route::get('/customer-get', [CustomerSystemController::class, 'customer_get'])->name('customer_get');
Route::post('/customer-edit', [CustomerSystemController::class, 'customer_edit'])->name('customer_edit');
Route::post('/customer-system-email', [CustomerSystemController::class, 'emailsending'])->name('cust_system_email');


//list_of_route
Route::get('/list-of-route', [ListOfRouteController::class, 'index'])->name('list_of_route');
// Route::post('/list-of-route-get', [ListOfRouteController::class, 'get_route_list'])->name('list_of_route_get');

//list_route
Route::get('/list-route', [ListRouteController::class, 'index'])->name('list_route');
Route::post('/list-of-route-insert', [ListRouteController::class, 'insert_listroute'])->name('list_of_route_insert');
Route::post('/list-route-get', [ListRouteController::class, 'get_route_list'])->name('list_route_get');


//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//crud sign-up
Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign_up');
Route::post('/insert-sign-up', [SignUpController::class, 'insert'])->name('signup_insert');

// Sample Collection Request
Route::post('send-sample-request', [SampleCollectionRequestController::class, 'send_request'])->name('send_sample_request');


//sms login/signup
Route::get('/sms-signup', [SampleMengmentSignupController::class, 'index'])->name('sms_signup');
Route::post('/sms-insert', [SampleMengmentSignupController::class, 'insert'])->name('sms_insert');
Route::get('/sms-login', [SampleMengmentLoginController::class, 'index'])->name('sms_login');
Route::post('/sms-login-submit', [SampleMengmentLoginController::class, 'login'])->name('sms_login_submit');


//employe_list
Route::post('/employee-list-insert', [EmployeeListController::class, 'insert'])->name('employe_list_insert');
Route::post('/employee-list-get', [EmployeeListController::class, 'get_employe_list'])->name('employe_list_get');
Route::get('/employee-list-edit/{id}', [EmployeeListController::class, 'employe_edit'])->name('employe_list_edit');
Route::post('/employee-list-delete', [EmployeeListController::class, 'delete'])->name('employe_list_delete');


//route_list
Route::post('/route-list-insert', [RouteListController::class, 'insert'])->name('route_list_insert');
Route::post('/route-list-get', [RouteListController::class, 'show_route'])->name('route_list_get');
Route::get('/route-list-edit/{id}', [RouteListController::class, 'route_edit'])->name('route_list_edit');
Route::post('/route-list-delete', [RouteListController::class, 'delete'])->name('route_list_delete');





// Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/collected', [CollectedController::class, 'index'])->name('collected');
        Route::post('/get-collected', [CollectedController::class, 'get_collected_list'])->name('get_collected');
        Route::get('/unassigned-list', [UnassignedListController::class, 'index'])->name('unassigned_list');
        Route::post('/update-column', [UnassignedListController::class, 'updateColumn'])->name('update_column');
        Route::get('/collection-pending-list', [CollectionPendingListController::class, 'index'])->name('collection_pending_list');
        Route::get('/customer-list', [CustomerListController::class, 'index'])->name('customer_list');
        Route::post('/get-customer-list', [CustomerListController::class, 'get_customer'])->name('get_customer_list');
        Route::get('/get-customer-details/{id}', [CustomerListController::class, 'get_customer_details'])->name('get_customer_details');
        // Route::post('/get-customer-list', [CustomerListController::class, 'get_contect'])->name('get_customer_list');
        Route::post('/get-unassigned-list', [UnassignedListController::class, 'get_unassigned_list'])->name('get_unassigned_list');
        Route::post('/get-collection-pending-list', [CollectionPendingListController::class, 'get_collection_pending_list'])->name('get_collection_pending_list');
        Route::get('/employee-list', [EmployeeListController::class, 'index'])->name('employe_list');
        Route::get('/route-list', [RouteListController::class, 'index'])->name('route_list');
    });
});
