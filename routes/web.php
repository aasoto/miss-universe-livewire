<?php

use App\Http\Livewire\Dashboard\Candidate\Index;
use App\Http\Livewire\Dashboard\Candidate\Save;
use App\Http\Livewire\Dashboard\Carousel\Index as CarouselIndex;
use App\Http\Livewire\Dashboard\Carousel\Save as CarouselSave;
use App\Http\Livewire\Dashboard\NationalCommittee\Index as NationalCommitteeIndex;
use App\Http\Livewire\Dashboard\NationalCommittee\Save as NationalCommitteeSave;
use App\Http\Livewire\Dashboard\News\Index as NewsIndex;
use App\Http\Livewire\Dashboard\News\Save as NewsSave;
use App\Http\Livewire\Sponsor\Company;
use App\Http\Livewire\Sponsor\Detail;
use App\Http\Livewire\Sponsor\General;
use App\Http\Livewire\Sponsor\Person;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    //CRUDS
    Route::group(['prefix' => 'candidate'], function () {
        Route::get('/', Index::class)->name('d-candidate-index');
        Route::get('/create', Save::class)->name('d-candidate-create');
        Route::get('/edit/{id}', Save::class)->name('d-candidate-edit');
    });

    Route::group(['prefix' => 'national-committee'], function () {
        Route::get('/', NationalCommitteeIndex::class)->name('d-nationalcommittee-index');
        Route::get('/create', NationalCommitteeSave::class)->name('d-nationalcommittee-create');
        Route::get('/edit/{id}', NationalCommitteeSave::class)->name('d-nationalcommittee-edit');
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', NewsIndex::class)->name('d-news-index');
        Route::get('/create', NewsSave::class)->name('d-news-create');
        Route::get('/edit/{id}', NewsSave::class)->name('d-news-edit');
    });

    Route::group(['prefix' => 'carousel'], function () {
        Route::get('/', CarouselIndex::class)->name('d-carousel-index');
        Route::get('/create', CarouselSave::class)->name('d-carousel-create');
        Route::get('/edit/{id}', CarouselSave::class)->name('d-carousel-edit');
    });
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'],
'prefix' => 'sponsor'], function () {
    Route::get('/', General::class)->name('general');
});

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
