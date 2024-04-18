<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend
Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
    Route::get('/','index')->name('index');
    Route::get('/about','about')->name('about');
    Route::get('/book','book')->name('book');
    Route::get('/book/show/{id}','show_book')->name('book.show');
    Route::get('/team','team')->name('team');
    Route::post('feedback', 'feedback')->name('feedback.store');
});

//ORDER
Route::controller(\App\Http\Controllers\Frontend\OrderController::class)->middleware(['auth'])->group(function (){
    Route::get('/book/order/{id}','order')->name('book.show_order');
    Route::post('/book/order','booking_order')->name('book.book.order');
    Route::get('/my-orders','my_order')->name('my_order');
});

//ADMIN
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::controller(\App\Http\Controllers\Admin\FeedbackController::class)->group(function () {
        Route::get('feedback','index')->name('admin.feedback-all');
        Route::get('feedback/delete/{id}','destroy')->name('admin.feedback-destroy');
        Route::get('feedback/change-status/{id}/{status}','changeStatus');
    });

    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.index');
    });

    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('orders','index')->name('admin.orders');
    });

    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function (){
        Route::get('users','index')->name('admin.users');
        Route::post('user/{id}/recharge', 'recharge')->name('admin.user-recharge');
    });

    Route::controller(\App\Http\Controllers\Admin\CenterController::class)->group(function (){
        Route::get('center','index')->name('admin.center-all');
        Route::get('center/create', 'create')->name('admin.center-create');
        Route::post('center', 'store')->name('admin.center-insert');
        Route::get('center/edit/{id}','edit')->name('admin.center-edit');
        Route::put('center/{id}','update')->name('admin.center-update');
        Route::get('center/delete/{id}','destroy')->name('admin.center-destroy');

        Route::get('center/image/{id}', 'centerImage')->name('admin.center-image');
        Route::post('center/image/{id}', 'centerPostImage');
        Route::get('center/image/delete/{id}', 'removeImage');
    });

    Route::controller(\App\Http\Controllers\Admin\GameController::class)->group(function (){
        Route::get('game','index')->name('admin.game-all');
        Route::get('game/create', 'create')->name('admin.game-create');
        Route::post('game', 'store')->name('admin.game-insert');
        Route::get('game/edit/{id}','edit')->name('admin.game-edit');
        Route::put('game/{id}','update')->name('admin.game-update');
        Route::get('game/delete/{id}','destroy')->name('admin.game-destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\CenterGameController::class)->group(function (){
        Route::get('center-games','index')->name('admin.center-games-all');
        Route::get('center-games/create', 'create')->name('admin.center-games-create');
        Route::post('center-games', 'store');
        Route::get('center-games/edit/{id}','edit')->name('admin.center-games.edit');

        Route::get('center-games/add/{centerId}/{gameId}','addAction')->name('admin.center-games.add');
        Route::get('center-games/remove/{centerId}/{gameId}','removeAction')->name('admin.center-games.remove');
    });
});

//Moderator
Route::prefix('moderator')->middleware(['auth', 'isModerator'])->group(function () {
    Route::controller(\App\Http\Controllers\Moderator\DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('moderator.index');
        Route::get('orders','orders')->name('moderator.order');

        Route::put('order/change-status/{id}','changeStatus')->name('moderator.change-status');
    });
});