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
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        return view('livewire.dashboard.editions.withdrawals.save');
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
