<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

Auth::routes();

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
    // echo "hi asmaa" ;
    return view('welcome');
});
Route::get('test', function () {
dump(Auth::user());
})->Middleware('isadmin');
// Route::middleware('isadmin')->group(function(){

// });
Route::resource('employees', EmployeeController::class);
Route::get('/depart' , function(){
    $employee =Employee::find('5');
    dd($employee->depart);
}) ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
