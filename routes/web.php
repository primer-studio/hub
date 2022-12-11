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

/** ------- Service ------- **/
Route::get('/service/{slug}', [App\Http\Controllers\ServiceController::class, 'Show'])->name('Public > Show > Service');

/** ------- Publisher ------- **/
Route::get('/publisher/{id}-{slug}', [App\Http\Controllers\PublisherController::class, 'Show'])->name('Public > Show > Publisher');

/** ------- News ------- **/
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'Show'])->name('Public > Show > News');

/** ------- Real time ------- **/
Route::prefix('real-time')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'RealTime'])->name('Public > Real time');
    Route::get('/news/{order}/{count}', [\App\Http\Controllers\NewsController::class, 'RealTime'])->name('Real Time > News');
});


/** ------- Private ------- **/
Route::middleware(['auth'])->group(function () {
    Route::prefix('cfx63_admin')->group(function () {

        /** ------- Dashboard ------- **/
        Route::get('/', [App\Http\Controllers\AdminController::class, 'Index'])->name('Admin > Dashboard > Index');
        Route::get('/publishers', [App\Http\Controllers\AdminController::class, 'ManagePublisher'])->name('Admin > Dashboard > Publishers > Manage');
        Route::any('/publisher/add', [App\Http\Controllers\AdminController::class, 'AddPublisher'])->name('Admin > Dashboard > Publishers > Add');
        Route::any('/publisher/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditPublisher'])->name('Admin > Dashboard > Publishers > Edit');

        Route::any('/services', [App\Http\Controllers\AdminController::class, 'ManageService'])->name('Admin > Dashboard > Services > Manage');
        Route::any('/service/add', [App\Http\Controllers\AdminController::class, 'AddService'])->name('Admin > Dashboard > Services > Add');
        Route::any('/service/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditService'])->name('Admin > Dashboard > Services > Edit');

        Route::get('/tags', [\App\Http\Controllers\AdminController::class, 'ManageTags'])->name('Admin > Dashboard > Tags > Manage');


        /** ------- JOBS ------- **/
        Route::get('/update', [App\Http\Controllers\NewsController::class, 'XMLrender'])->name('Jobs > Update > News');

        /** ------- Tests ------- **/

    });

    /** ------- Ajax Admin Actions ------- **/
    Route::post('/set_dummy_tag', [\App\Http\Controllers\TagController::class, 'SetDummyTag'])->name('Admin > Ajax > SetDummyTag');
});

/** ------- Sitemap ------- **/
Route::get('/sitemap_index.xml', [\App\Http\Controllers\SitemapController::class, 'Index'])->name('Sitemap');
Route::get('/news-sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'News'])->name('Sitemap > News');
Route::get('/services-sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'Service'])->name('Sitemap > Services');
Route::get('/publishers-sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'Publisher'])->name('Sitemap > Publishers');
//Route::get('/tag-sitemap.xml', 'SitemapController@Tag')->name('Sitemap > Tags');

/** ------- Feed ------- **/
//Route::get('/rss', 'FeedController@Index')->name('Rss');
//Route::get('/rss/v2', 'FeedController@v2')->name('RssV2');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//Route::get('sample-test', function() {
//    $stream = file_get_contents('https://www.yjc.news/fa/rss/5/99');
//    $parser = simplexml_load_string($stream);
//    return dd($parser);
//});

//Route::get('/duplicates', [\App\Http\Controllers\NewsController::class, 'RemoveDuplicates']);
Route::get('test', [\App\Http\Controllers\TagController::class, 'DummiesDeactiveJob']);
