<?php
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Temporal: solo para que los enlaces route('login') de la vista no fallen
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/area', [AreaController::class, 'index'])->name('area.index');
Route::get('/area/create',[AreaController::class,'create'])->name('area.create');
Route::post('/area',[AreaController::class,'store'])->name('area.store');
Route::get('/area/{id}', [AreaController::class, 'show'])->name('area.show');
Route::get('/area/{id}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('/area/{id}', [AreaController::class, 'update'])->name('area.update');
Route::delete('/area/{id}', [AreaController::class, 'destroy'])->name('area.destroy');

Route::get('/training_center', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('/training_center/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('/training_center', [TrainingCenterController::class, 'store'])->name('training_center.store');
Route::get('/training_center/{id}', [TrainingCenterController::class, 'show'])->name('training_center.show');
Route::get('/training_center/{id}/edit', [TrainingCenterController::class, 'edit'])->name('training_center.edit');
Route::put('/training_center/{id}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('/training_center/{id}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');

Route::get('/environment', [EnvironmentController::class, 'index'])->name('environment.index');
Route::get('/environment/create', [EnvironmentController::class, 'create'])->name('environment.create');
Route::post('/environment', [EnvironmentController::class, 'store'])->name('environment.store');
Route::get('/environment/{id}', [EnvironmentController::class, 'show'])->name('environment.show');
Route::get('/environment/{id}/edit', [EnvironmentController::class, 'edit'])->name('environment.edit');
Route::put('/environment/{id}', [EnvironmentController::class, 'update'])->name('environment.update');
Route::delete('/environment/{id}', [EnvironmentController::class, 'destroy'])->name('environment.destroy');

Route::get('/computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('/computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('/computer', [ComputerController::class, 'store'])->name('computer.store');
Route::get('/computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('/computer/{id}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('/computer/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('/computer/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');