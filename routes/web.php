<?php

use App\Http\Livewire\Blog\Index as BlogIndex;
use App\Http\Livewire\Blog\News\Show as NewsShow;
use App\Http\Livewire\Dashboard\Candidate\Index;
use App\Http\Livewire\Dashboard\Candidate\Save;
use App\Http\Livewire\Dashboard\Carousel\Index as CarouselIndex;
use App\Http\Livewire\Dashboard\Carousel\Save as CarouselSave;
use App\Http\Livewire\Dashboard\Editions\BestNationalCostumes\Index as BestNationalCostumesIndex;
use App\Http\Livewire\Dashboard\Editions\BestNationalCostumes\Save as BestNationalCostumesSave;
use App\Http\Livewire\Dashboard\Editions\Broadcaster\Index as BroadcasterIndex;
use App\Http\Livewire\Dashboard\Editions\Broadcaster\Save as BroadcasterSave;
use App\Http\Livewire\Dashboard\Editions\CityVenue\Index as CityVenueIndex;
use App\Http\Livewire\Dashboard\Editions\CityVenue\Save as CityVenueSave;
use App\Http\Livewire\Dashboard\Editions\Contestants\Index as ContestantsIndex;
use App\Http\Livewire\Dashboard\Editions\Contestants\Save as ContestantsSave;
use App\Http\Livewire\Dashboard\Editions\Debuts\Index as DebutsIndex;
use App\Http\Livewire\Dashboard\Editions\Debuts\Save as DebutsSave;
use App\Http\Livewire\Dashboard\Editions\Eighterfinalists\Index as EighterfinalistsIndex;
use App\Http\Livewire\Dashboard\Editions\Eighterfinalists\Save as EighterfinalistsSave;
use App\Http\Livewire\Dashboard\Editions\EntraimentShow\Index as EntraimentShowIndex;
use App\Http\Livewire\Dashboard\Editions\EntraimentShow\Save as EntraimentShowSave;
use App\Http\Livewire\Dashboard\Editions\FirstRunnerUps\Index as FirstRunnerUpsIndex;
use App\Http\Livewire\Dashboard\Editions\FirstRunnerUps\Save as FirstRunnerUpsSave;
use App\Http\Livewire\Dashboard\Editions\FourthRunnerUps\Index as FourthRunnerUpsIndex;
use App\Http\Livewire\Dashboard\Editions\FourthRunnerUps\Save as FourthRunnerUpsSave;
use App\Http\Livewire\Dashboard\Editions\MissCongeniality\Index as MissCongenialityIndex;
use App\Http\Livewire\Dashboard\Editions\MissCongeniality\Save as MissCongenialitySave;
use App\Http\Livewire\Dashboard\Editions\MissUniverse\Index as MissUniverseIndex;
use App\Http\Livewire\Dashboard\Editions\MissUniverse\Save as MissUniverseSave;
use App\Http\Livewire\Dashboard\Editions\Photogenic\Index as PhotogenicIndex;
use App\Http\Livewire\Dashboard\Editions\Photogenic\Save as PhotogenicSave;
use App\Http\Livewire\Dashboard\Editions\Places\Index as PlacesIndex;
use App\Http\Livewire\Dashboard\Editions\Places\Save as PlacesSave;
use App\Http\Livewire\Dashboard\Editions\Presenters\Index as PresentersIndex;
use App\Http\Livewire\Dashboard\Editions\Presenters\PresenterToEdition;
use App\Http\Livewire\Dashboard\Editions\Presenters\Save as PresentersSave;
use App\Http\Livewire\Dashboard\Editions\Quarterfinalists\Index as QuarterfinalistsIndex;
use App\Http\Livewire\Dashboard\Editions\Quarterfinalists\Save as QuarterfinalistsSave;
use App\Http\Livewire\Dashboard\Editions\Returns\Index as ReturnsIndex;
use App\Http\Livewire\Dashboard\Editions\Returns\Save as ReturnsSave;
use App\Http\Livewire\Dashboard\Editions\RunnersUps\Index as RunnersUpsIndex;
use App\Http\Livewire\Dashboard\Editions\RunnersUps\Save as RunnersUpsSave;
use App\Http\Livewire\Dashboard\Editions\SecondRunnerUps\Index as SecondRunnerUpsIndex;
use App\Http\Livewire\Dashboard\Editions\SecondRunnerUps\Save as SecondRunnerUpsSave;
use App\Http\Livewire\Dashboard\Editions\Semifinalists\Index as SemifinalistsIndex;
use App\Http\Livewire\Dashboard\Editions\Semifinalists\Save as SemifinalistsSave;
use App\Http\Livewire\Dashboard\Editions\SpecialAwards\Index as SpecialAwardsIndex;
use App\Http\Livewire\Dashboard\Editions\SpecialAwards\Save as SpecialAwardsSave;
use App\Http\Livewire\Dashboard\Editions\ThirdRunnerUps\Index as ThirdRunnerUpsIndex;
use App\Http\Livewire\Dashboard\Editions\ThirdRunnerUps\Save as ThirdRunnerUpsSave;
use App\Http\Livewire\Dashboard\Editions\Winners\Index as WinnersIndex;
use App\Http\Livewire\Dashboard\Editions\Winners\Save as WinnersSave;
use App\Http\Livewire\Dashboard\Editions\Withdrawals\Index as WithdrawalsIndex;
use App\Http\Livewire\Dashboard\Editions\Withdrawals\Save as WithdrawalsSave;
use App\Http\Livewire\Dashboard\NationalCommittee\Index as NationalCommitteeIndex;
use App\Http\Livewire\Dashboard\NationalCommittee\Save as NationalCommitteeSave;
use App\Http\Livewire\Dashboard\News\Index as NewsIndex;
use App\Http\Livewire\Dashboard\News\Save as NewsSave;
use App\Http\Livewire\Dashboard\Owner\Index as OwnerIndex;
use App\Http\Livewire\Dashboard\Owner\Save as OwnerSave;
use App\Http\Livewire\News\Qualify;
use App\Http\Livewire\Sponsor\Company;
use App\Http\Livewire\Sponsor\Detail;
use App\Http\Livewire\Sponsor\General;
use App\Http\Livewire\Sponsor\Person;
use App\Http\Livewire\Web\Editions\Index as EditionsIndex;
use App\Http\Livewire\Web\Editions\MissUniverse;
use App\Http\Livewire\Web\Index as WebIndex;
use App\Http\Livewire\Web\News\Index as WebNewsIndex;
use App\Http\Livewire\Web\News\Show as WebNewsShow;
use App\Http\Livewire\Web\News\Tag;
use App\Http\Middleware\LocaleCookieMiddleware;
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
    Route::get('/news/tag/{tag}', Tag::class)->name('news-tag');
    Route::get('/editions', EditionsIndex::class)->name('miss-universe-list-editions');
    Route::get('/editions/{slug}', MissUniverse::class)->name('miss-universe-edition');
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', LocaleCookieMiddleware::class], 'prefix' => 'dashboard'], function () {
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

    Route::group(['prefix' => 'owner'], function () {
        Route::get('/', OwnerIndex::class)->name('d-owner-index');
        Route::get('/create', OwnerSave::class)->name('d-owner-create');
        Route::get('/edit/{id}', OwnerSave::class)->name('d-owner-edit');
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
            Route::get('/attach/{id}', PresenterToEdition::class)->name('d-editions-presenter-attach');
        });
        Route::group(['prefix' => 'entertainment_show'], function () {
            Route::get('/', EntraimentShowIndex::class)->name('d-editions-entertainment-show-index');
            Route::get('/create', EntraimentShowSave::class)->name('d-editions-entertainment-show-create');
            Route::get('/edit/{id}', EntraimentShowSave::class)->name('d-editions-entertainment-show-edit');
        });
        Route::group(['prefix' => 'debut'], function () {
            Route::get('/', DebutsIndex::class)->name('d-editions-debut-index');
            Route::get('/create', DebutsSave::class)->name('d-editions-debut-create');
            Route::get('/edit/{id}', DebutsSave::class)->name('d-editions-debut-edit');
        });
        Route::group(['prefix' => 'withdrawal'], function () {
            Route::get('/', WithdrawalsIndex::class)->name('d-editions-withdrawal-index');
            Route::get('/create', WithdrawalsSave::class)->name('d-editions-withdrawal-create');
            Route::get('/edit/{id}', WithdrawalsSave::class)->name('d-editions-withdrawal-edit');
        });
        Route::group(['prefix' => 'return'], function () {
            Route::get('/', ReturnsIndex::class)->name('d-editions-return-index');
            Route::get('/create', ReturnsSave::class)->name('d-editions-return-create');
            Route::get('/edit/{id}', ReturnsSave::class)->name('d-editions-return-edit');
        });
        Route::group(['prefix' => 'contestant'], function () {
            Route::get('/', ContestantsIndex::class)->name('d-editions-contestant-index');
            Route::get('/create', ContestantsSave::class)->name('d-editions-contestant-create');
            Route::get('/edit/{id}', ContestantsSave::class)->name('d-editions-contestant-edit');
        });
        Route::group(['prefix' => 'winner'], function () {
            Route::get('/', WinnersIndex::class)->name('d-editions-winner-index');
            Route::get('/create', WinnersSave::class)->name('d-editions-winner-create');
            Route::get('/edit/{id}', WinnersSave::class)->name('d-editions-winner-edit');
        });
        Route::group(['prefix' => 'first_runner_up'], function () {
            Route::get('/', FirstRunnerUpsIndex::class)->name('d-editions-first-runner-up-index');
            Route::get('/create', FirstRunnerUpsSave::class)->name('d-editions-first-runner-up-create');
            Route::get('/edit/{id}', FirstRunnerUpsSave::class)->name('d-editions-first-runner-up-edit');
        });
        Route::group(['prefix' => 'second_runner_up'], function () {
            Route::get('/', SecondRunnerUpsIndex::class)->name('d-editions-second-runner-up-index');
            Route::get('/create', SecondRunnerUpsSave::class)->name('d-editions-second-runner-up-create');
            Route::get('/edit/{id}', SecondRunnerUpsSave::class)->name('d-editions-second-runner-up-edit');
        });
        Route::group(['prefix' => 'third_runner_up'], function () {
            Route::get('/', ThirdRunnerUpsIndex::class)->name('d-editions-third-runner-up-index');
            Route::get('/create', ThirdRunnerUpsSave::class)->name('d-editions-third-runner-up-create');
            Route::get('/edit/{id}', ThirdRunnerUpsSave::class)->name('d-editions-third-runner-up-edit');
        });
        Route::group(['prefix' => 'fourth_runner_up'], function () {
            Route::get('/', FourthRunnerUpsIndex::class)->name('d-editions-fourth-runner-up-index');
            Route::get('/create', FourthRunnerUpsSave::class)->name('d-editions-fourth-runner-up-create');
            Route::get('/edit/{id}', FourthRunnerUpsSave::class)->name('d-editions-fourth-runner-up-edit');
        });
        Route::group(['prefix' => 'runners_ups'], function () {
            Route::get('/', RunnersUpsIndex::class)->name('d-editions-runners-ups-index');
            Route::get('/create', RunnersUpsSave::class)->name('d-editions-runners-ups-create');
            Route::get('/edit/{id}', RunnersUpsSave::class)->name('d-editions-runners-ups-edit');
        });
        Route::group(['prefix' => 'semifinalists'], function () {
            Route::get('/', SemifinalistsIndex::class)->name('d-editions-semifinalists-index');
            Route::get('/create', SemifinalistsSave::class)->name('d-editions-semifinalists-create');
            Route::get('/edit/{id}', SemifinalistsSave::class)->name('d-editions-semifinalists-edit');
        });
        Route::group(['prefix' => 'quarterfinalists'], function () {
            Route::get('/', QuarterfinalistsIndex::class)->name('d-editions-quarterfinalists-index');
            Route::get('/create', QuarterfinalistsSave::class)->name('d-editions-quarterfinalists-create');
            Route::get('/edit/{id}', QuarterfinalistsSave::class)->name('d-editions-quarterfinalists-edit');
        });
        Route::group(['prefix' => 'eighterfinalists'], function () {
            Route::get('/', EighterfinalistsIndex::class)->name('d-editions-eighterfinalists-index');
            Route::get('/create', EighterfinalistsSave::class)->name('d-editions-eighterfinalists-create');
            Route::get('/edit/{id}', EighterfinalistsSave::class)->name('d-editions-eighterfinalists-edit');
        });
        Route::group(['prefix' => 'best_national_costume'], function () {
            Route::get('/', BestNationalCostumesIndex::class)->name('d-editions-best-national-costume-index');
            Route::get('/create', BestNationalCostumesSave::class)->name('d-editions-best-national-costume-create');
            Route::get('/edit/{id}', BestNationalCostumesSave::class)->name('d-editions-best-national-costume-edit');
        });
        Route::group(['prefix' => 'miss_congeniality'], function () {
            Route::get('/', MissCongenialityIndex::class)->name('d-editions-miss-congeniality-index');
            Route::get('/create', MissCongenialitySave::class)->name('d-editions-miss-congeniality-create');
            Route::get('/edit/{id}', MissCongenialitySave::class)->name('d-editions-miss-congeniality-edit');
        });
        Route::group(['prefix' => 'miss_photogenic'], function () {
            Route::get('/', PhotogenicIndex::class)->name('d-editions-miss-photogenic-index');
            Route::get('/create', PhotogenicSave::class)->name('d-editions-miss-photogenic-create');
            Route::get('/edit/{id}', PhotogenicSave::class)->name('d-editions-miss-photogenic-edit');
        });
        Route::group(['prefix' => 'special_awards'], function () {
            Route::get('/', SpecialAwardsIndex::class)->name('d-editions-special-awards-index');
            Route::get('/create', SpecialAwardsSave::class)->name('d-editions-special-awards-create');
            Route::get('/edit/{id}', SpecialAwardsSave::class)->name('d-editions-special-awards-edit');
        });
    });
});

Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
})->name('language');

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
