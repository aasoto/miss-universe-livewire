<?php

namespace App\Http\Livewire\Dashboard\Editions\MissUniverse;

use App\Models\Editions\Broadcaster;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Place;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $broadcasters, $places;

    public $year, $name, $official_name, $start_concentration, $end_concentration, $hotel_concentration, $date_preliminary, $date, $description, $content, $top_3 = false, $top_5 = false, $top_6 = false, $extra_data, $logo, $background;

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
            $this->description = $this->miss_universe->description;
            $this->content = $this->miss_universe->content;
            $this->top_3 = $this->miss_universe->top_3;
            $this->top_5 = $this->miss_universe->top_5;
            $this->top_6 = $this->miss_universe->top_6;
            $this->extra_data = $this->miss_universe->extra_data;
        }
    }

    public function render()
    {
        $this->broadcasters = Broadcaster::pluck('id', 'name');
        $this->places = Place::get();
        return view('livewire.dashboard.editions.miss-universe.save');
    }

    public function submit()
    {
        $this -> validate();
        //dd($this->broadcaster_2);
        if ($this->miss_universe) {
            $this->miss_universe->update([
                'year' => $this->year,
                'name' => $this->name,
                'official_name' => $this->official_name,
                'start_concentration' => $this->start_concentration,
                'end_concentration' => $this->end_concentration,
                'hotel_concentration' => $this->hotel_concentration,
                'date_preliminary' => $this->date_preliminary,
                'date' => $this->date,
                'broadcaster_id' => $this->broadcaster_id,
                'broadcaster_2' => $this->broadcaster_2,
                'place_id' => $this->place_id,
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
                'official_name' => $this->official_name,
                'start_concentration' => $this->start_concentration,
                'end_concentration' => $this->end_concentration,
                'hotel_concentration' => $this->hotel_concentration,
                'date_preliminary' => $this->date_preliminary,
                'date' => $this->date,
                'broadcaster_id' => $this->broadcaster_id,
                'broadcaster_2' => $this->broadcaster_2,
                'place_id' => $this->place_id,
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
            //dd($imageName);

            $this->miss_universe->update([
                'logo' => $imageName
            ]);
        }

        if ($this->background) {
            $imageName = time().'.'.$this->background->getClientOriginalExtension();
            $this->background->storeAs('images/editions/miss-universe/background', $imageName, 'public');

            $this->miss_universe->update([
                'background' => $imageName
            ]);
        }
    }
}
