<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signup', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::prefix("admin")->group(function(){
    //admin
    Route::get('/', [AdminController::class, "dashboard"])->name("admin.dashboard");
    Route::get('/settings', [AdminController::class, 'createOrUpdate'])->name('settings.createOrUpdate');
    Route::post('/settings', [AdminController::class, 'saveOrUpdate'])->name('settings.saveOrUpdate');



    Route::controller(CategoryController::class)->group(function(){
        Route::match(["get", "post"], "/category", "index")->name("admin.category");
        Route::post("/category/{cat_id}/update", "updateCategory")->name("admin.category.update");
        Route::delete("/category/{cat_id}/delete", "deleteCategory")->name("admin.category.delete");
    });

    Route::controller(ProductController::class)->group(function(){
        Route::prefix("product")->group(function(){
            Route::get("/", "index")->name("admin.product");
            Route::get("/insert_product", "insert")->name("admin.inset_product");
            Route::post("/store", "store")->name("admin.product.store");
            Route::post("/{product_id}/update", "update")->name("admin.product.update");
            Route::delete("/{product_id}/delete", "delete")->name("admin.product.delete");
        });
        
    });
});

