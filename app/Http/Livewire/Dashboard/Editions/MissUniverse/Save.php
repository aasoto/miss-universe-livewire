<?php

namespace App\Http\Livewire\Dashboard\Editions\MissUniverse;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Broadcaster;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\MissUniversePresentatorInterception;
use App\Models\Editions\Place;
use App\Models\editions\Presenter;
use App\Models\Owner;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $broadcasters, $places, $owners, $edition_id;

    public $year, $name, $official_name, $start_concentration, $end_concentration, $hotel_concentration, $date_preliminary, $date, $placements, $entrants, $description, $content, $top_3 = false, $top_5 = false, $top_6 = false, $extra_data, $logo, $background, $owner_id;

    public $current_logo, $current_background;

    public $broadcaster_id, $broadcaster_2, $place_id;

    public $miss_universe;

    protected $rules = [
        'year' => 'required|integer',
        'name' => 'required|max:200|string',
        'official_name' => 'nullable|max:1000|string',
        'start_concentration' => 'nullable|date',
        'end_concentration' => 'nullable|date',
        'hotel_concentration' => 'nullable|max:200|string',
        'date_preliminary' => 'nullable|date',
        'date' => 'required|date',
        'broadcaster_id' => 'required|integer',
        'broadcaster_2' => 'nullable|integer',
        'place_id' => 'required|integer',
        'placements' => 'nullable|integer',
        'entrants' => 'nullable|integer',
        'owner_id' => 'required|integer',
        'description' => 'required|string',
        'content' => 'nullable|string',
        'top_3' => 'required|boolean',
        'top_5' => 'required|boolean',
        'top_6' => 'required|boolean',
        'extra_data' => 'nullable|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->miss_universe = MissUniverse::findOrFail($id);
            $this->year = $this->miss_universe->year;
            $this->name = $this->miss_universe->name;
            $this->official_name = $this->miss_universe->official_name;
            $this->start_concentration = $this->miss_universe->start_concentration;
            $this->end_concentration = $this->miss_universe->end_concentration;
            $this->hotel_concentration = $this->miss_universe->hotel_concentration;
            $this->date_preliminary = $this->miss_universe->date_preliminary;
            $this->date = $this->miss_universe->date;
            $this->broadcaster_id = $this->miss_universe->broadcaster_id;
            $this->broadcaster_2 = $this->miss_universe->broadcaster_2;
            $this->place_id = $this->miss_universe->place_id;
            $this->placements = $this->miss_universe->placements;
            $this->entrants = $this->miss_universe->entrants;
            $this->description = $this->miss_universe->description;
            $this->content = $this->miss_universe->content;
            $this->top_3 = $this->miss_universe->top_3;
            $this->top_5 = $this->miss_universe->top_5;
            $this->top_6 = $this->miss_universe->top_6;
            $this->extra_data = $this->miss_universe->extra_data;
            $this->current_logo = $this->miss_universe->logo;
            $this->current_background = $this->miss_universe->background;
            $this->owner_id = $this->miss_universe->owner_id;
            $this->edition_id = $id;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->broadcasters = Broadcaster::pluck('id', 'name');
        $this->places = Place::get();
        $this->owners = Owner::get();
        $presenters = MissUniversePresentatorInterception::where('edition_id', $this->edition_id)->get();
        return view('livewire.dashboard.editions.miss-universe.save', compact('presenters'))->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/miss_universe/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/miss_universe/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();
        //dd($this->broadcaster_2);
        if ($this->miss_universe) {
            $this->miss_universe->update([
                'year' => $this->year,
                'name' => $this->name,
                'slug' => str($this->name)->slug(),
                'official_name' => $this->official_name,
                'start_concentration' => $this->start_concentration,
                'end_concentration' => $this->end_concentration,
                'hotel_concentration' => $this->hotel_concentration,
                'date_preliminary' => $this->date_preliminary,
                'date' => $this->date,
                'broadcaster_id' => $this->broadcaster_id,
                'broadcaster_2' => $this->broadcaster_2,
                'place_id' => $this->place_id,
                'owner_id' => $this->owner_id,
                'placements' => $this->placements,
                'entrants' => $this->entrants,
                'description' => $this->description,
                'content' => $this->content,
                'top_3' => $this->top_3,
                'top_5' => $this->top_5,
                'top_6' => $this->top_6,
                'extra_data' => $this->extra_data
            ]);

            $this->emit('updated');
        } else {
            $this->miss_universe = MissUniverse::create([
                'year' => $this->year,
                'name' => $this->name,
                'slug' => str($this->name)->slug(),
                'official_name' => $this->official_name,
                'start_concentration' => $this->start_concentration,
                'end_concentration' => $this->end_concentration,
                'hotel_concentration' => $this->hotel_concentration,
                'date_preliminary' => $this->date_preliminary,
                'date' => $this->date,
                'broadcaster_id' => $this->broadcaster_id,
                'broadcaster_2' => $this->broadcaster_2,
                'place_id' => $this->place_id,
                'owner_id' => $this->owner_id,
                'placements' => $this->placements,
                'entrants' => $this->entrants,
                'description' => $this->description,
                'content' => $this->content,
                'top_3' => $this->top_3,
                'top_5' => $this->top_5,
                'top_6' => $this->top_6,
                'extra_data' => $this->extra_data
            ]);

            $this->emit('created');
        }

        if ($this->logo) {
            $imageName = time().'.'.$this->logo->getClientOriginalExtension();
            $this->logo->storeAs('images/editions/miss-universe/logos', $imageName, 'public');

            $this->miss_universe->update([
                'logo' => $imageName
            ]);

            if ($this->current_logo) {
                unlink('../storage/app/public/images/editions/miss-universe/logos/'.$this->current_logo);
            }
        }

        if ($this->background) {
            $imageName = time().'.'.$this->background->getClientOriginalExtension();
            $this->background->storeAs('images/editions/miss-universe/background', $imageName, 'public');

            $this->miss_universe->update([
                'background' => $imageName
            ]);

            if ($this->current_background) {
                unlink('../storage/app/public/images/editions/miss-universe/background/'.$this->current_background);
            }
        }
    }
}
