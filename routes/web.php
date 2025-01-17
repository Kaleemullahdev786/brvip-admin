<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UtilsController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\BedroomsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FreeUtilsController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\YachtController;
use App\Http\Controllers\PerkController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VehicleController;
use App\Models\User;


Route::get('/', [AuthController::class, 'index'])->name('login');
//auth controller//
Route::post('/login', [AuthController::class, 'login'])->name('login');
//logout//
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//dashboard controller//
Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('dashboard');

//roles controller//
Route::get('/dashboard/roles', [RolesController::class, 'index'])->name('roles');
Route::get('/dashboard/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::get('/dashboard/roles/permissions/{id}', [RolesController::class, 'permissions'])->name('roles.permissions');
Route::post('/dashboard/roles/permissions/{role}/{permission}', [RolesController::class, 'storePermissions'])->name('roles.permissions');
Route::post('/dashboard/roles/store', [RolesController::class, 'store'])->name('roles.store');
Route::get('/dashboard/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
Route::post('/dashboard/roles/update/{id}', [RolesController::class, 'update'])->name('roles.update');
Route::get('/dashboard/roles/delete/{id}', [RolesController::class, 'delete'])->name('roles.delete');




//Users Routes //
Route::get('/dashboard/users', [UsersController::class, 'index'])->name('users');
Route::get('/dashboard/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/dashboard/users/store', [UsersController::class, 'store'])->name('users.store');
Route::get('/dashboard/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::post('/dashboard/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('/dashboard/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
Route::get('/dashboard/users/block/{id}', [UsersController::class, 'block'])->name('users.block');
Route::post('/dashboard/users/permissions/{userid}/{permissionid}', [UsersController::class, 'permissions'])->name('users.permissions');


// Colors Routes
Route::get('/dashboard/colors', [ColorController::class, 'index'])->name('colors');
Route::get('/dashboard/colors/create', [ColorController::class, 'create'])->name('colors.create');
Route::post('/dashboard/colors/store', [ColorController::class, 'store'])->name('colors.store');
Route::get('/dashboard/colors/edit/{color}', [ColorController::class, 'edit'])->name('colors.edit')->withTrashed();
Route::post('/dashboard/colors/update/{color}', [ColorController::class, 'update'])->name('colors.update')->withTrashed();
Route::get('/dashboard/colors/delete/{color}', [ColorController::class, 'delete'])->name('colors.delete');
Route::get('/dashboard/colors/block/{color}', [ColorController::class, 'block'])->name('colors.block');
Route::get('/dashboard/colors/restored/{id}', [ColorController::class, 'restored'])->name('colors.restored');
// Features Routes
Route::get('/dashboard/features', [FeatureController::class, 'index'])->name('features');
Route::get('/dashboard/features/create', [FeatureController::class, 'create'])->name('features.create');
Route::post('/dashboard/features/store', [FeatureController::class, 'store'])->name('features.store');
Route::get('/dashboard/features/edit/{feature}', [FeatureController::class, 'edit'])->name('features.edit')->withTrashed();
Route::post('/dashboard/features/update/{feature}', [FeatureController::class, 'update'])->name('features.update')->withTrashed();
Route::get('/dashboard/features/delete/{feature}', [FeatureController::class, 'delete'])->name('features.delete');
Route::get('/dashboard/features/block/{feature}', [FeatureController::class, 'block'])->name('features.block');
Route::get('/dashboard/features/restored/{id}', [FeatureController::class, 'restored'])->name('features.restored');

// Manufacturers Routes
Route::get('/dashboard/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers');
Route::get('/dashboard/manufacturers/create', [ManufacturerController::class, 'create'])->name('manufacturers.create');
Route::post('/dashboard/manufacturers/store', [ManufacturerController::class, 'store'])->name('manufacturers.store');
Route::get('/dashboard/manufacturers/edit/{manufacturer}', [ManufacturerController::class, 'edit'])->name('manufacturers.edit')->withTrashed();
Route::post('/dashboard/manufacturers/update/{manufacturer}', [ManufacturerController::class, 'update'])->name('manufacturers.update')->withTrashed();
Route::get('/dashboard/manufacturers/delete/{manufacturer}', [ManufacturerController::class, 'delete'])->name('manufacturers.delete');
Route::get('/dashboard/manufacturers/block/{manufacturer}', [ManufacturerController::class, 'block'])->name('manufacturers.block');
Route::get('/dashboard/manufacturers/restored/{id}', [ManufacturerController::class, 'restored'])->name('manufacturers.restored');


Route::get('/dashboard/brand_models', [BrandModelController::class, 'index'])->name('brand_models');
Route::get('/dashboard/brand_models/create', [BrandModelController::class, 'create'])->name('brand_models.create');
Route::post('/dashboard/brand_models/store', [BrandModelController::class, 'store'])->name('brand_models.store');
Route::get('/dashboard/brand_models/edit/{brand_model}', [BrandModelController::class, 'edit'])->name('brand_models.edit')->withTrashed();
Route::post('/dashboard/brand_models/update/{brand_model}', [BrandModelController::class, 'update'])->name('brand_models.update')->withTrashed();
Route::get('/dashboard/brand_models/delete/{brand_model}', [BrandModelController::class, 'delete'])->name('brand_models.delete');
Route::get('/dashboard/brand_models/block/{brand_model}', [BrandModelController::class, 'block'])->name('brand_models.block');
Route::get('/dashboard/brand_models/restored/{id}', [BrandModelController::class, 'restored'])->name('brand_models.restored');


Route::get('/dashboard/types', [TypeController::class, 'index'])->name('types');
Route::get('/dashboard/types/create', [TypeController::class, 'create'])->name('types.create');
Route::post('/dashboard/types/store', [TypeController::class, 'store'])->name('types.store');
Route::get('/dashboard/types/edit/{type}', [TypeController::class, 'edit'])->name('types.edit')->withTrashed();
Route::post('/dashboard/types/update/{type}', [TypeController::class, 'update'])->name('types.update')->withTrashed();
Route::get('/dashboard/types/delete/{type}', [TypeController::class, 'delete'])->name('types.delete');
Route::get('/dashboard/types/block/{type}', [TypeController::class, 'block'])->name('types.block');
Route::get('/dashboard/types/restored/{id}', [TypeController::class, 'restored'])->name('types.restored');


// categories Routes

Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/dashboard/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/dashboard/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit')->withTrashed();
Route::post('/dashboard/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update')->withTrashed();
Route::get('/dashboard/categories/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/dashboard/categories/block/{category}', [CategoryController::class, 'block'])->name('categories.block');
Route::get('/dashboard/categories/restored/{id}', [CategoryController::class, 'restored'])->name('categories.restored');
// Vechile Routes
Route::get('/dashboard/vehicles', [VehicleController::class, 'index'])->name('vehicles');
Route::get('/dashboard/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/dashboard/vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/dashboard/vehicles/edit/{vehicle}', [VehicleController::class, 'edit'])->name('vehicles.edit')->withTrashed();
Route::post('/dashboard/vehicles/update/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update')->withTrashed();
Route::get('/dashboard/vehicles/delete/{vehicle}', [VehicleController::class, 'delete'])->name('vehicles.delete');
Route::get('/dashboard/vehicles/block/{vehicle}', [VehicleController::class, 'block'])->name('vehicles.block');
Route::get('/dashboard/vehicles/restored/{id}', [VehicleController::class, 'restored'])->name('vehicles.restored');


// // Vechile Routes
// Route::get('/dashboard/customers', [CustomerController::class, 'index'])->name('customers');
// Route::get('/dashboard/customers/create', [CustomerController::class, 'create'])->name('customers.create');
// Route::post('/dashboard/customers/store', [CustomerController::class, 'store'])->name('customers.store');
// Route::get('/dashboard/customers/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit')->withTrashed();
// Route::post('/dashboard/customers/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');
// Route::get('/dashboard/customers/delete/{customer}', [CustomerController::class, 'delete'])->name('customers.delete');
// Route::get('/dashboard/customers/block/{customer}', [CustomerController::class, 'block'])->name('customers.block');
// Route::get('/dashboard/customers/restored/{id}', [CustomerController::class, 'restored'])->name('customers.restored');



// // bookings Routes
Route::get('/dashboard/bookings', [BookingController::class,  'index'])->name('bookings');
Route::get('/dashboard/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/dashboard/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/dashboard/bookings/edit/{booking}', [BookingController::class, 'edit'])->name('bookings.edit')->withTrashed();
Route::post('/dashboard/bookings/update/{booking}', [BookingController::class, 'update'])->name('bookings.update')->withTrashed();
Route::get('/dashboard/bookings/delete/{booking}', [BookingController::class, 'delete'])->name('bookings.delete');
Route::get('/dashboard/bookings/block/{booking}', [BookingController::class, 'block'])->name('bookings.block');
Route::get('/dashboard/bookings/restored/{id}', [BookingController::class, 'restored'])->name('bookings.restored');


Route::get('/dashboard/bookings/updatebooking/{booking}', [BookingController::class, 'updateBooking'])->name('bookings.status');
Route::post('/dashboard/bookings/complete/{booking}', [BookingController::class, 'completePaymentBooking'])->name('bookings.paymentcomplete')->withTrashed();
Route::get('/dashboard/bookings/payment/complete-journey/{booking}', [BookingController::class, 'completeBookingJourney'])->name('bookings.completeBookingJourney')->withTrashed();
Route::get('/dashboard/bookings/payment/make-payment/{booking}', [BookingController::class, 'completeBookingPayment'])->name('bookings.completeBookingPayment')->withTrashed();

Route::post('/dashboard/bookings/cancelled/{booking}', [BookingController::class, 'cancelBooking'])->name('bookings.cancelBooking')->withTrashed();

Route::get('/dashboard/bookings/extra/{booking}', [BookingController::class, 'extraParam'])->name('bookings.extraParam')->withTrashed();


//utills controller//
// Permission::create(['name' => 'create bookings']);
// Permission::create(['name' => 'view bookings']);
// Permission::create(['name' => 'update bookings']);
// Permission::create(['name' => 'delete bookings']);
// Permission::create(['name' => 'status bookings']);

// Permission::create(['name' => 'cancel bookings']);
// Permission::create(['name' => 'approve bookings']);
// Permission::create(['name' => 'make payment bookings']);
// Permission::create(['name' => 'receipt bookings']);


//delete FROM `permissions` WHERE name NOT in('permissions users','block users','delete users', 'view users','create users','update users', 'view roles','create roles','update roles','delete roles','update permissions');







