<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CraftProductsController;
use App\Http\Controllers\CraftsCategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VisitBookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home.index');

Route::get('/news', NewsController::class)->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'showNews'])->name('news.show');

Route::get('/crafts', CraftsCategoriesController::class)->name('crafts.index');

Route::get('/category/{id}/products', [CraftProductsController::class, 'showProducts'])->name('products.index');

Route::get('/activities', ActivitiesController::class)->name('activities.index');
Route::get('/activities/{id}', [ActivitiesController::class, 'showActivity'])->name('activities.show');

Route::get('/about', AboutController::class)->name('about.index');

Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

Route::get('/contact', ContactController::class)->name('contact.index');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/api/available-slots', [VisitBookingController::class, 'getAvailableSlots']);
Route::post('/visits', [VisitBookingController::class, 'store'])->name('visits.store');
Route::delete('/visits/cancel', [VisitBookingController::class, 'cancel'])->name('visits.cancel');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['mk', 'sq', 'en'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('lang.switch');

Route::get('/guard/login', [GuardController::class, 'showLogin'])->name('guard.login');
Route::post('/guard/login', [GuardController::class, 'login'])->name('guard.login.submit');
Route::post('/guard/logout', [GuardController::class, 'logout'])->name('guard.logout');

Route::middleware(['guard.role'])->group(function () {
    Route::get('/guard', [GuardController::class, 'index'])->name('guard.kiosk');
    Route::post('/guard/check-pin', [GuardController::class, 'checkPin'])->name('guard.checkPin');
    Route::post('/guard/mark-attended/{id}', [GuardController::class, 'markAttended'])->name('guard.markAttended');
});
