<?php
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/teacher/home', [TeacherController::class, 'home'])->name('teacher.home');
Route::get('/teacher/course/{course}/apprentices', [TeacherController::class, 'misAprendices'])->name('teacher.apprentices');
Route::get('/apprentice/home', [ApprenticeController::class, 'home'])->name('apprentice.home');
Route::get('/apprentice/ofertas', [ApprenticeController::class, 'ofertas'])->name('apprentice.ofertas');
Route::post('/apprentice/inscribirse/{course}', [ApprenticeController::class, 'inscribirse'])->name('apprentice.inscribirse');
Route::post('/apprentice/retirarme', [ApprenticeController::class, 'retirarme'])->name('apprentice.retirarme');

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

Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/course', [CourseController::class, 'store'])->name('course.store');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/course/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/offer', [OfferController::class, 'index'])->name('offer.index');
Route::get('/offer/create', [OfferController::class, 'create'])->name('offer.create');
Route::post('/offer', [OfferController::class, 'store'])->name('offer.store');
Route::get('/offer/{id}', [OfferController::class, 'show'])->name('offer.show');
Route::get('/offer/{id}/edit', [OfferController::class, 'edit'])->name('offer.edit');
Route::put('/offer/{id}', [OfferController::class, 'update'])->name('offer.update');
Route::delete('/offer/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');

Route::get('/apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('/apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('/apprentice', [ApprenticeController::class, 'store'])->name('apprentice.store');
Route::get('/apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::get('/apprentice/{id}/edit', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('/apprentice/{id}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('/apprentice/{id}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

Route::get('/course_teacher', [CourseTeacherController::class, 'index'])->name('course_teacher.index');
Route::get('/course_teacher/create', [CourseTeacherController::class, 'create'])->name('course_teacher.create');
Route::post('/course_teacher', [CourseTeacherController::class, 'store'])->name('course_teacher.store');
Route::delete('/course_teacher/{id}', [CourseTeacherController::class, 'destroy'])->name('course_teacher.destroy');

Route::get('/administrative', [AdministrativeController::class, 'index'])->name('administrative.index');
Route::get('/administrative/create', [AdministrativeController::class, 'create'])->name('administrative.create');
Route::post('/administrative', [AdministrativeController::class, 'store'])->name('administrative.store');
Route::get('/administrative/{id}', [AdministrativeController::class, 'show'])->name('administrative.show');
Route::get('/administrative/{id}/edit', [AdministrativeController::class, 'edit'])->name('administrative.edit');
Route::put('/administrative/{id}', [AdministrativeController::class, 'update'])->name('administrative.update');
Route::delete('/administrative/{id}', [AdministrativeController::class, 'destroy'])->name('administrative.destroy');

