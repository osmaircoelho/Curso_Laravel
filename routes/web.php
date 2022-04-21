<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\TesteController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

/*Route::get("/products/{id}", 'ProductController@show')->name('products.show');
Route::get("/products", 'ProductController@index')->name('products.index');*/

//admin/financeiro

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
    //Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/dashboard', [TesteController::class, 'teste'])->name('dashboard');
    Route::get('/financeiro', [TesteController::class, 'teste'])->name('financeiro');
    Route::get('/produtos', [TesteController::class, 'teste'])->name('products');
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');
});

Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'hey, hey, hey';
})->name('url.name');

Route::view("/view", 'Welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2');

/*Route::get('redirect1', function () {
    return redirect('/redirect2');
});*/

Route::get('redirect2', function () {
    return 'Redirect 2';
});


Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Product(s) {$idProduct}";
});

//categoria/1/posts
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::match(['post', 'put'], '/match', function () { //especifica qual quais methods pode acessar
    return 'match';
});

Route::any('/any', function () { //permite todo tipo de verbo
    return 'any';
});

Route::put('/register', function () {
    return '';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/empresa', function () {
    return view('site.contact');
});

Route::put('/register', function () {
    return '';
});



