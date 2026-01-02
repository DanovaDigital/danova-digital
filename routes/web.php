<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\WorkController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'show'])->name('landing');

Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.detail');

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim(config('app.url'), '/');
    $now = now()->toAtomString();

    $urls = [];
    $urls[] = [
        'loc' => $baseUrl . '/',
        'lastmod' => $now,
        'changefreq' => 'weekly',
        'priority' => '1.0',
    ];

    foreach (Project::query()->select(['slug', 'updated_at'])->orderBy('id')->get() as $project) {
        $urls[] = [
            'loc' => $baseUrl . route('work.detail', ['slug' => $project->slug], false),
            'lastmod' => optional($project->updated_at)->toAtomString() ?: $now,
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];
    }

    $xml = view('sitemap', ['urls' => $urls])->render();

    return response($xml, 200)
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/out/whatsapp', [OutboundController::class, 'whatsapp'])->name('out.whatsapp');
Route::get('/out/email', [OutboundController::class, 'email'])->name('out.email');
Route::get('/out/pricing', [OutboundController::class, 'pricing'])->name('out.pricing');

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

        Route::middleware('admin.auth')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

            Route::resource('pricing-plans', PricingPlanController::class);
            Route::resource('projects', ProjectController::class);
            Route::resource('testimonials', TestimonialController::class);
            Route::resource('faqs', FaqController::class);
            Route::resource('settings', SiteSettingController::class)->except(['show']);
            Route::post('/settings/bulk-update', [SiteSettingController::class, 'bulkUpdate'])->name('settings.bulk-update');
            Route::resource('media', MediaController::class)->except(['show']);
        });
    });
