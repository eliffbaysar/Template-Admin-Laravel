<?php
use App\Http\Controllers\HomeController;
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

Route::get ('/', function()
{
    return view('welcome');
});

Route::redirect('anasayfa', '/home')->name('anasayfa');

Route::get ('/', function()
{
    return view('home.index');
});
Route::get ('/home',[HomeController::class,'index'])->name('home');
Route::get ('/about',[HomeController::class,'about'])->name('about');

//Route::get ('/test/{id}{name}', [HomeController::class,'test']) -> where ('id','[0-9]+');
Route::get('/test/{id}/{name}', [HomeController::class,'test'])->whereNumber('id')->whereAlpha('name')->name('test');

Route::get('admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
