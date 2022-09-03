<?php

namespace App\Http\Livewire\Dashboard\NationalCommittee;

use App\Models\Country;
use App\Models\NationalCommittee;
use Livewire\Component;

class Save extends Component
{
    public $countries;

    public $country_id, $business_name, $national_director;

    public $nationalcommittee;

    protected $rules = [
        'country_id' => 'required|integer',
        'business_name' => 'required|max:200|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
        'national_director' => 'required|string|max:200'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->nationalcommittee = NationalCommittee::findOrFail($id);
            $this->country_id = $this->nationalcommittee->country_id;
            $this->business_name = $this->nationalcommittee->business_name;
            $this->national_director = $this->nationalcommittee->national_director;
        }
    }

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.national-committee.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->nationalcommittee) {
            $this->nationalcommittee->update([
                'country_id' => $this->country_id,
                'business_name' => $this->business_name,
                'national_director' => $this->national_director,
            ]);
            $this->emit('updated');
        } else {
            $this->nationalcommittee = NationalCommittee::create([
                'country_id' => $this->country_id,
                'business_name' => $this->business_name,
                'national_director' => $this->national_director,
            ]);
            $this->emit('created');
        }

    }
}
