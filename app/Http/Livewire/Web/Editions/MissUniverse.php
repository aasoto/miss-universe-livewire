<?php

namespace App\Http\Livewire\Web\Editions;

use App\Models\Editions\BestNationalCostume;
use App\Models\Editions\Broadcaster;
use App\Models\Editions\Contestant;
use App\Models\Editions\Debut;
use App\Models\Editions\Eighterfinalist;
use App\Models\Editions\EntraimentShow;
use App\Models\Editions\FirstRunnerUp;
use App\Models\Editions\FourthRunnerUp;
use App\Models\Editions\MissCongeniality;
use App\Models\Editions\MissUniverse as EditionsMissUniverse;
use App\Models\Editions\MissUniversePresentatorInterception;
use App\Models\Editions\Photogenic;
use App\Models\Editions\Place;
use App\Models\Editions\Quarterfinalist;
use App\Models\Editions\Returns;
use App\Models\Editions\RunnersUp;
use App\Models\Editions\SecondRunnerUp;
use App\Models\Editions\Semifinalist;
use App\Models\Editions\ThirdRunnerUp;
use App\Models\Editions\Winner;
use App\Models\Editions\Withdrawal;
use App\Models\Owner;
use DateTime;
use Livewire\Component;

class MissUniverse extends Component
{
    public $slug, $page_information;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $edition_information = EditionsMissUniverse::where('slug', $this->slug)->get();
        // setlocale(LC_TIME, 'es_ES.UTF-8');
        // $date = date("Y-m-d H:i:s", strtotime('2015-01-25'));
        // $edition_information[0]->date = strftime("%A, %d de %B de %Y", $date);
        $edition_information[0]->date = new DateTime($edition_information[0]->date);
        $edition_information[0]->date = $edition_information[0]->date->format('j F, Y.');

        /*================== FILTER INFORMATION SECTION ========================*/

        /****** PRESENTERS ******/
        $presenters = MissUniversePresentatorInterception::where('edition_id', $edition_information[0]->id)->get();
        $presenters_array = array();
        foreach ($presenters as $key => $value) {
            $presenters[$key]->presenter = $presenters[$key]->presenter;
            $presenters[$key]->presenter->country = $presenters[$key]->presenter->country;
            $presenters[$key]->presenter->broadcaster = $presenters[$key]->presenter->broadcaster;
            $presenters_array = array_merge($presenters_array, array('presenter_'.$key => $presenters[$key]));
        }
        $presenters = json_decode(json_encode($presenters_array));
        $presenters = json_decode(json_encode($presenters));

        /****** ENTERTAINMENT SHOW ******/
        $entertainment = EntraimentShow::select('artist', 'country_id', 'act_performing')->where('edition_id', $edition_information[0]->id)->get();
        $entertainment_array = array();
        foreach ($entertainment as $key => $value) {
            $entertainment[$key]->country = $entertainment[$key]->country->name;
            $entertainment_array = array_merge($entertainment_array, array('artist_'.$key => $entertainment[$key]));
        }
        $entertainment = json_decode(json_encode($entertainment_array));
        $entertainment = json_decode(json_encode($entertainment));

        /****** VENUE ********/
        $place = Place::where('id', $edition_information[0]->place_id)->get();
        $place[0]->city_venue = $place[0]->city_venue;
        $place[0]->city_venue->country = $place[0]->city_venue->country;

        $place = json_decode(json_encode($place[0]));

        /****** OWNER ********/
        $owner = Owner::where('id', $edition_information[0]->owner_id)->get();
        $owner[0]->country = $owner[0]->country;

        $owner = json_decode(json_encode($owner[0]));

        /****** MAIN BROADCASTER ********/
        $main_broadcaster = Broadcaster::where('id', $edition_information[0]->broadcaster_id)->get();
        $main_broadcaster[0]->country = $main_broadcaster[0]->country;

        $main_broadcaster = json_decode(json_encode($main_broadcaster[0]));

        /****** SECONDARY BROADCASTER ********/
        $secondary_broadcaster = Broadcaster::where('id', $edition_information[0]->broadcaster_2)->get();
        $secondary_broadcaster[0]->country = $secondary_broadcaster[0]->country;

        $secondary_broadcaster = json_decode(json_encode($secondary_broadcaster[0]));

        /****** DEBUTS ******/
        $debuts = Debut::where('edition_id', $edition_information[0]->id)->get();
        $debuts_array = array();
        foreach ($debuts as $key => $value) {
            $debuts[$key]->country = $debuts[$key]->country->name;
            $debuts_array = array_merge($debuts_array, array('debut_'.$key => $debuts[$key]));
        }
        $debuts = json_decode(json_encode($debuts_array));
        $debuts = json_decode(json_encode($debuts));

        /****** WITHDRAWALS ******/
        $withdrawals = Withdrawal::where('edition_id', $edition_information[0]->id)->get();
        $withdrawals_array = array();
        foreach ($withdrawals as $key => $value) {
            $withdrawals[$key]->country = $withdrawals[$key]->country->name;
            $withdrawals_array = array_merge($withdrawals_array, array('withdrawal_'.$key => $withdrawals[$key]));
        }
        $withdrawals = json_decode(json_encode($withdrawals_array));
        $withdrawals = json_decode(json_encode($withdrawals));

        /****** RETURNS ******/
        $returns = Returns::where('edition_id', $edition_information[0]->id)->get();
        $returns_array = array();
        foreach ($returns as $key => $value) {
            $returns[$key]->country = $returns[$key]->country->name;
            $returns_array = array_merge($returns_array, array('return_'.$key => $returns[$key]));
        }
        $returns = json_decode(json_encode($returns_array));
        $returns = json_decode(json_encode($returns));

        /****** WINNER ********/
        $winner = Winner::where('edition_id', $edition_information[0]->id)->get();
        $winner[0]->candidate = $winner[0]->candidate;
        $winner[0]->candidate->country = $winner[0]->candidate->country;

        $winner = json_decode(json_encode($winner[0]));

        /****** FIRST RUNNER UP ********/
        $first_runner_up = FirstRunnerUp::where('edition_id', $edition_information[0]->id)->get();
        $first_runner_up[0]->candidate = $first_runner_up[0]->candidate;
        $first_runner_up[0]->candidate->country = $first_runner_up[0]->candidate->country;

        $first_runner_up = json_decode(json_encode($first_runner_up[0]));

        /****** SECOND RUNNER UP ********/
        $second_runner_up = SecondRunnerUp::where('edition_id', $edition_information[0]->id)->get();
        $second_runner_up[0]->candidate = $second_runner_up[0]->candidate;
        $second_runner_up[0]->candidate->country = $second_runner_up[0]->candidate->country;

        $second_runner_up = json_decode(json_encode($second_runner_up[0]));

        /****** THIRD RUNNER UP ********/
        $third_runner_up = ThirdRunnerUp::where('edition_id', $edition_information[0]->id)->get();
        $third_runner_up[0]->candidate = $third_runner_up[0]->candidate;
        $third_runner_up[0]->candidate->country = $third_runner_up[0]->candidate->country;

        $third_runner_up = json_decode(json_encode($third_runner_up[0]));

        /****** FOURTH RUNNER UP ********/
        $fourth_runner_up = FourthRunnerUp::where('edition_id', $edition_information[0]->id)->get();
        $fourth_runner_up[0]->candidate = $fourth_runner_up[0]->candidate;
        $fourth_runner_up[0]->candidate->country = $fourth_runner_up[0]->candidate->country;

        $fourth_runner_up = json_decode(json_encode($fourth_runner_up[0]));

        /****** RUNNERS UP ******/
        $runners_up = RunnersUp::where('edition_id', $edition_information[0]->id)->get();
        $runners_up_array = array();
        foreach ($runners_up as $key => $value) {
            $runners_up[$key]->candidate = $runners_up[$key]->candidate;
            $runners_up[$key]->candidate->country = $runners_up[$key]->candidate->country;
            $runners_up_array = array_merge($runners_up_array, array('runner_up_'.$key => $runners_up[$key]));
        }
        $runners_up = json_decode(json_encode($runners_up_array));
        $runners_up = json_decode(json_encode($runners_up));

        /****** SEMIFINALISTS ******/
        $semifinalists = Semifinalist::where('edition_id', $edition_information[0]->id)->get();
        $semifinalists_array = array();
        foreach ($semifinalists as $key => $value) {
            $semifinalists[$key]->candidate = $semifinalists[$key]->candidate;
            $semifinalists[$key]->candidate->country = $semifinalists[$key]->candidate->country;
            $semifinalists_array = array_merge($semifinalists_array, array('semifinalist_'.$key => $semifinalists[$key]));
        }
        $semifinalists = json_decode(json_encode($semifinalists_array));
        $semifinalists = json_decode(json_encode($semifinalists));

        /****** QUARTERFINALISTS ******/
        $quarterfinalists = Quarterfinalist::where('edition_id', $edition_information[0]->id)->get();
        $quarterfinalists_array = array();
        foreach ($quarterfinalists as $key => $value) {
            $quarterfinalists[$key]->candidate = $quarterfinalists[$key]->candidate;
            $quarterfinalists[$key]->candidate->country = $quarterfinalists[$key]->candidate->country;
            $quarterfinalists_array = array_merge($quarterfinalists_array, array('quarterfinalist_'.$key => $quarterfinalists[$key]));
        }
        $quarterfinalists = json_decode(json_encode($quarterfinalists_array));
        $quarterfinalists = json_decode(json_encode($quarterfinalists));

        /****** EIGHTERFINALISTS ******/
        $eighterfinalists = Eighterfinalist::where('edition_id', $edition_information[0]->id)->get();
        $eighterfinalists_array = array();
        foreach ($eighterfinalists as $key => $value) {
            $eighterfinalists[$key]->candidate = $eighterfinalists[$key]->candidate;
            $eighterfinalists[$key]->candidate->country = $eighterfinalists[$key]->candidate->country;
            $eighterfinalists_array = array_merge($eighterfinalists_array, array('eighterfinalist_'.$key => $quarterfinalists[$key]));
        }
        $eighterfinalists = json_decode(json_encode($eighterfinalists_array));
        $eighterfinalists = json_decode(json_encode($eighterfinalists));

        /****** MISS CONGENIALITY ******/
        $miss_congeniality = MissCongeniality::where('edition_id', $edition_information[0]->id)->get();
        $miss_congeniality_array = array();
        foreach ($miss_congeniality as $key => $value) {
            $miss_congeniality[$key]->candidate = $miss_congeniality[$key]->candidate;
            $miss_congeniality[$key]->candidate->country = $miss_congeniality[$key]->candidate->country;
            $miss_congeniality_array = array_merge($miss_congeniality_array, array('miss_congeniality_'.$key => $miss_congeniality[$key]));
        }
        $miss_congeniality = json_decode(json_encode($miss_congeniality_array));
        $miss_congeniality = json_decode(json_encode($miss_congeniality));

        /****** MISS PHOTOGENIC ******/
        $miss_photogenic = Photogenic::where('edition_id', $edition_information[0]->id)->get();
        $miss_photogenic_array = array();
        foreach ($miss_photogenic as $key => $value) {
            $miss_photogenic[$key]->candidate = $miss_photogenic[$key]->candidate;
            $miss_photogenic[$key]->candidate->country = $miss_photogenic[$key]->candidate->country;
            $miss_photogenic_array = array_merge($miss_photogenic_array, array('miss_photogenic_'.$key => $miss_photogenic[$key]));
        }
        $miss_photogenic = json_decode(json_encode($miss_photogenic_array));
        $miss_photogenic = json_decode(json_encode($miss_photogenic));

        /****** BEST NATIONAL COSTUME ******/
        $best_national_costume = BestNationalCostume::where('edition_id', $edition_information[0]->id)->get();
        $best_national_costume_array = array();
        foreach ($best_national_costume as $key => $value) {
            $best_national_costume[$key]->candidate = $best_national_costume[$key]->candidate;
            $best_national_costume[$key]->candidate->country = $best_national_costume[$key]->candidate->country;
            $best_national_costume_array = array_merge($best_national_costume_array, array('best_national_costume_'.$key => $best_national_costume[$key]));
        }
        $best_national_costume = json_decode(json_encode($best_national_costume_array));
        $best_national_costume = json_decode(json_encode($best_national_costume));

        /****** CONTESTANTS ******/
        $contestants = Contestant::where('edition_id', $edition_information[0]->id)->get();
        $contestants_array = array();
        foreach ($contestants as $key => $value) {
            $contestants[$key]->candidate = $contestants[$key]->candidate;
            $contestants[$key]->candidate->country = $contestants[$key]->candidate->country;
            $contestants_array = array_merge($contestants_array, array('contestants_'.$key => $contestants[$key]));
        }
        $contestants = json_decode(json_encode($contestants_array));
        $contestants = json_decode(json_encode($contestants));

        /*================== End of FILTERS ===================*/
        $edition_information = json_decode(json_encode($edition_information[0]));

        $this->page_information = array(
            'edition_information' => $edition_information,
            'presenters' => $presenters,
            'entertainment' => $entertainment,
            'place' => $place,
            'owner' => $owner,
            'main_broadcaster' => $main_broadcaster,
            'secondary_broadcaster' => $secondary_broadcaster,
            'debuts' => $debuts,
            'withdrawals' => $withdrawals,
            'returns' => $returns,
            'winner' => $winner,
            'first_runner_up' => $first_runner_up,
            'second_runner_up' => $second_runner_up,
            'third_runner_up' => $third_runner_up,
            'fourth_runner_up' => $fourth_runner_up,
            'runners_up' => $runners_up,
            'semifinalists' => $semifinalists,
            'quarterfinalists' => $quarterfinalists,
            'eighterfinalists' => $eighterfinalists,
            'miss_congeniality' => $miss_congeniality,
            'miss_photogenic' => $miss_photogenic,
            'best_national_costume' => $best_national_costume,
            'contestants' => $contestants
        );
        $this->page_information = json_encode($this->page_information);
        // $this->page_information = '['.$this->page_information.']';
        return view('livewire.web.editions.miss-universe')->layout('layouts.web.layout');
    }
}
