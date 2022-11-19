<?php

namespace App\Http\Livewire\Dashboard\Editions\Withdrawals;

use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Withdrawal;
use Livewire\Component;

class Save extends Component
{
    public $countries, $editions;

    public $country_id, $edition_id;

    public $withdrawal;

    public $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'edition_id' => 'required|integer'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->withdrawal = Withdrawal::findOrFail($id);
            $this->country_id = $this->withdrawal->country_id;
            $this->edition_id = $this->withdrawal->edition_id;
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.withdrawals.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/withdrawal/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/withdrawal/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function submit()
    {
        $this -> validate();

        if ($this->withdrawal) {
            $this->withdrawal->update([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('updated');
        } else {
            $this->withdrawal = Withdrawal::create([
                'country_id' => $this->country_id,
                'edition_id' => $this->edition_id
            ]);
            $this->emit('created');
        }
    }
}
