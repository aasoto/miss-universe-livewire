<?php

namespace App\Http\Livewire\Dashboard\Editions\Debuts;

use App\Models\Country;
use App\Models\Editions\Debut;
use App\Models\Editions\MissUniverse;
use Livewire\Component;

class Save extends Component
{
    public $countries, $editions;

    public $country_id, $edition_id;

    public $debut;

    public $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'edition_id' => 'required|integer'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->debut = Debut::findOrFail($id);
            $this->country_id = $this->debut->country_id;
            $this->edition_id = $this->debut->edition_id;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.debuts.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/debut/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/debut/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->debut) {
            $this->debut->update([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('updated');
        } else {
            $this->debut = Debut::create([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('created');
        }
    }
}
