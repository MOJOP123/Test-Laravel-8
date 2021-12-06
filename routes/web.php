<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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




//ContactController
Route::get('/contact', [ContactController::class, 'index']);


Auth::routes();
  
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('2fa');
  
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');



/*
NOTES
==========================

#ROUTES + CONTROLLERS (add a method to your routes via a Controller)


STEP1: Add a defined controller request controller object path at the top of the page: 

                 " use App\Http\Controllers\ContactController; "

STEP2: Associate a Route with a Controllers so it can be called with a method: 


                " Route::get('/contact', [ContactController::class, 'index']); "


STEP3: The Controller says which view (page) should be returned. In this instance we are asking it to return the "Contact Page" in Resources/Views/Contact

           
                class ContactController extends Controller

                                {
                                public function index(){
                                    echo "This is our contact page";
                                }
                                }

--------------------

Note: Full options include: Route::get('/user/{id}', [UserController::class, 'show']);

--------------------

=========================
Sources:
-----------
This is the Old Method: Route::get('/contact','ContactController@index');
-----------
https://laravel.com/docs/8.x/controllers
https://www.udemy.com/course/laravel-advanced-course-build-school-management-system/learn/lecture/24335870#overview
7.09

===========================

*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
