<?php

use App\Http\Controllers\CertificateController;
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
    return view('auth.login');
});

//Certificate
Route::get('/new-certificate', [CertificateController::class, 'newFormData'])->middleware(['auth'])->name('new.certificate');
Route::get('/all-certificates', [CertificateController::class, 'certificatesData'])->middleware(['auth'])->name('all.certificates');
Route::post('/insert-new-certificate', [CertificateController::class, 'store'])->middleware(['auth']);
Route::get('/download-certificate/{id}', [CertificateController::class, 'download'])->middleware(['auth']);
Route::delete('/delete-certificate/{id}', [CertificateController::class, 'destroy'])->name('delete.certificate')->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('all-certificates');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
