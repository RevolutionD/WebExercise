<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IssuedBookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin_login', [AuthController::class, 'adminIndex']);

Route::post('/admin_login', [AuthController::class, 'adminLogin']);

Route::get('/user_register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store']);

Route::prefix('user')->group(function () {

    Route::get('/user_home', [UserController::class, 'index']);

    Route::get('/issued_book', [UserController::class, 'issuedBook']);

    Route::post('/search_issued_book', [UserController::class, 'searchIssuedBook']);

    Route::get('/list_book', [UserController::class, 'listBook']);

    Route::post('/search_book', [UserController::class, 'searchBook']);

    Route::get('/profile', [UserController::class, 'profile']);

    Route::post('/update', [UserController::class, 'updateProfile']);

    Route::get('/change_password', [UserController::class, 'changePassword']);

    Route::post('/change_password', [UserController::class, 'updatePassword']);

    Route::get('/logout', [UserController::class, 'logout']);
    
})->middleware('auth');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin_home', [AdminController::class, 'index']);

    Route::get('/list_user', [UserController::class, 'getListUser']);

    Route::post('/search_user', [UserController::class, 'search']);

    Route::get('/user_issue_history{id}', [UserController::class, 'userIssueHistory']);

    Route::post('/search_issue_history{id}', [UserController::class, 'searchIssueHistory']);

    // Route::get('/add_user', [UserController::class, 'create']);

    // Route::post('/add_user', [UserController::class, 'store']);

    // Route::get('/update_user/{id}', [UserController::class, 'edit']);

    Route::post('/update_user{id}', [UserController::class, 'update']);

    Route::get('/delete_user{id}', [UserController::class, 'delete']);

    Route::get('/detail_user{id}', [UserController::class, 'detail']);

    Route::get('/list_author', [AuthorController::class, 'index']);

    Route::get('/add_author', [AuthorController::class, 'create']);

    Route::post('/add_author', [AuthorController::class, 'store']);

    Route::post('/search_author', [AuthorController::class, 'search']);

    Route::get('/add_author{id}', [AuthorController::class, 'edit']);

    Route::post('/add_author{id}', [AuthorController::class, 'update']);

    Route::get('/delete_author{id}', [AuthorController::class, 'delete']);

    Route::get('/list_category', [CategoryController::class, 'index']);

    Route::get('/add_category', [CategoryController::class, 'create']);

    Route::post('/add_category', [CategoryController::class, 'store']);

    Route::post('/search_category', [CategoryController::class, 'search']);

    Route::get('/add_category{id}', [CategoryController::class, 'edit']);

    Route::post('/add_category{id}', [CategoryController::class, 'update']);

    Route::get('/delete_category{id}', [CategoryController::class, 'delete']);

    Route::get('/list_book', [BookController::class, 'index']);

    Route::get('/add_book', [BookController::class, 'create']);

    Route::post('/add_book', [BookController::class, 'store']);

    Route::post('/search_book', [BookController::class, 'search']);

    Route::get('/add_book{id}', [BookController::class, 'edit']);

    Route::post('/add_book{id}', [BookController::class, 'update']);

    Route::get('/delete_book{id}', [BookController::class, 'delete']);

    Route::get('/list_issue', [IssuedBookController::class, 'index']);

    Route::get('/add_issue', [IssuedBookController::class, 'create']);

    Route::post('/add_issue', [IssuedBookController::class, 'store']);

    Route::get('/search_user{key}', [IssuedBookController::class, 'searchUser']);

    Route::get('/search_book{key}', [IssuedBookController::class, 'searchBook']);

    Route::post('/search_issue', [IssuedBookController::class, 'search']);

    Route::get('/add_issue{id}', [IssuedBookController::class, 'edit']);

    Route::post('/add_issue{id}', [IssuedBookController::class, 'update']);

    Route::get('/delete_issue{id}', [IssuedBookController::class, 'delete']);

    Route::get('/change_password', [AdminController::class, 'changePassword']);

    Route::post('/change_password', [AdminController::class, 'updatePassword']);

    Route::get('/logout', [AdminController::class, 'logout']);

})->middleware('auth');