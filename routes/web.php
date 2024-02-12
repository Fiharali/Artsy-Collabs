<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReseravtionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProjectController::class, 'all'])->name('index');


Route::middleware(['auth','admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::resource('projects', ProjectController::class);

        Route::resource('partners', PartnerController::class);
        Route::resource('project-user', ProjectUserController::class);

        Route::get('register', [RegisteredUserController::class, 'create']) ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store'])->name('users.store');
        Route::get('users', [RegisteredUserController::class, 'index'])->name('users.index');
        Route::get('users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [RegisteredUserController::class, 'destroy'])->name('users.destroy');

        Route::post('assign-users/{project}', [ProjectUserController::class, 'store'])->name('assign.users');
        Route::post('assign-from-user/{project}', [ProjectUserController::class, 'assignUser'])->name('user.assign.users');
        Route::post('reset-assign-from-user/{project}', [ProjectUserController::class, 'resetAssignUser'])->name('reset.assign.users');

        Route::post('accept-from-admin/{project}', [ProjectUserController::class, 'acceptAssignUser'])->name('accept.assign.users');
        Route::post('remove-from-user/{project}', [ProjectUserController::class, 'removeAssignUser'])->name('remove.assign.users');

        Route::post('project-user-accept/{project}/{user}', [ProjectUserController::class, 'projectUserAccept'])->name('project-user.accept');
        Route::post('project-user-refuse/{project}/{user}', [ProjectUserController::class, 'projectUserRefuse'])->name('project-user.refuse');

    });
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
