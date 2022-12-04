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
        if ($edition_information[0]->date) {
            setlocale(LC_TIME, "spanish");
            $date = new Datetime($edition_information[0]->date);
            $edition_information[0]->date = strftime("%A %d de %B de %Y", $date->getTimestamp());
        }

        /*================== FILTER INFORMATION SECTION ========================*/

        /****** PRESENTERS ******/
        $presenters = $this->presenters($edition_information[0]->id);

        /****** ENTERTAINMENT SHOW ******/
        $entertainment = $this->entertainment($edition_information[0]->id);

        /****** VENUE ********/
        $place = $this->place($edition_information[0]->id);

        /****** OWNER ********/
        $owner = $this->owner($edition_information[0]->id);

        /****** MAIN BROADCASTER ********/
        $main_broadcaster = $this->main_broadcaster($edition_information[0]->broadcaster_id);

        /****** SECONDARY BROADCASTER ********/
        $secondary_broadcaster = $this->secondary_broadcaster($edition_information[0]->broadcaster_2);

        /****** DEBUTS ******/
        $debuts = $this->debuts($edition_information[0]->id);

        /****** WITHDRAWALS ******/
        $withdrawals = $this->withdrawals($edition_information[0]->id);

        /****** RETURNS ******/
        $returns = $this->returns($edition_information[0]->id);

        /****** WINNER ********/
        $winner = $this->winner($edition_information[0]->id);

        /****** FIRST RUNNER UP ********/
        $first_runner_up = $this->first_runner_up($edition_information[0]->id);

        /****** SECOND RUNNER UP ********/
        $second_runner_up = $this->second_runner_up($edition_information[0]->id);

        /****** THIRD RUNNER UP ********/
        $third_runner_up = $this->third_runner_up($edition_information[0]->id);

        /****** FOURTH RUNNER UP ********/
        $fourth_runner_up = $this->fourth_runner_up($edition_information[0]->id);

        /****** RUNNERS UP ******/
        $runners_up = $this->runners_up($edition_information[0]->id);

        /****** SEMIFINALISTS ******/
        $semifinalists = $this->semifinalists($edition_information[0]->id);

        /****** QUARTERFINALISTS ******/
        $quarterfinalists = $this->quarterfinalists($edition_information[0]->id);

        /****** EIGHTERFINALISTS ******/
        $eighterfinalists = $this->eighterfinalists($edition_information[0]->id);

        /****** MISS CONGENIALITY ******/
        $miss_congeniality = $this->miss_congeniality($edition_information[0]->id);

        /****** MISS PHOTOGENIC ******/
        $miss_photogenic = $this->miss_photogenic($edition_information[0]->id);

        /****** BEST NATIONAL COSTUME ******/
        $best_national_costume = $this->best_national_costume($edition_information[0]->id);

        /****** CONTESTANTS ******/
        $contestants = $this->contestants($edition_information[0]->id);

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

        return view('livewire.web.editions.miss-universe')->layout('layouts.web.layout');
    }

    public function presenters($id)
    {
        $presenters = MissUniversePresentatorInterception::where('edition_id', $id)->get();
        $presenters_array = array();
        $flag = false;
        foreach ($presenters as $key => $value) {
            $flag = true;
            $presenters[$key]->presenter = $presenters[$key]->presenter;
            $presenters[$key]->presenter->country = $presenters[$key]->presenter->country;
            $presenters[$key]->presenter->broadcaster = $presenters[$key]->presenter->broadcaster;
            $presenters_array = array_merge($presenters_array, array('presenter_'.$key => $presenters[$key]));
        }
        if ($flag) {
            $presenters = json_decode(json_encode($presenters_array));
            $presenters = json_decode(json_encode($presenters));
        } else {
            $presenters = null;
        }

        return $presenters;
    }

    public function entertainment($id)
    {
        $entertainment = EntraimentShow::select('artist', 'country_id', 'act_performing')->where('edition_id', $id)->get();
        $entertainment_array = array();
        $flag = false;
        foreach ($entertainment as $key => $value) {
            $flag = true;
            $entertainment[$key]->country = $entertainment[$key]->country->name;
            $entertainment_array = array_merge($entertainment_array, array('artist_'.$key => $entertainment[$key]));
        }
        if ($flag) {
            $entertainment = json_decode(json_encode($entertainment_array));
            $entertainment = json_decode(json_encode($entertainment));
        } else {
            $entertainment = null;
        }

        return $entertainment;
    }

    public function place($id)
    {
        $place = Place::where('id', $id)->get();
        if (isset($place[0])) {
            $place[0]->city_venue = $place[0]->city_venue;
            $place[0]->city_venue->country = $place[0]->city_venue->country;

            $place = json_decode(json_encode($place[0]));
        } else {
            $place = null;
        }

        return $place;
    }

    public function owner($id)
    {
        $owner = Owner::where('id', $id)->get();
        if (isset($owner[0])) {
            $owner[0]->country = $owner[0]->country;
            $owner = json_decode(json_encode($owner[0]));
        } else {
            $owner = null;
        }

        return $owner;
    }

    public function main_broadcaster($id)
    {
        $main_broadcaster = Broadcaster::where('id', $id)->get();
        if (isset($main_broadcaster[0])) {
            $main_broadcaster[0]->country = $main_broadcaster[0]->country;
            $main_broadcaster = json_decode(json_encode($main_broadcaster[0]));
        } else {
            $main_broadcaster = null;
        }

        return $main_broadcaster;
    }

    public function secondary_broadcaster($id)
    {
        $secondary_broadcaster = Broadcaster::where('id', $id)->get();
        if (isset($secondary_broadcaster[0])) {
            $secondary_broadcaster[0]->country = $secondary_broadcaster[0]->country;
            $secondary_broadcaster = json_decode(json_encode($secondary_broadcaster[0]));
        } else {
            $secondary_broadcaster = null;
        }

        return $secondary_broadcaster;
    }

    public function debuts($id)
    {
        $debuts = Debut::where('edition_id', $id)->get();
        $debuts_array = array();
        $flag = false;
        foreach ($debuts as $key => $value) {
            $flag = true;
            $debuts[$key]->country = $debuts[$key]->country->name;
            $debuts_array = array_merge($debuts_array, array($key => $debuts[$key]));
        }
        if ($flag) {
            usort($debuts_array, function($a, $b) {
                return $a->country < $b->country ? -1 : 1;
            });
            $debuts = json_decode(json_encode($debuts_array));
            $debuts = json_decode(json_encode($debuts));
        } else {
            $debuts = null;
        }

        return $debuts;
    }

    public function withdrawals($id)
    {
        $withdrawals = Withdrawal::where('edition_id', $id)->get();
        $withdrawals_array = array();
        $flag = false;
        foreach ($withdrawals as $key => $value) {
            $flag = true;
            $withdrawals[$key]->country = $withdrawals[$key]->country->name;
            $withdrawals_array = array_merge($withdrawals_array, array($key => $withdrawals[$key]));
        }
        if ($flag) {
            usort($withdrawals_array, function($a, $b) {
                return $a->country < $b->country ? -1 : 1;
            });
            $withdrawals = json_decode(json_encode($withdrawals_array));
            $withdrawals = json_decode(json_encode($withdrawals));
        } else {
            $withdrawals = null;
        }

        return $withdrawals;
    }

    public function returns($id)
    {
        $returns = Returns::where('edition_id', $id)->get();
        $returns_array = array();
        $flag = false;
        foreach ($returns as $key => $value) {
            $flag = true;
            $returns[$key]->country = $returns[$key]->country->name;
            $returns_array = array_merge($returns_array, array('return_'.$key => $returns[$key]));
        }
        if ($flag) {
            usort($returns_array, function($a, $b) {
                return $a->country < $b->country ? -1 : 1;
            });
            $returns = json_decode(json_encode($returns_array));
            $returns = json_decode(json_encode($returns));
        } else {
            $returns = null;
        }

        return $returns;
    }

    public function winner($id)
    {
        $winner = Winner::where('edition_id', $id)->get();
        if (isset($winner[0])) {
            $winner[0]->candidate = $winner[0]->candidate;
            $winner[0]->candidate->country = $winner[0]->candidate->country;
            $winner = json_decode(json_encode($winner[0]));
        } else {
            $winner = null;
        }

        return $winner;
    }

    public function first_runner_up($id)
    {
        $first_runner_up = FirstRunnerUp::where('edition_id', $id)->get();
        if (isset($first_runner_up[0])) {
            $first_runner_up[0]->candidate = $first_runner_up[0]->candidate;
            $first_runner_up[0]->candidate->country = $first_runner_up[0]->candidate->country;
            $first_runner_up = json_decode(json_encode($first_runner_up[0]));
        } else {
            $first_runner_up = null;
        }

        return $first_runner_up;
    }

    public function second_runner_up($id)
    {
        $second_runner_up = SecondRunnerUp::where('edition_id', $id)->get();
        if (isset($second_runner_up[0])) {
            $second_runner_up[0]->candidate = $second_runner_up[0]->candidate;
            $second_runner_up[0]->candidate->country = $second_runner_up[0]->candidate->country;
            $second_runner_up = json_decode(json_encode($second_runner_up[0]));
        } else {
            $second_runner_up = null;
        }

        return $second_runner_up;
    }

    public function third_runner_up($id)
    {
        $third_runner_up = ThirdRunnerUp::where('edition_id', $id)->get();
        if (isset($third_runner_up[0])) {
            $third_runner_up[0]->candidate = $third_runner_up[0]->candidate;
            $third_runner_up[0]->candidate->country = $third_runner_up[0]->candidate->country;
            $third_runner_up = json_decode(json_encode($third_runner_up[0]));
        } else {
            $third_runner_up = null;
        }

        return $third_runner_up;
    }

    public function fourth_runner_up($id)
    {
        $fourth_runner_up = FourthRunnerUp::where('edition_id', $id)->get();
        if (isset($fourth_runner_up[0])) {
            $fourth_runner_up[0]->candidate = $fourth_runner_up[0]->candidate;
            $fourth_runner_up[0]->candidate->country = $fourth_runner_up[0]->candidate->country;
            $fourth_runner_up = json_decode(json_encode($fourth_runner_up[0]));
        } else {
            $fourth_runner_up = null;
        }

        return $fourth_runner_up;
    }

    public function runners_up($id)
    {
        $runners_up = RunnersUp::where('edition_id', $id)->get();
        $runners_up_array = array();
        $flag = false;
        foreach ($runners_up as $key => $value) {
            $flag = true;
            $runners_up[$key]->candidate = $runners_up[$key]->candidate;
            $runners_up[$key]->candidate->country = $runners_up[$key]->candidate->country;
            $runners_up_array = array_merge($runners_up_array, array('runner_up_'.$key => $runners_up[$key]));
        }
        if ($flag) {
            usort($returns_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $runners_up = json_decode(json_encode($runners_up_array));
            $runners_up = json_decode(json_encode($runners_up));
        } else {
            $runners_up = null;
        }

        return $runners_up;
    }

    public function semifinalists($id)
    {
        $semifinalists = Semifinalist::where('edition_id', $id)->get();
        $semifinalists_array = array();
        $flag = false;
        foreach ($semifinalists as $key => $value) {
            $flag = true;
            $semifinalists[$key]->candidate = $semifinalists[$key]->candidate;
            $semifinalists[$key]->candidate->country = $semifinalists[$key]->candidate->country;
            $semifinalists_array = array_merge($semifinalists_array, array('semifinalist_'.$key => $semifinalists[$key]));
        }
        if ($flag) {
            usort($semifinalists_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $semifinalists = json_decode(json_encode($semifinalists_array));
            $semifinalists = json_decode(json_encode($semifinalists));
        } else {
            $semifinalists = null;
        }

        return $semifinalists;
    }

    public function quarterfinalists($id)
    {
        $quarterfinalists = Quarterfinalist::where('edition_id', $id)->get();
        $quarterfinalists_array = array();
        $flag = false;
        foreach ($quarterfinalists as $key => $value) {
            $flag = true;
            $quarterfinalists[$key]->candidate = $quarterfinalists[$key]->candidate;
            $quarterfinalists[$key]->candidate->country = $quarterfinalists[$key]->candidate->country;
            $quarterfinalists_array = array_merge($quarterfinalists_array, array('quarterfinalist_'.$key => $quarterfinalists[$key]));
        }
        if ($flag) {
            usort($quarterfinalists_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $quarterfinalists = json_decode(json_encode($quarterfinalists_array));
            $quarterfinalists = json_decode(json_encode($quarterfinalists));
        } else {
            $quarterfinalists = null;
        }

        return $quarterfinalists;
    }

    public function eighterfinalists($id)
    {
        $eighterfinalists = Eighterfinalist::where('edition_id', $id)->get();
        $eighterfinalists_array = array();
        $flag = false;
        foreach ($eighterfinalists as $key => $value) {
            $flag = true;
            $eighterfinalists[$key]->candidate = $eighterfinalists[$key]->candidate;
            $eighterfinalists[$key]->candidate->country = $eighterfinalists[$key]->candidate->country;
            $eighterfinalists_array = array_merge($eighterfinalists_array, array('eighterfinalist_'.$key => $eighterfinalists[$key]));
        }
        if ($flag) {
            usort($eighterfinalists_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $eighterfinalists = json_decode(json_encode($eighterfinalists_array));
            $eighterfinalists = json_decode(json_encode($eighterfinalists));
        } else {
            $eighterfinalists = null;
        }

        return $eighterfinalists;
    }

    public function miss_congeniality($id)
    {
        $miss_congeniality = MissCongeniality::where('edition_id', $id)->get();
        $miss_congeniality_array = array();
        $flag = false;
        foreach ($miss_congeniality as $key => $value) {
            $flag = true;
            $miss_congeniality[$key]->candidate = $miss_congeniality[$key]->candidate;
            $miss_congeniality[$key]->candidate->country = $miss_congeniality[$key]->candidate->country;
            $miss_congeniality_array = array_merge($miss_congeniality_array, array('miss_congeniality_'.$key => $miss_congeniality[$key]));
        }
        if ($flag) {
            usort($miss_congeniality_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $miss_congeniality = json_decode(json_encode($miss_congeniality_array));
            $miss_congeniality = json_decode(json_encode($miss_congeniality));
        } else {
            $miss_congeniality = null;
        }

        return $miss_congeniality;
    }

    public function miss_photogenic($id)
    {
        $miss_photogenic = Photogenic::where('edition_id', $id)->get();
        $miss_photogenic_array = array();
        $flag = false;
        foreach ($miss_photogenic as $key => $value) {
            $flag = true;
            $miss_photogenic[$key]->candidate = $miss_photogenic[$key]->candidate;
            $miss_photogenic[$key]->candidate->country = $miss_photogenic[$key]->candidate->country;
            $miss_photogenic_array = array_merge($miss_photogenic_array, array('miss_photogenic_'.$key => $miss_photogenic[$key]));
        }
        if ($flag) {
            usort($miss_photogenic_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $miss_photogenic = json_decode(json_encode($miss_photogenic_array));
            $miss_photogenic = json_decode(json_encode($miss_photogenic));
        } else {
            $miss_photogenic = null;
        }

        return $miss_photogenic;
    }

    public function best_national_costume($id)
    {
        $best_national_costume = BestNationalCostume::where('edition_id', $id)->get();
        $best_national_costume_array = array();
        $flag = false;
        foreach ($best_national_costume as $key => $value) {
            $flag = true;
            $best_national_costume[$key]->candidate = $best_national_costume[$key]->candidate;
            $best_national_costume[$key]->candidate->country = $best_national_costume[$key]->candidate->country;
            $best_national_costume_array = array_merge($best_national_costume_array, array('best_national_costume_'.$key => $best_national_costume[$key]));
        }
        if ($flag) {
            usort($best_national_costume_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
        } else {
            $best_national_costume = json_decode(json_encode($best_national_costume_array));
            $best_national_costume = json_decode(json_encode($best_national_costume));
        }

        return $best_national_costume;
    }

    public function contestants($id)
    {
        $contestants = Contestant::where('edition_id', $id)->get();
        $contestants_array = array();
        $flag = false;
        foreach ($contestants as $key => $value) {
            $flag = true;
            $contestants[$key]->candidate = $contestants[$key]->candidate;
            $contestants[$key]->candidate->country = $contestants[$key]->candidate->country;
            $contestants_array = array_merge($contestants_array, array('contestants_'.$key => $contestants[$key]));
        }
        if ($flag) {
            usort($contestants_array, function($a, $b) {
                return $a->candidate->country->name < $b->candidate->country->name ? -1 : 1;
            });
            $contestants = json_decode(json_encode($contestants_array));
            $contestants = json_decode(json_encode($contestants));
        } else {
            $contestants = null;
        }

        return $contestants;
    }
}
