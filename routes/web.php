<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ReviewController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Add custom routes
    // Route::resource('rooms', RoomController::class);
    Route::get('rooms', [RoomController::class, 'index'])->name('voyager.rooms.index');
    Route::get('rooms/create', [RoomController::class, 'create'])->name('voyager.rooms.create');
    Route::post('rooms', [RoomController::class, 'store'])->name('voyager.rooms.store');
    Route::get('rooms/{id}', [RoomController::class, 'show'])->name('voyager.rooms.show');
    Route::get('rooms/{id}/edit', [RoomController::class, 'edit'])->name('voyager.rooms.edit');
    Route::put('rooms/{id}', [RoomController::class, 'update'])->name('voyager.rooms.update');
    Route::delete('rooms/{id}', [RoomController::class, 'destroy'])->name('voyager.rooms.destroy');
    Route::delete('rooms/multiple-delete', [RoomController::class, 'destroyMultiple'])->name('voyager.rooms.destroyMultiple');

    // Route::resource('bookings', BookingController::class);
    Route::get('bookings', [BookingController::class, 'index'])->name('voyager.bookings.index');
    Route::get('bookings/create', [BookingController::class, 'create'])->name('voyager.bookings.create');
    Route::post('bookings', [BookingController::class, 'store'])->name('voyager.bookings.store');
    Route::get('bookings/{id}', [BookingController::class, 'show'])->name('voyager.bookings.show');
    Route::get('bookings/{id}/edit', [BookingController::class, 'edit'])->name('voyager.bookings.edit');
    Route::put('bookings/{id}', [BookingController::class, 'update'])->name('voyager.bookings.update');
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('voyager.bookings.destroy');

    Route::get('customers', [CustomerController::class, 'index'])->name('voyager.customers.index');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('voyager.customers.create');
    Route::post('customers', [CustomerController::class, 'store'])->name('voyager.customers.store');
    Route::get('customers/{id}', [CustomerController::class, 'show'])->name('voyager.customers.show');
    Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('voyager.customers.edit');
    Route::put('customers/{id}', [CustomerController::class, 'update'])->name('voyager.customers.update');
    Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('voyager.customers.destroy');

    Route::get('/room-types', [RoomTypeController::class, 'index'])->name('voyager.room-types.index');
    Route::get('/room-types/create', [RoomTypeController::class, 'create'])->name('voyager.room-types.create');
    Route::post('/room-types', [RoomTypeController::class, 'store'])->name('voyager.room-types.store');
    Route::get('/room-types/{id}', [RoomTypeController::class, 'show'])->name('voyager.room-types.show');
    Route::get('/room-types/{id}/edit', [RoomTypeController::class, 'edit'])->name('voyager.room-types.edit');
    Route::put('/room-types/{id}', [RoomTypeController::class, 'update'])->name('voyager.room-types.update');
    Route::delete('/room-types/{id}', [RoomTypeController::class, 'destroy'])->name('voyager.room-types.destroy');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('voyager.reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('voyager.reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('voyager.reviews.store');
    Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('voyager.reviews.show');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('voyager.reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('voyager.reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('voyager.reviews.destroy');

});
