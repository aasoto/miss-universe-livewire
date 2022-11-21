<?php

namespace App\Http\Livewire\Dashboard\Editions\Returns;

use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Returns;
use Livewire\Component;

class Save extends Component
{
    public $countries, $editions;

    public $country_id, $edition_id;

    public $return;

    public $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'edition_id' => 'required|integer'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->return = Returns::findOrFail($id);
            $this->country_id = $this->return->country_id;
            $this->edition_id = $this->return->edition_id;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.returns.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/return/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/return/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->return) {
            $this->return->update([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('updated');
        } else {
            $this->return = Returns::create([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('created');
        }
    }
}
