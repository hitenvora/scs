<?php

use App\Http\Controllers\Api\SampleCollectionRequestController;
use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\Api\CustomerListController;
use App\Http\Controllers\Api\CustomerLoginController;
use App\Http\Controllers\Api\SampleFrequencyController;
use App\Http\Controllers\Api\SingUpController;
use App\Http\Controllers\Api\UnassignedListController;
use App\Http\Controllers\Api\RouteListController;
use App\Http\Controllers\Api\EmployeeController;
use App\Models\UnassignedList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});

// master = route list, frequency list
// Common API
Route::get('get-sample-frequency-list', [SampleFrequencyController::class, 'getSampleFrequencyList']);
Route::get('route-list', [SampleFrequencyController::class, 'routeList']);
Route::get('get-route-list', [RouteListController::class, 'get_route_list']);

/*******************************  Admin ********************************/
// login, logout, unassign list, collection pending, customer details, unassign-assign-route, collected list, 
// customer list, employee list, route-list, get admin profile

// login
Route::post('admin/login', [AdminLoginController::class, 'login']);

Route::group(['middleware' => ['authApiAdmin']], function () {
    Route::get('get-unassigned-list', [UnassignedListController::class, 'get_unassigned_list']);
    Route::get('collection-pending-list', [SampleCollectionRequestController::class, 'collection_pending_list']);
    Route::get('collected-list', [SampleCollectionRequestController::class, 'collected_list']);

    Route::get('get-customer-list', [CustomerListController::class, 'getCustomerList']);
    Route::post('customer-details', [SampleCollectionRequestController::class, 'customer_details']);

    Route::get('get-admin-profile', [AdminLoginController::class, 'get_admin_profile']);
    Route::post('update-admin-profile', [AdminLoginController::class, 'update_admin_profile']);

    // Route::post('unsigned-list', [SampleCollectionRequestController::class, 'unsigned_list']);
    Route::post('assign-route', [SampleCollectionRequestController::class, 'assign_route']);
    
    // 9.admin/logout
    Route::get('admin/logout', [AdminLoginController::class, 'logout']);
});


/*******************************  Customer ********************************/
// get profile, update, contact CRUD, login, logout, signup, add sample req, email-send-req

//Customer Login
Route::post('customer-login', [CustomerLoginController::class, 'login']);
Route::post('signup', [SingUpController::class, 'insert']);

Route::group(['middleware' => ['authApiCustomer']], function () {
    // Profile
    Route::get('get-customer-profile', [CustomerLoginController::class, 'get_customer_profile']);
    Route::post('update-customer-profile', [CustomerLoginController::class, 'update_customer_profile']);
    // Sample collection request
    Route::post('sample-collection-request-send', [SampleCollectionRequestController::class, 'send_request']);
    Route::post('re-testing-add', [CustomerLoginController::class, 're_testing_add']);

    // contact add/update/delete
    Route::post('update-contact-details', [SingUpController::class, 'update_contact_details']);
    Route::post('add-contact-details', [SingUpController::class, 'add_contact_details']);
    Route::post('get-contact-details', [SingUpController::class, 'get_contact_details']);
    Route::post('delete-contact', [SingUpController::class, 'delete_contact']);
    // Logout
    Route::post('customer-logout', [CustomerLoginController::class, 'logout']);
});

/*******************************  Sample/Employee ********************************/
// login, route listing with sample count, route wise request list, route list api, sample priority change, 
// update user name only

//Customer Login
Route::post('employee-login', [EmployeeController::class, 'login']);

// authApiEmployee
Route::group(['middleware' => ['authApiEmployee']], function () {
    // Profile
    Route::post('employee-logout', [EmployeeController::class, 'logout']);
    Route::get('employee-profile', [EmployeeController::class, 'get_profile']);
    Route::post('update-employee-profile', [EmployeeController::class, 'update_employee_profile']);

    // Route request list
    Route::post('route-request-list', [EmployeeController::class, 'route_request_list']);
    Route::post('sample-route-wise-list', [EmployeeController::class, 'sample_route_wise_list']);

    Route::post('sample-collected', [EmployeeController::class, 'sample_collected']);
});
