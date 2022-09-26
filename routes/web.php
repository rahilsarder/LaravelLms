<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesNPermissionsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAdvisingController;
use App\Http\Controllers\StudentController;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Student Routes
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/student_info', [StudentController::class, 'index']);

    Route::resource('course', CourseController::class)->name('index', 'course');

    Route::resource('/section', SectionController::class)->name('index', 'section');

    Route::resource('/attendance', AttendanceController::class)->name('index', 'attendance');

    Route::resource('/advising', StudentAdvisingController::class)->names(['index' => 'advising', 'store' => 'advisingPost']);

    // Protected Route
    Route::group(['middleware' => ['role:super-admin|write']], function () {
        Route::resource('/rolesNpermission', RolesNPermissionsController::class);
        Route::post('/rolesNpermission/store', [RolesNPermissionsController::class, 'storePermission'])->name('addPermission');
    });
});


//tests
Route::get('/test', function () {
    $user = Auth::user();
    $section = Section::first();

    $section->students()->attach($user);

    return $section->with('students')->get();
});

// Route::get('/test', function () {
//     return User::with('checkRelation')->get();
// })->middleware(['auth'])->name('student_info');

require __DIR__ . '/auth.php';
