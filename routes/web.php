<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Users1Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
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

Route::get('/dashboard', [UserController::class,'Index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/search',[UserController::class,'Search'])->name('search')->middleware(['auth', 'verified']);
Route::resource('users',Users1Controller::class)->middleware(['auth', 'verified']);
Route::put('/dashboard/{id}', [UserController::class,'ban','id'])->name('ban')->middleware(['auth', 'verified']);
Route::get('/filter',[UserController::class,'Filter'])->name('filter')->middleware(['auth', 'verified']);
Route::get('/addfakedata' ,function(){
    return view('add-fake-data');
})->name('addfake');
Route::post(('/addfakedata'), function(){
    $logs=[];
    for ($i=0;$i<5;$i++)
    {
        $user=User::create([
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->email(),
            'password' => fake()->unique()->password(),
            'isbaned' => 0
        ]);
        $logs[$i]=$user;
        event(new Registered($user));

    }
    return to_route('addfake');
})->name('generate');
require __DIR__.'/auth.php';
