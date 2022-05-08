<?php

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

require __DIR__.'/auth.php';

/** ------- Public ------- **/
Route::get('/', [App\Http\Controllers\HomeController::class, 'Index'])->name('Public > Index');

/** ------- News ------- **/
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'Show'])->name('Public > Show > News');


/** ------- Private ------- **/
Route::middleware(['auth'])->group(function () {
    Route::prefix('cfx63_admin')->group(function () {

        /** ------- Dashboard ------- **/
        Route::get('/', [App\Http\Controllers\AdminController::class, 'Index'])->name('Admin > Dashboard > Index');
        Route::get('/publishers', [App\Http\Controllers\AdminController::class, 'ManagePublisher'])->name('Admin > Dashboard > Publishers > Manage');
        Route::any('/publisher/add', [App\Http\Controllers\AdminController::class, 'AddPublisher'])->name('Admin > Dashboard > Publishers > Add');
        Route::any('/publisher/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditPublisher'])->name('Admin > Dashboard > Publishers > Edit');

        /** ------- JOBS ------- **/
        Route::get('/update', [App\Http\Controllers\NewsController::class, 'XMLrender'])->name('Jobs > Update > News');

        /** ------- Tests ------- **/

    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('sample-test', function() {
    $stream = file_get_contents('https://www.yjc.news/fa/rss/5/99');
    $parser = simplexml_load_string($stream);
    return dd($parser);
});
