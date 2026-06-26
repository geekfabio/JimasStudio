<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServicePlanController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController as PublicPageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', HomeController::class)->name('home');
Route::get('/empresa/{slug}', [PublicPageController::class, 'show'])->name('pages.show');
Route::get('/servicos', PricingController::class)->name('servicos');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');
Route::get('/noticias/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/contactos', [ContactController::class, 'index'])->name('contact');
Route::post('/contactos', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Rotas Administrativas
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/configuracoes', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/configuracoes', [SiteSettingController::class, 'update'])->name('settings.update');

        Route::resource('services', ServiceCategoryController::class);

        Route::get('services/plans', [ServicePlanController::class, 'index'])->name('services.plans.index');
        Route::post('services/plans', [ServicePlanController::class, 'store'])->name('services.plans.store');
        Route::get('services/plans/create', [ServicePlanController::class, 'create'])->name('services.plans.create');
        Route::resource('plans', ServicePlanController::class)->only(['show', 'edit', 'update', 'destroy'])->names([
            'show' => 'plans.show',
            'edit' => 'plans.edit',
            'update' => 'plans.update',
            'destroy' => 'plans.destroy',
        ]);

        Route::resource('news', AdminNewsController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('portfolio', AdminPortfolioController::class);
        Route::resource('catalog', AdminCatalogController::class);
        Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::resource('pages', PageController::class);
    });
});
