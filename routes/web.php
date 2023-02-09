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

/*Route::get('email',function(){

    return new App\Mail\LoginCredentials(App\Models\User::first(),'1234');

});*/

//Route::get('/',[App\Http\Controllers\PagesController::class, 'home'])->name('page.home');
Route::get('/',[App\Http\Controllers\PagesController::class, 'spa'])->name('page.home');
 

Route::get('about',[App\Http\Controllers\PagesController::class, 'about'])->name('page.about');
Route::get('archive',[App\Http\Controllers\PagesController::class, 'archive'])->name('page.archive');
Route::get('contact',[App\Http\Controllers\PagesController::class, 'contact'])->name('page.contact');


Route::get('blog/{post}',[App\Http\Controllers\PostsController::class, 'show'])->name('post.show');
Route::get('categories/{category}',[App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');
Route::get('tags/{tag}',[App\Http\Controllers\TagsController::class, 'show'])->name('tags.show');


Route::group([
    'middleware'=>'auth',
    'prefix'=>'admin',
    'as'=>'admin.'
], 
function(){
    
    Route::resource('posts','App\Http\Controllers\admin\PostsController',['except'=>'show']);
    Route::resource('users','App\Http\Controllers\admin\UsersController');
    Route::resource('roles','App\Http\Controllers\admin\RolesController',['except'=>'show']);
    Route::resource('permissions','App\Http\Controllers\admin\PermissionsController',['only'=>['index','edit','update']]);

    /*Route::get('admin/posts',[App\Http\Controllers\admin\PostsController::class, 'index'])->name('admin.posts.index');
    
    Route::get('admin/posts/create',[App\Http\Controllers\admin\PostsController::class, 'create'])->name('admin.posts.create');
    
    Route::post('admin/posts',[App\Http\Controllers\admin\PostsController::class, 'store'])->name('admin.posts.store');
    
    Route::get('admin/posts/{post}',[App\Http\Controllers\admin\PostsController::class, 'edit'])->name('admin.posts.edit');
    
    Route::put('admin/posts/{post}',[App\Http\Controllers\admin\PostsController::class, 'update'])->name('admin.posts.update');
    
    Route::delete('admin/posts/{post}',[App\Http\Controllers\admin\PostsController::class, 'destroy'])->name('admin.posts.destroy');*/
}); 

Route::group([
    'middleware'=>'auth',
], 
function(){
    Route::post('admin/posts/{post}/photos',[App\Http\Controllers\admin\PhotosController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('admin/photos/{photo}',[App\Http\Controllers\admin\PhotosController::class, 'destroy'])->name('admin.photos.destroy');
    Route::get('home',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    
    Route::middleware('role:Admin')
        ->put('admin/users/{user}/roles',[App\Http\Controllers\admin\UsersRolesController::class, 'update'])
        ->name('admin.users.roles.update');
    
    Route::middleware('role:Admin')
        ->put('admin/users/{user}/permissions',[App\Http\Controllers\admin\UsersPermissionsController::class, 'update'])
        ->name('admin.users.permissions.update');
    
}); 

Route::auth();
