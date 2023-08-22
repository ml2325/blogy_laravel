<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostBlogController;
use App\Http\Controllers\PostController;


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



// Public routes accessible by all users

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('single/{id}', [HomeController::class, 'single'])->name('single');
Route::post('/single/{id}', [HomeController::class, 'storeComment'])->name('post.comment');


Route::get('/search_result', [HomeController::class, 'search_result'])->name('search_result');
Route::get('/search', [HomeController::class, 'search'])->name('search');



Route::get('/my_blogs', [HomeController::class, 'my_blogs'])->name('my_blogs');


Route::get('/category/{name}', [CategoryController::class, 'category'])->name('category');


Route::get('/post_blog', [HomeController::class, 'post_blog'])->name('post_blog');
Route::post('/store_post_blog', [PostBlogController::class, 'store_post_blog'])->name('store_post_blog');
Route::get('/delete_post/{id}', [PostBlogController::class, 'delete'])->name('delete_post');
Route::get('/update_post/{id}', [PostBlogController::class, 'update_post'])->name('update_post');
Route::post('/edit_post/{id}', [PostBlogController::class, 'edit_post'])->name('edit_post');

// Routes for authenticated users

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');



Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');



Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');

Route::get('/create_category', [CategoryController::class, 'create_category'])->name('create_category');
Route::post('/store_category', [CategoryController::class, 'store_category'])->name('store_category');
Route::get('/delete_category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
Route::get('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
Route::post('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');


Route::get('/posts', [PostController::class, 'posts'])->name('posts');
Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete_post');




