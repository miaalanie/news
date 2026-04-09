<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

// ======================================================================================================================================
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page');
    Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
    Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');
    Route::get('/today-news', [FrontendController::class, 'todayNews'])->name('today.news');
    Route::get('/politik-news', [FrontendController::class, 'politikNews'])->name('politik.news');
    Route::get('/tekno-news', [FrontendController::class, 'teknoNews'])->name('tekno.news');
    Route::get('/hiburan-news', [FrontendController::class, 'hiburanNews'])->name('hiburan.news');
    Route::get('/detail/{slug}', [FrontendController::class, 'detail'])->name('detail');
    Route::get('/search-news', [FrontendController::class, 'searchNews'])->name('search.news');

