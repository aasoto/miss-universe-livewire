<?php

use App\Http\Livewire\Blog\Index as BlogIndex;
use App\Http\Livewire\Blog\News\Show as NewsShow;
use App\Http\Livewire\Dashboard\Candidate\Index;
use App\Http\Livewire\Dashboard\Candidate\Save;
use App\Http\Livewire\Dashboard\Carousel\Index as CarouselIndex;
use App\Http\Livewire\Dashboard\Carousel\Save as CarouselSave;
use App\Http\Livewire\Dashboard\Editions\Broadcaster\Index as BroadcasterIndex;
use App\Http\Livewire\Dashboard\Editions\Broadcaster\Save as BroadcasterSave;
use App\Http\Livewire\Dashboard\Editions\CityVenue\Index as CityVenueIndex;
use App\Http\Livewire\Dashboard\Editions\CityVenue\Save as CityVenueSave;
use App\Http\Livewire\Dashboard\Editions\EntraimentShow\Index as EntraimentShowIndex;
use App\Http\Livewire\Dashboard\Editions\EntraimentShow\Save as EntraimentShowSave;
use App\Http\Livewire\Dashboard\Editions\MissUniverse\Index as MissUniverseIndex;
use App\Http\Livewire\Dashboard\Editions\MissUniverse\Save as MissUniverseSave;
use App\Http\Livewire\Dashboard\Editions\Places\Index as PlacesIndex;
use App\Http\Livewire\Dashboard\Editions\Places\Save as PlacesSave;
use App\Http\Livewire\Dashboard\Editions\Presenters\Index as PresentersIndex;
use App\Http\Livewire\Dashboard\Editions\Presenters\Save as PresentersSave;
use App\Http\Livewire\Dashboard\NationalCommittee\Index as NationalCommitteeIndex;
use App\Http\Livewire\Dashboard\NationalCommittee\Save as NationalCommitteeSave;
use App\Http\Livewire\Dashboard\News\Index as NewsIndex;
use App\Http\Livewire\Dashboard\News\Save as NewsSave;
use App\Http\Livewire\News\Qualify;
use App\Http\Livewire\Sponsor\Company;
use App\Http\Livewire\Sponsor\Detail;
use App\Http\Livewire\Sponsor\General;
use App\Http\Livewire\Sponsor\Person;
use App\Http\Livewire\Web\Index as WebIndex;
use App\Http\Livewire\Web\News\Index as WebNewsIndex;
use App\Http\Livewire\Web\News\Show as WebNewsShow;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => ''], function () {
    Route::get('/', WebIndex::class)->name('start');
    Route::get('/news/all', WebNewsIndex::class)->name('news-index');
    Route::get('/news/show/{slug}', WebNewsShow::class)->name('news-show');
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

    Route::group(['prefix' => 'editions'], function () {
        Route::group(['prefix' => 'broadcaster'], function () {
            Route::get('/', BroadcasterIndex::class)->name('d-editions-broadcaster-index');
            Route::get('/create', BroadcasterSave::class)->name('d-editions-broadcaster-create');
            Route::get('/edit/{id}', BroadcasterSave::class)->name('d-editions-broadcaster-edit');
        });
        Route::group(['prefix' => 'city_venue'], function () {
            Route::get('/', CityVenueIndex::class)->name('d-editions-city-venue-index');
            Route::get('/create', CityVenueSave::class)->name('d-editions-city-venue-create');
            Route::get('/edit/{id}', CityVenueSave::class)->name('d-editions-city-venue-edit');
        });
        Route::group(['prefix' => 'place'], function () {
            Route::get('/', PlacesIndex::class)->name('d-editions-place-index');
            Route::get('/create', PlacesSave::class)->name('d-editions-place-create');
            Route::get('/edit/{id}', PlacesSave::class)->name('d-editions-place-edit');
        });
        Route::group(['prefix' => 'miss_universe'], function () {
            Route::get('/', MissUniverseIndex::class)->name('d-editions-miss-universe-index');
            Route::get('/create', MissUniverseSave::class)->name('d-editions-miss-universe-create');
            Route::get('/edit/{id}', MissUniverseSave::class)->name('d-editions-miss-universe-edit');
        });
        Route::group(['prefix' => 'presenter'], function () {
            Route::get('/', PresentersIndex::class)->name('d-editions-presenter-index');
            Route::get('/create', PresentersSave::class)->name('d-editions-presenter-create');
            Route::get('/edit/{id}', PresentersSave::class)->name('d-editions-presenter-edit');
        });
        Route::group(['prefix' => 'entertainment_show'], function () {
            Route::get('/', EntraimentShowIndex::class)->name('d-editions-entertainment-show-index');
            Route::get('/create', EntraimentShowSave::class)->name('d-editions-entertainment-show-create');
            Route::get('/edit/{id}', EntraimentShowSave::class)->name('d-editions-entertainment-show-edit');
        });
    });
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', BlogIndex::class)->name('web-index');
    Route::get('/news/{slug}', NewsShow::class)->name('web-news-show');
});

Route::group(['prefix' => 'web'], function () {
    Route::get('/', WebIndex::class)->name('index');
});

Route::group(['prefix' => 'qualify'], function () {
    Route::get('/qualifies-list', Qualify::class)->name('news-qualifies');
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
