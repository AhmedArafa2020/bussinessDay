<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ThankYouController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');
Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:5,1') //to prevent send same request
    ->name('leads.store');
Route::get(
    '/thank-you',
    [ThankYouController::class, 'index']
)->name('thank-you');
Route::get(
    '/founding-release',
    [CampaignController::class, 'index']
)->name('campaign');
Route::get(
    '/journal',
    [JournalController::class, 'index']
)->name('journal.index');

Route::get(
    '/journal/{post}',
    [JournalController::class, 'show']
)->name('journal.show');
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
//Route::get('/server-check', function () {
//    return response()->json([
//        'php_version' => PHP_VERSION,
//        'php_sapi' => PHP_SAPI,
//        'loaded_php_ini' => php_ini_loaded_file(),
//
//        'opcache_loaded' => extension_loaded('Zend OPcache'),
//        'opcache_enabled' => ini_get('opcache.enable'),
//        'opcache_cli_enabled' => ini_get('opcache.enable_cli'),
//
//        'realpath_cache_size' => ini_get('realpath_cache_size'),
//        'realpath_cache_ttl' => ini_get('realpath_cache_ttl'),
//    ]);
//});
Route::get('/speed-view', function () {
    return view('speed-test');
});
