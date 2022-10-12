<?php

namespace App\Http\Livewire\Dashboard\Editions\EntraimentShow;

use App\Models\Country;
use App\Models\Editions\EntraimentShow;
use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Save extends Component
{
    public $countries, $editions;

    public $artist, $act_performing;

    public $country_id, $edition_id;

    public $entraiment_show;

    public $acts = [
        'opening' => 'Inicio',
        'swimsuit' => 'Traje de baño',
        'evening_gown' => 'Vestido de noche',
        'final_look' => 'Desfile final',
        'other' => 'Otro'
    ];

    protected $rules = [
        'country_id' => 'required|integer',
        'edition_id' => 'required|integer',
        'artist' => 'required|max:1000|string',
        'act_performing' => 'nullable|max:200|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->entraiment_show = EntraimentShow::findOrFail($id);
            $this->country_id = $this->entraiment_show->country_id;
            $this->edition_id = $this->entraiment_show->edition_id;
            $this->artist = $this->entraiment_show->artist;
            $this->act_performing = $this->entraiment_show->act_performing;
        }
    }

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.entraiment-show.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->entraiment_show) {
            $this->entraiment_show->update([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id,
                'artist' => $this->artist,
                'act_performing' => $this->act_performing
            ]);
            $this->emit('updated');
        } else {
            $this->entraiment_show = EntraimentShow::create([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id,
                'artist' => $this->artist,
                'act_performing' => $this->act_performing
            ]);
            $this->emit('created');
        }
    }
}